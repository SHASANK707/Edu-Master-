<?php
namespace App\Http\Controllers;
use App\Models\course;
use App\Models\users;
use App\Models\Institute;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    public function view()
    {
        
        $courses = course::where('institute_id', '!=', '1')->get();
        return view('courseview', compact('courses'));
    }
    public function insertform()
    {   $institutes= Institute::where('institute_id', '!=', '1')->get();
        $users= new users();
        $users = users::where('name', '!=', 'admin')->get();
        return view('courseadd',compact('users','institutes'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            // 'course_id' => 'required|unique:App\Models\course,course_id',
            'institute_id' => 'required',
            'course_name' => 'required',
        ]);
        // $inst = Institute::where('institute_name', $request->institute_name);
        // $use = users::where('id', $request->id);
        // if($inst && $use){
        //     $inst_id = $inst->institute_id;
        //     $u_id = $use->id;
        $courses = new course();
        $courses->institute_id = $request->institute_id;
        $courses->course_name = $request->course_name;
        $courses->save();
        return redirect('/course/courseview')->with('message', 'Course added successfully');

    }
    public function delete($course_id){
        $field=course::find($course_id);
        $field->delete();
        return redirect()->back()->with('message', 'Course deleted successfully.');
    }
    public function edit($course_id)
    {
        $user = new users();
        $user = users::all();
        $course = course::find($course_id);
        $inst_id = $course->institute_id;
        $ins= Institute::where('institute_name', '=', $inst_id)->get();
        return view('courseedit',compact('course','user','ins'));
    }
    public function update(Request $request)
    {
        $course = course::find($request->input('update_id'));
        $course->course_id = $request->input('course_id');
        // $course->user_id = $request->input('user_id');
        $course->course_name = $request->input('course_name');
        // $course = course::find($request->course_id);
        // $course->course_id = $request->course_id;
        // $course->user_id= $request->user_id;
        // $course->course_name = $request->course_name;
        $course->save();
        return redirect()->route('course.view')->with('message', 'Course updated successfully.');
    }
}