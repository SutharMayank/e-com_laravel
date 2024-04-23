<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        if(!$user || !Hash::check($request->password,$user->password))
        {
            return "Username And Password is Not Matched";
        }else{
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name'); // Access input value using input() method
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Assuming password field name is 'password'
        $user->save();
        return redirect('/login');
    }
}
