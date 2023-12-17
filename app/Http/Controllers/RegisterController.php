<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('welcome');
    }

    public function submitRegistrationForm(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16|confirmed',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ],[
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            return back()->with('success', 'Validation passed!');
        }
    }
}
