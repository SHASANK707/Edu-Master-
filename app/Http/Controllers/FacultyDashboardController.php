<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\users;


class FacultyDashboardController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $faculty = Faculty::where('faculty_email', $email)->first();
        // Ensure faculty member is found
        if (!$faculty) {
            return redirect()->route('faculty.dashboard')->with('error', 'Faculty member not found.');
        }
        //dd($faculty_id->all());
        // Extract necessary details
        $faculty_id = $faculty->faculty_id;
        $institute_id = $faculty->institute_id;
        $faculty_name = $faculty->faculty_name;
        $faculty_dob = $faculty->faculty_dob;
        $faculty_gender = $faculty->faculty_gender;
        $faculty_contact = $faculty->faculty_contact;
        $faculty_address = $faculty->faculty_address;
        $faculty_email = $faculty->faculty_email;
        $faculty_qualification = $faculty->faculty_qualification;
        $faculty_doj = $faculty->faculty_doj;
        $faculty_specializations = $faculty->faculty_specializations;
        $faculty_experience = $faculty->faculty_experience;
        $faculty_designation = $faculty->faculty_designation;
        $faculty_department = $faculty->faculty_department;
        // Pass the details to the view
        return view('faculty_dashboard', compact(
            'faculty_id',
            'institute_id',
            'faculty_name',
            'faculty_dob',
            'faculty_gender',
            'faculty_contact',
            'faculty_address',
            'faculty_email',
            'faculty_qualification',
            'faculty_doj',
            'faculty_specializations',
            'faculty_experience',
            'faculty_designation',
            'faculty_department'
        ));
    }
    public function showstudent()
    {
        $email = Auth::user()->email;
        $faculty = Faculty::where('faculty_email', $email)->first();
        $faculty_id = $faculty->faculty_id;
        $studnt = DB::select(
            'SELECT
            s.*
            FROM
            student s
            JOIN
            class c ON s.class_id = c.class_id
            JOIN
            faculty_info f ON c.faculty_id = f.faculty_id
            WHERE
            f.faculty_id = ?',
            [$faculty_id]
        );
        //dd($data);
        return view('facultydashstudentshow', compact('studnt'));
    }

    public function updateinfoview($faculty_id)
    {
        $faculty = Faculty::find($faculty_id);
        return view('facultylogininfoupdate', compact('faculty'));
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
        return redirect('/faculty_dashboard')->with('success', 'Faculty updated successfully.');
    }
}
