<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Users;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;



class Parent_dashboard_Controller extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $parent = Parents::where('parent_email', $email)->first();
        // $pwd = Auth::user()->password;
        $parent_id = $parent->parent_id;
        $student_id = $parent->student_id;
        $parent_name = $parent->parent_name;
        $contact_number = $parent->contact_number;
        $parent_email = $parent->parent_email;
        // $gender = $parent_id->gender;
        $address = $parent->address;
        $relationship_to_student = $parent->relationship_to_student;
        // $other_contact = $parent_id->other_contact;
        // $email_address = $parent_id->email_address;
         
        return view('parentdashboard',
         compact('parent_id',
         'student_id', 
         'parent_name', 
         'contact_number',
         'parent_email',
        'address',
        'relationship_to_student'
     ));
    }

    public function edit($parent_id)
    {
        $institute_id = Auth::user()->institute_id;
        $classes = DB::table('student')
            ->where('institute_id', $institute_id)
            ->pluck('student_name', 'student_id'); 
        $parent = Parents::find($parent_id);
        if (!$parent) {
            return redirect()->back()->withErrors('Parent not found.');
        }
        return view('parentlogininfoupdate', compact('parent','classes'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'parent_name' => 'required|string|max:255',
            'contact_number' => 'required|numeric',
            'parent_email' => 'required|email|unique:parent,parent_email,' . $request->input('update_id') . ',parent_id',
            'address' => 'required|string|max:255',
            'relationship_to_student' => 'required|string|in:F,M,G'
        ]);
        $parent = Parents::find($request->input('update_id'));
        if (!$parent) {
            return redirect()->back()->withErrors('Parent not found.');
        }
        // Check if email is being updated
        $oldEmail = $parent->parent_email;
        $newEmail = $request->input('parent_email');
        $parent->parent_name = $request->input('parent_name');
        $parent->contact_number = $request->input('contact_number');
        $parent->parent_email = $newEmail;
        $parent->address = $request->input('address');
        $parent->relationship_to_student = $request->input('relationship_to_student');
        $parent->save();
        // Update the corresponding user record
        $user = Users::where('email', $oldEmail)->first();
        if ($user) {
            $user->name = $request->input('parent_name');
            $user->email = $newEmail;
            $user->institute_id = Auth::user()->institute_id;
            $user->password = Hash::make($request->input('password')); // Ensure password is hashed
            $user->role = 'Parents';
            $user->save();
        } else {
            return redirect()->back()->withErrors('User associated with this parent email not found.');
        }
        return redirect('/parentdashboard')->with('success', 'Parent updated successfully.');
    }
}