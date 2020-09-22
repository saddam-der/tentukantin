<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data && Hash::check($password, $data->password)) {
            Session::put('id_user', $data->id_user);
            Session::put('name', $data->name);
            Session::put('email', $data->email);
            Session::put('level', $data->level);
            Session::put('foto', $data->foto);
            if($data->level == "kasir"){
                return redirect()->route('index');
            } else if($data->level == "admin"){
                return redirect()->route('admin.index');
            } else if($data->level == "owner"){
                return redirect('histori');
            }
        }
        else{
            return redirect()->route('login');
        }                                                                                                                                                                     
    } 

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
