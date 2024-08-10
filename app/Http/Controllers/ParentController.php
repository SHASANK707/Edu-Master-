<?php
namespace App\Http\Controllers;
use App\Models\Parents; // Ensure the model name is capitalized
use Illuminate\Http\Request;
use App\Models\Users; // Ensure the model name is capitalized
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\Demomail;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institute_id = Auth::user()->institute_id;
        $classes = DB::table('student')
            ->where('institute_id', $institute_id)
            ->pluck('student_name', 'student_id'); 
        $parents = Parents::all();
        return view('parent_info', compact('parents', 'classes'));
    }
    // public function index1()
    // {
    //     return view('parentdashboard');
    // }
    public function insert(Request $request)
    {
        $request->validate([
            'parent_name' => 'required|string|max:255',
            'contact_number' => 'required|numeric',
            'parent_email' => 'required|email|unique:parent,parent_email',
            'address' => 'required|string|max:255',
            'relationship_to_student' => 'required|string|in:F,M,G',
            'student_id' => 'required'
        ]);
        $parent = new Parents();
        $parent->institute_id = Auth::user()->institute_id;
        $parent->parent_name = $request->input('parent_name');
        $parent->contact_number = $request->input('contact_number');
        $parent->parent_email = $request->input('parent_email');
        $parent->address = $request->input('address');
        $parent->relationship_to_student = $request->input('relationship_to_student');
        $parent->student_id = $request->input('student_id');
        $parent->save();
        $user = new Users();
        $user->name = $request->input('parent_name');
        $user->email = $request->input('parent_email');
        $user->institute_id = Auth::user()->institute_id;
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Parents';
        $user->save();
        $mailData = [
            'email' => $request->input('parent_email'),
            'password' => $request->input('password')
        ];
        
        // Send email
        Mail::to($request->input('parent_email'))->send(new Demomail($mailData));
        return redirect()->back()->with('success', 'Parent added successfully.');
    }
    public function update(Request $request)
    {
        $parent = Parents::find($request->input('update_id'));
        $oldEmail = $parent->parent_email;
        $users = users::where('email', $oldEmail)->first();
        $id = $users->id;

        $request->validate([
            'parent_name' => 'required|string|max:255',
            'contact_number' => 'required|numeric',
            'parent_email' => 'required|email|unique:parent,parent_email,' . $request->input('update_id') . ',parent_id',
            'address' => 'required|string|max:255',
            'relationship_to_student' => 'required|string|in:F,M,G'
        ]);
        if (!$parent) {
            return redirect()->back()->withErrors('Parent not found.');
        }
        // Check if email is being updated
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
        return redirect('/parent/show')->with('success', 'Parent updated successfully.');
    }
    public function delete($parent_id)
    {
        $parent = Parents::find($parent_id);
        if (!$parent) {
            return redirect()->back()->withErrors('Parent not found.');
        }
        $user = Users::where('email', $parent->parent_email)->first();
        if ($user) {
            $user->delete();
        }
        $parent->delete();
        return redirect()->back()->with('success', 'Parent deleted successfully.');
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
        return view('parentinfoupdate', compact('parent','classes'));
    }
    public function showparent()
    {
        $parents = Parents::all();
        return view('parentinfoview', compact('parents'));
    }
}