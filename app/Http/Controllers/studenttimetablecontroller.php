<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studenttimetable;

class studenttimetablecontroller extends Controller
{
    public function showstudtimeform()
    {
        $Timetables = studenttimetable::all();
        return view(('studentTimetable'), compact('Timetables'));
    }
    public function storestudtimetable(Request $request)
    {
         $validatedData = $request->validate([
        'stud_timetable' => 'required|integer|max:255',
        'student_id' => 'required|integer|',
        'class_id' => 'required|integer|',
        'faculty_id' => 'required|integer|',
        'course_id' => 'required|integer|',
        'day' => 'required|string|max:10',
        'time' => 'required|date_format:H:i',
        'location' => 'required|string|max:255',
    ]);
        
      

        
        $timetable = new studenttimetable();
        $timetable->stud_timetable = $request->stud_timetable;
        $timetable->student_id = $request->student_id;
        $timetable->class_id = $request->class_id;
        $timetable->faculty_id = $request->faculty_id;
        $timetable->course_id = $request->course_id;
        $timetable->day = $request->day;
        $timetable->time = $request->time;
        $timetable->location = $request->location;
        $timetable->save();

        // Return a response
        return redirect()->back()->with('success', 'StudentTimetable added successfully');
    }
    public function delete($stud_timetable)
    {
        $timetable = studenttimetable::find($stud_timetable);
        $timetable->delete();
        return redirect()->back();
    }
    public function showstudtime()
    {
        $Timetables = studenttimetable::all();
        return view(('studtimeinfoview'), compact('Timetables'));
    }
    public function updateinfoview($stud_timetable)
    {
        $timetable = studenttimetable::find($stud_timetable);
        return view(('studtimeinfoupdate'), compact('timetable'));
    }
    public function update(Request $request)
{
    

    // Find the existing record
    $timetable = studenttimetable::find($request->input('update_id'));

    // Update the record with validated data
    $timetable->stud_timetable = $request->input('stud_timetable');
    $timetable->student_id = $request->input('student_id');
    $timetable->class_id = $request->input('class_id');
    $timetable->faculty_id = $request->input('faculty_id');
    $timetable->course_id = $request->input('course_id');
    $timetable->day = $request->input('day');
    $timetable->time = $request->input('time');
    $timetable->location = $request->input('location');
    $timetable->save();

    // Return a response
    return redirect('/studentTimetable/show')->with('success', 'Timetable updated successfully.');
}
}
