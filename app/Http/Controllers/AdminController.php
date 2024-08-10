<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\Demomail;
class AdminController extends Controller
{
    public function insertform(){
        return view("admininsert");
    }
    public function insert(Request $data){
        $data->validate([
            // 'institute_id' => 'required|unique:App\Models\Institute,institute_id',
            'institute_name' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric|min_digits:10|max_digits:10',
            'email' => 'required|email|unique:App\Models\Institute,email',
            'password' => 'required|min:5|',
        ]);
        $user=new Institute();
        //$user->institute_id=$data->input('institute_id');
        $user->institute_name=$data->input('institute_name');
        $user->address=$data->input('address');
        $user->contact=$data->input('contact');
        $user->email=$data->input('email');
        $user->save();
        
        $id=$user->institute_id;
        $users = new users();
        $users->name = $data->input('institute_name');
        $users->institute_id=$id;
        $users->email = $data->input('email');
        $users->password = Hash::make($data->input('password'));
        $users->role = 'Institute';
        $users->save();

        $mailData = [
            'email' => $data->input('email'),
            'password' => $data->input('password')
        ];
        
        // Send email
        Mail::to($data->input('email'))->send(new Demomail($mailData));
        return redirect('/login')->with('success','Super Admin Inserted Successfully');
    }

    public function delete($institute_id){
        $user=Institute::find($institute_id);
        $user->delete();
        return redirect()->back()->with('message','Data deleted Successfully');
    }
    public function edit($id)
    {
        $user = Institute::findOrFail($id);
        return view('instituteedit', compact('user'));
    }
    public function update(Request $data){
        $data->validate([
            'institute_name' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric|min_digits:10|max_digits:10',
            'email' => 'required|email',
            // 'password' => 'required|min:5|',
        ]);
        $institue_id=$data->institute_id;
        $institute_name=$data->institute_name;
        $address=$data->address;
        $email=$data->email;
        $contact=$data->contact;
        Institute::where('institute_id','=',$institue_id)->update([
            'institute_name'=>$institute_name,'address'=>$address,'contact'=>$contact,'email'=>$email]);
        return redirect('/institute/instituteshow')->with('message','Data Updated Successfully');
    }
}