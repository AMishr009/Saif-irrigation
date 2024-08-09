<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register');        
    }

    public function register(Request $request) { //Function to register user
        
        $request->validate(
            ['name' => 'required',
             'email' => 'required|email|unique:users',
             'role' => 'required',
              'password' => 'required|min:8|confirmed',
              'password_confirmation' => 'required|min:8']
        );

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;

        $res = $user->save();

        if($res)
        {
            return back()->with('Success', 'Registration Successful!!');
        }
        else
        {
            return back()->with('fail', 'Some error occured!');
        }
        
    }

    public function loginindex() {
        return view('login');        
    }

    public function viewuser()
    {
        $users = User::all()->where('role', 'user');
        $data = compact('users');
        return view ('all-users')->with($data);
    }

    // public function login(Request $request) { //Function to login user
        
    //     $request->validate(
    //         ['email' => 'required|email',
    //           'password' => 'required|min:8']
    //     );

    //     $user = User::where('email', '=', $request->email)->first();

    //     // $user->email = $request->email;
    //     // $user->password = $request->password;

    //     if($user)
    //     {
    //         if(Hash::check($request->password, $user->password))
    //         {
    //             $request->session()->put('userid', $user->id);
    //             $request->session()->put('username', $user->name);
    //             return redirect('irrigation');
    //         }
    //         else
    //         {
    //             return back()->with('fail', 'Email or password is incorrect!');
    //         }
    //     }
    //     else
    //     {
    //         return back()->with('fail', 'No such user exists!!');
    //     }
      
        
    // }

    public function login(Request $request) {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
    
        // Retrieve the user based on the provided email
        $user = User::where('email', '=', $request->email)->first();
    
        if ($user) {
            // Check if the user's role is 'user' and their status is 0
            if ($user->role == 'user' && $user->status == 0) {  
                return back()->with('fail', 'You are not authorized to login. Please wait till admin approves the login!');
            }
        
            // Check if the provided password matches the hashed password in the database
            if (Hash::check($request->password, $user->password)) {
                // Store user information in the session
                Auth::login($user);
        
                // Redirect based on the user's role
                if ($user->role == 'super_admin') {
                    return redirect('all-users');
                } elseif ($user->role == 'admin') {
                    return redirect('all-users');
                } else {
                    return redirect('irrigation');
                }
            } else {
                // Password mismatch
                return back()->with('fail', 'Email or password is incorrect!');
            }
        } else {
            // No user found with the provided email
            return back()->with('fail', 'No such user exists!!');
        }
        
    }

    public function logout(Request $request) //Function to logout user
    {
        // Auth::logout();
        $request->session()->flush();
        return redirect('login');
    }

    public function approveLogin(Request $request, $id)
{
    // Find the user by ID
    $user = User::find($id);

    if ($user) {
        // Update the status from 0 to 1
        $user->status = 1;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('Success', 'User status updated successfully.');
    }

    // If user not found, return with an error message
    return redirect()->back()->with('error', 'User not found.');
}


public function removeLogin(Request $request, $id)
{
    // Find the user by ID
    $user = User::find($id);

    if ($user) {
        // Update the status from 1 to 0
        $user->status = 0;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('error', 'User status updated successfully. Login deactivated for user');
    }

    // If user not found, return with an error message
    return redirect()->back()->with('error', 'User not found.');
}

}
