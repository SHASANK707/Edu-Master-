<?php

//namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{

    // public function admin(){
    //     return view('admin');
    // }

    public function redirctToLogin()
    {
            $route = '/login';
            return redirect($route);
    }
    public function login()
    {
        return view('login');
    }

    public function register1()
    {
        return view('register1');
    }

    public function loadRegister()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function loadLogin()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function loginUser(Request $data)
    {
        if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return redirect()->back()->with('error', 'Invalid email or password');
    }


    public function registerUser(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'institute_id' => 'required|unique:users|',
            'role' => 'string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $newUser = new users(); // Using 'users' model
            $newUser->institute_id = $validatedData['institute_id'];
            $newUser->role = 'Management';
            $newUser->name = $validatedData['name'];
            $newUser->email = $validatedData['email'];
            // Hash the password for security
            $newUser->password = Hash::make($validatedData['password']);

            if ($newUser->save()) {
                return redirect('/login')->with('success', 'Registered successfully!');
            } else {
                // Debug statement to check if save() method returns false
                dd('Failed to save user');
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error('User registration failed: ' . $e->getMessage());
            // Optionally, return an error response
            return redirect('register')->withErrors('Registration failed. Please try again.');
        }
    }




    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('status', 'You have been successfully logout!!!!');
    }

    public function redirectDash()
    {
        $redirect = '';

        if (Auth::user() && Auth::user()->role == 'Student') {
            $redirect = '/form';
        }

        if (Auth::user() && Auth::user()->role == 'Institute') {
            $redirect = '/form';
        }

        if (Auth::user() && Auth::user()->role == 'Faculty') {
            $redirect = '/form';
        }

        if (Auth::user() && Auth::user()->role == 'Management') {
            $redirect = '/form';
        }

        if (Auth::user() && Auth::user()->role == 'Parents') {
            $redirect = '/form';
        }
        
        return $redirect;
    }
}
