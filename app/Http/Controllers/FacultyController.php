<?php

namespace App\Http\Controllers;
use App\Models\users;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\Demomail;
use Illuminate\Validation\Rule;

class FacultyController
{
    // public function faculty_info(){
    //     return view('faculty_info');
    // }

    // public function insert(Request $data){
    //     $faculty = new User();
    //     $faculty->faculty_id=$data->input('faculty_id');
    //     $faculty->faculty_name=$data->input('faculty_name');
    //     $faculty->faculty_age=$data->input('faculty_age');
    //     $faculty->faculty_dob=$data->input('faculty_dob');
    //     $faculty->faculty_gender=$data->input('faculty_gender');
    //     $faculty->faculty_contact=$data->input('faculty_contact');
    //     $faculty->faculty_address=$data->input('faculty_address');
    //     $faculty->faculty_email=$data->input('faculty_email');
    //     $faculty->faculty_qualification=$data->input('faculty_qualification');
    //     $faculty->faculty_doj=$data->input('faculty_doj');
    //     $faculty->faculty_specializations=$data->input('faculty_specializations');
    //     $faculty->faculty_experience=$data->input('faculty_experience');
    //     $faculty->faculty_designation=$data->input('faculty_designation');
    //     $faculty->faculty_department=$data->input('faculty_department');
    //     $faculty->save();
      
    // }

    // Display the faculty form
    public function showFacultyForm(){
        

         $faculties = Faculty::all();
        
         return view(('faculty_info'), compact('faculties'));
    }

    // Handle form submission and store the faculty data
    public function storeFaculty(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // 'faculty_id' => 'required|unique:faculty_info,faculty_id',
            'faculty_name' => 'required|string|max:255',
            // 'faculty_age' => 'required|integer',
            'faculty_dob' => 'required|date',
            'faculty_gender' => 'required|string',
            'faculty_contact' => 'required|string|max:10',
            'faculty_address' => 'required|string|max:500',
            'faculty_email' => 'required|unique:users,email',
            'faculty_qualification' => 'required|string|max:255',
            'faculty_doj' => 'required|date|after_or_equal:today',
            'faculty_doj.after_or_equal' => 'The date of joining must be today or in the future.',
            'faculty_specializations' => 'required|string|max:500',
            'faculty_experience' => 'required|string|max:255',
            'faculty_designation' => 'required|string|max:255',
            'faculty_department' => 'required|string|max:255',
        ]);
        
        // Create a new Faculty instance
        $faculty = new Faculty();

        // Assign each field individually from the request input
        // $faculty->faculty_id = $request->input('faculty_id');
        $faculty->institute_id = Auth::user()->institute_id;
        $faculty->faculty_name = $request->input('faculty_name');
        // $faculty->faculty_age = $request->input('faculty_age');
        $faculty->faculty_dob = $request->input('faculty_dob');
        $faculty->faculty_gender = $request->input('faculty_gender');
        $faculty->faculty_contact = $request->input('faculty_contact');
        $faculty->faculty_address = $request->input('faculty_address');
        $faculty->faculty_email = $request->input('faculty_email');
        $faculty->faculty_qualification = $request->input('faculty_qualification');
        $faculty->faculty_doj = $request->input('faculty_doj');
        $faculty->faculty_specializations = $request->input('faculty_specializations');
        $faculty->faculty_experience = $request->input('faculty_experience');
        $faculty->faculty_designation = $request->input('faculty_designation');
        $faculty->faculty_department = $request->input('faculty_department');

        $users = new users();
        $users->name = $request->input('faculty_name');
        $users->email = $request->input('faculty_email');
        $users->institute_id = Auth::user()->institute_id;
        $users->password = Hash::make($request->input('password'));
        $users->role = 'Faculty';
        $users->save();

        // Save the faculty data to the database
        $faculty->save();
        $mailData = [
            'email' => $request->input('faculty_email'),
            'password' => $request->input('password')
        ];
        
        // Send email
        Mail::to($request->input('faculty_email'))->send(new Demomail($mailData));

        // Redirect back with a success message
        return redirect('/faculty/show')->with('success', 'Faculty added successfully.');
    }

    public function delete($faculty_id){
        $user=Faculty::find($faculty_id);
        $email=$user->faculty_email;
        users::where('email',$email)->delete();
        $user->delete();
        return redirect()->back(); 
    }

    public function showFaculty(){

        $faculties = Faculty::all();
        return view('facultyinfoview',compact('faculties'));
    }

    public function updateinfoview($faculty_id){
        $faculty = Faculty::find($faculty_id);
        return view('facultyinfoupdate', compact('faculty'));
    }
    
    public function update(Request $request)
    {
        $faculty = Faculty::find($request->input('update_id'));
        $oldemail = $faculty->faculty_email;
        $users = users::where('email', $oldemail)->first();
        $id = $users->id;

        $request->validate([
            'faculty_name' => 'required|string|max:255',
            'faculty_dob' => 'required|date',
            'faculty_gender' => 'required|string',
            'faculty_contact' => 'required|string|max:10',
            'faculty_address' => 'required|string|max:500',
            'faculty_email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($id)  // Ensure uniqueness except for the current user
            ],
            'faculty_qualification' => 'required|string|max:255',
            'faculty_doj' => 'required|date',
            'faculty_specializations' => 'required|string|max:500',
            'faculty_experience' => 'required|string|max:255',
            'faculty_designation' => 'required|string|max:255',
            'faculty_department' => 'required|string|max:255',
        ]);

    
        // Create a new Faculty instance

        
        $name = $request->input('faculty_name');
        $email = $request->input('faculty_email');
        $institute_id = Auth::user()->institute_id;
        //$password = Hash::make($request->input('password'));
        $role = 'Faculty';
        DB::update("UPDATE `users` SET `name`='$name',`email`='$email',`institute_id`=$institute_id,`role`='$role' WHERE `email`='".$oldemail."'");

        // Assign each field individually from the request input
        // $faculty->faculty_id = $request->input('faculty_id');
        $faculty->faculty_name = $request->input('faculty_name');
        // $faculty->faculty_age = $request->input('faculty_age');
        $faculty->faculty_dob = $request->input('faculty_dob');
        $faculty->faculty_gender = $request->input('faculty_gender');
        $faculty->faculty_contact = $request->input('faculty_contact');
        $faculty->faculty_address = $request->input('faculty_address');
        $faculty->faculty_email = $request->input('faculty_email');
        $faculty->faculty_qualification = $request->input('faculty_qualification');
        $faculty->faculty_doj = $request->input('faculty_doj');
        $faculty->faculty_specializations = $request->input('faculty_specializations');
        $faculty->faculty_experience = $request->input('faculty_experience');
        $faculty->faculty_designation = $request->input('faculty_designation');
        $faculty->faculty_department = $request->input('faculty_department');

        // Save the faculty data to the database
        $faculty->save();
        
        
        

        // Redirect back with a success message
        return redirect('/faculty/show')->with('success', 'Faculty updated successfully.');
    }
}
