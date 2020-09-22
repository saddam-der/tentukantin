<?php

namespace App\Http\Controllers;

use App\Models\masakan;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $makanan = masakan::all();

        return view('admin.index', compact('makanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    public function petugas_create()
    {
        //
        return view('admin.petugascreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'nama_masakan'      => 'required',
            'harga'     => 'required',
            'gambar_masakan'    => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = $request->file('gambar_masakan')->store('img/menu');

        // dump($validateData);
        $masakan = new masakan();
        $masakan->nama_masakan = $validateData['nama_masakan'];
        $masakan->harga = $validateData['harga'];
        $masakan->status = "ada";
        $masakan->gambar = $gambar;
        $masakan->save();

        return redirect()->route('admin.index')->with('success', 'Makanan Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(masakan $admin)
    {
        //
        return view('admin.detail', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(masakan $admin)
    {
        //
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masakan $admin)
    {
        //
        $validateData = $request->validate([
            'nama_masakan'      => 'required',
            'harga'             => 'required',
            'status'            => 'required',
            'gambar_masakan'    => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->gambar_masakan) {
            Storage::delete($admin->gambar_masakan);
            $gambar = $request->file('gambar_masakan')->store('img/menu');
            $admin->gambar = $gambar;
        }

        $admin->nama_masakan = $validateData['nama_masakan'];
        $admin->harga = $validateData['harga'];
        $admin->status = $validateData['status'];
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Makanan '. $admin->nama_masakan. ' Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(masakan $admin)
    {
        //
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Makanan Berhasil Dihapus');
    }
}
