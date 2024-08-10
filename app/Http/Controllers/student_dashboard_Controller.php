<?php

namespace App\Http\Controllers;

use App\Models\clss;
use App\Models\studnt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class student_dashboard_Controller extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        // $pwd = Auth::user()->password;
        $student = studnt::where('email_address', $email)->first();
        $clss = clss::all();
        $student_id = $student->student_id;
        $class_id = $student->class_id;
        $institute_id = $student->institute_id;
        $student_name = $student->student_name;
        $dob = $student->dob;
        $gender = $student->gender;
        $address = $student->address;
        $parent_guardian_contact_info = $student->parent_guardian_contact_info;
        $other_contact = $student->other_contact;
        $email_address = $student->email_address;

        return view(
            'studentdashboard',
            compact(
                'student_id',
                'class_id',
                'institute_id',
                'student_name',
                'dob',
                'gender',
                'address',
                'parent_guardian_contact_info',
                'other_contact',
                'email_address',
                'clss'
            )
        );
    }

    public function edit($student_id)
    {
        $instituteId = Auth::user()->institute_id;
        $studnt = studnt::find($student_id);
        $classes = DB::table('class')
            ->where('institute_id', $instituteId)
            ->pluck('class_name', 'class_id')
            ->toArray();
        return view('studentloginEdit', compact('studnt', 'classes'));
    }

    public function update(Request $data)
    {

        $data->validate(
            [
                //'student_id' => 'required',
                'student_name' => 'required',
                'dob' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'parent_guardian_contact_info' => 'required|regex:/^[0-9]{10}$/|distinct|numeric',
                'other_contact' => 'required|regex:/^[0-9]{10}$/|distinct|numeric|different:parent_guardian_contact_info',
                'class_id' => 'required'
            ]
        );

        $studnt = studnt::find($data->input('update_id'));

        $oldemail = $studnt->email_address;
        $name = $data->input('student_name');
        $email = $data->input('email_address');
        $institute_id = Auth::user()->institute_id;
        //$password = Hash::make($data->input('password'));
        $role = 'Student';
        DB::update("UPDATE `users` SET `name`='$name',`email`='$email',`institute_id`=$institute_id,`role`='$role' WHERE `email`='" . $oldemail . "'");
        // $studnt->student_id = $data->input('student_id');
        $studnt->student_name = $data->input('student_name');
        $studnt->dob = $data->input('dob');
        $studnt->gender = $data->input('gender');
        $studnt->address = $data->input('address');
        $studnt->parent_guardian_contact_info = $data->input('parent_guardian_contact_info');
        $studnt->other_contact = $data->input('other_contact');
        $studnt->email_address = $data->input('email_address');
        $studnt->class_id = $data->input('class_id');
        $studnt->save();
        return redirect('/student_dashboard')->with('success', 'Updated successfully.');
    }
}
