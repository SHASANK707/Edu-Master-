<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Clsscontroller extends Controller
{
    public function index()
    {
        $instituteId = Auth::user()->institute_id;
        $facultyNames = DB::table('faculty_info')
        ->where('institute_id', $instituteId)
        ->pluck('faculty_name', 'faculty_id')
        ->toArray();
        return view('clss', compact('facultyNames'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'class_name' => 'required|max:20',
            'faculty_id' => [
                'required',
                'exists:faculty_info,faculty_id',
                function ($attribute, $value, $fail) {
                    if (clss::where('faculty_id', $value)->exists()) {
                        $fail('The selected class teacher is already assigned to another class.');
                    }
                }
            ],
            'location' => 'required'
        ]);
    
        $user = auth()->user();
        $class = new clss();
        $class->institute_id = $user->institute_id;
        $class->class_name = $request->input('class_name');
        $class->faculty_id = $request->input('faculty_id');
        $class->location = $request->input('location');
        $class->save();
    
        return redirect()->back()->with('success', 'Data Added successfully');
    }
    

    //UPDATE
    public function update(Request $data)
{
    $class = clss::find($data->input('update_id'));

    $class->class_name = $data->input('class_name');
    $class->faculty_id = $data->input('faculty_id');
    $class->location = $data->input('location');
    $class->save();

    return redirect()->route('clss.view')->with('success', 'Class data updated successfully!');
}


//view    
public function view(){
    $userInstituteId = Auth::user()->institute_id;
    $class = clss::where('institute_id', $userInstituteId)->get();
    return view('clssView', compact('class'));
}

public function delete($class_id)
{
    $class = clss::find($class_id);
    $class->delete();

    // Additional logic or redirection after successful data deletion

    return redirect()->back()->with('success', 'Data deleted successfully!');
}

public function edit($class_id)
{
    $class = clss::find($class_id);
    $instituteId = Auth::user()->institute_id;
        $facultyNames = DB::table('faculty_info')
        ->where('institute_id', $instituteId)
        ->pluck('faculty_name', 'faculty_id')
        ->toArray();
    return view('clssEdit', compact('class','facultyNames'));
}
}