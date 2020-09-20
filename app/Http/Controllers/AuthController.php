<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        // if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->back();
        // } else if (auth()->user()->level == 'kasir') {
        //     return redirect()->route('index');
        // } else if (auth()->user()->level == 'admin') {
        //     return redirect()->route('');
        // } else if (auth()->user()->level == 'owner') {
        //     return redirect()->route('');
        // } 
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data && Hash::check($password, $data->password)) {
            Session::put('id_user', $data->id_user);
            Session::put('name', $data->name);
            Session::put('email', $data->email);
            Session::put('level', $data->level);
            if($data->level == "kasir"){
                return redirect()->route('index');
            } else if($data->level == "admin"){
                return redirect()->route('admin.index');
            }
        }
        else{
            return redirect()->route('login');
        }                                                                                                                                                                     
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'user',
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login');
        // dd('test regis');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
