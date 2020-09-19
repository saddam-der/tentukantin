<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\detail_pesanan;

class OrderController extends Controller
{
    //
    public function addOrder(Request $request)
    {
        $validateData = $request->validate([
            'id_pesan'        => 'required',
            'id_masakan'      => 'required',
        ]);

        $detail_pesanan = new detail_pesanan();
        $detail_pesanan->id_pesan = $request['id_pesan'];
        $detail_pesanan->id_masakan = $validateData['id_masakan'];
        $detail_pesanan->status_detail = "belum";
        $detail_pesanan->save();

        return redirect()->route('index');
    }
}
