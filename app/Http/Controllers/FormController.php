<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth; // Add this line
use App\Models\Institute;
use App\Models\studnt;
use App\Models\Faculty;

class FormController extends Controller
{
    /**
     * Display the form.
     *
     * @return \Illuminate\View\View
     */
 

    public function showForm()
    {
        $all = DB::select("select count(student_id) as student_count from student where institute_id = ".Auth::user()->institute_id);
        $all1 = DB::select("select count(faculty_id) as faculty_count from faculty_info where institute_id = ".Auth::user()->institute_id);
        //dd($all);
        $rowCount1 = $all[0]->student_count;
        $rowCount2 = $all1[0]->faculty_count;
        $rowCount3 = Institute::count();
        return view('welcome', [
            'rowCount1' => $rowCount1,
            'rowCount2' => $rowCount2,
            'rowCount3' => $rowCount3,
        ]);
    }

    /**
     * Handle form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email_verified' => 'required|in:yes,no',
        ]);

        // Process the form data here
        // For example, you can create a new user or update a database record

        // Redirect back to the form page with a success message
        return redirect()->route('form')->with('success', 'Form submitted successfully!');
    }
    
}
