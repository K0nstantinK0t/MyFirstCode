<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        if(Auth::check()) {
            return redirect('userpage');
        }

        if($request->method() == 'POST') {

            $validatedFields = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(User::where('email', $validatedFields['email'])->exists())
                return back()->withErrors([
                    'email' => 'User with the same email already registered in the system.'
                ]);

            $user = User::create($validatedFields);
            if($user) {
                Auth::login($user);
                return redirect('/userpage');
            }
            else
                return back()->withErrors([
                    'registrationError' => 'User can\'t be registered'
                ]);
        }
        return view('registration');
    }
    public function authorization(Request $request)
    {
        if(Auth::check()) {
            return redirect('userpage');
        }
        if($request->method() == 'POST')
        {
            $credentials = $request->only('email', 'password');
            $remember = $request->input('remember');
            if (Auth::attempt($credentials, $remember)) {
                return redirect()->intended('userpage');
            }
            else
                return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        return view('authorization');
    }
    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
