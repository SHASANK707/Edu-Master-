<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\Demomail;

class StaffController extends Controller
{
    public function index()
    {
        $user = staff::all();
        // dd($user);
        return view('staffform', compact('user'));
    }
    public function messages()
    {
        return [
            'staff_id.required' => 'The staff ID field is required.',
            'staff_id.numeric' => 'The staff ID must be a number.',
            'institute_id.required' => 'The Institute ID field is required.',
            'institute_id.numeric' => 'The Institute ID must be a number.',
            // other custom messages
        ];
    }
    public function insert(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'staff_name' => 'required|string|max:255',
            'gender' => 'required', 
            'contact_number' => 'required', 
            'email' => 'required|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        // Create a new Staff record and save it to the database
        $staff = new staff();
        //$staff->staff_id = $request->input('staff_id');
        $staff->institute_id = Auth::user()->institute_id;
        $staff->staff_name = $validatedData['staff_name'];
        $staff->gender = $validatedData['gender'];
        $staff->contact_number = $validatedData['contact_number'];
        $staff->email = $validatedData['email'];
        $staff->address = $validatedData['address'];
        $staff->designation = $validatedData['designation'];
        $staff->department = $validatedData['department'];
        $staff->save();

        $users = new users();
        $users->name = $request->input('staff_name');
        $users->email = $request->input('email');
        $users->institute_id = Auth::user()->institute_id;
        $users->password = Hash::make($request->input('password'));
        $users->role = 'Management';
        $users->save();
        
        $mailData = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        
        // Send email
        Mail::to($request->input('email'))->send(new Demomail($mailData));

        return redirect()->route('form.view')->with('success', 'Data Added sucsessfully');
    }
    public function view()
    {
        $user = staff::all();
        // dd($user);
        return view('viewdata', compact('user'));
    }
    public function edit($id)
    {
        $user = staff::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'staff_name' => 'required|string|max:255',
            'gender' => 'required', 
            'contact_number' => 'required', 
            'email' => 'required|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        $staff = staff::find($request->input('update_id'));



        $oldemail = $staff->email;
        $name = $request->input('staff_name');
        $email = $request->input('email');
        $institute_id = Auth::user()->institute_id;
        $password = Hash::make($request->input('password'));
        $role = 'Managment';
        DB::update("UPDATE `users` SET `name`='$name',`email`='$email',`institute_id`=$institute_id,`password`='$password',`role`='$role' WHERE `email`='".$oldemail."'");


        $staff->institute_id = Auth::user()->institute_id;
        $staff->staff_name = $validatedData['staff_name'];
        $staff->gender = $validatedData['gender'];
        $staff->contact_number = $validatedData['contact_number'];
        $staff->email = $validatedData['email'];
        $staff->address = $validatedData['address'];
        $staff->designation = $validatedData['designation'];
        $staff->department = $validatedData['department'];
        $staff->save();


        return redirect()->route('form.view')->with('success', 'Data Updated sucsessfully');
    }

    public function destroy($staff_id)
    {
        $user=staff::find($staff_id);
        $email=$user->email;
        users::where('email',$email)->delete();
        $user->delete();
        return redirect()->route('form.view')->with('success', 'Data Deleted sucsessfully');
    }
}