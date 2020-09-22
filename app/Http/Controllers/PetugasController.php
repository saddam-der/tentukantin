<?php

namespace App\Http\Controllers;

use App\Models\masakan;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
  
    public function index()
    {
        //
        $petugas = user::all();

        return view('petugas.index', compact('petugas'));
    }

  
    public function getRegister()
    {
        return view('petugas.create');
    }


    public function postRegister(Request $request)
    {
        $validateData =$request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'required',
        ]);

        $foto = $request->file('foto')->store('img/profile');

        $user = new User;
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = bcrypt($validateData['password']);
        $user->level = $validateData['level'];
        $user->foto = $foto;
        $user->save();
        
        return redirect()->route('admin.petugas');
        // dd('test regis');
    }


    // public function edit($id_user)
    // {
    //     $petugas = user::find($id_user);
    //     return view('petugas.edit', compact('petugas'));
    // }

    
    // public function update(Request $request)
    // {
    //     //
    //     // $validateData = $request->validate([
    //     //     'name'      => 'required',
    //     //     'email'             => 'required',
    //     //     'level'            => 'required',
    //     //     'password'            => 'min:3',
    //     //     'foto'    => 'file|image|mimes:jpeg,png,jpg|max:2048',
    //     // ]);

        
    //     if ($request->foto) {
    //         Storage::delete($request->foto);
    //         $foto = $request->file('foto')->store('img/profile');
    //         DB::table('users')->where('id_user',$request->id_user)->update([
    //             'foto' =>$foto
    //         ]);
    //     }
        

    //     // $id_user->name = $validateData['name'];
    //     // $id_user->email = $validateData['email'];
    //     // $id_user->password = $validateData['password'];
    //     // $id_user->level = $validateData['level'];
    //     // $id_user->update();

    //     DB::table('users')->where('id_user',$request->id_user)->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ]);

    //     return redirect()->route('petugas.index')->with('success', 'Makanan  Berhasil di Update');
    // }

    
    public function destroy($id_user)
    {
        //
        DB::table('users')->where('id_user',$id_user)->delete();

        return redirect()->route('petugas.index')->with('success', 'Makanan Berhasil Dihapus');
    }
}
