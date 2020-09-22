<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\detail_pesanan;
use App\Models\masakan;
use App\Models\pesanan;

use UxWeb\SweetAlert\SweetAlert;

class OrderController extends Controller
{
    //
    public function addOrder(Request $request, $id_masakan)
    {
        $masakan = masakan::where('id_masakan', $id_masakan)->first();
        $tanggal = Carbon::now();

        //cek validasi
        $cek_pesanan = pesanan::where('id_user',Session::get('id_user'))->where('status','belum')->first();
        if(empty($cek_pesanan))
        {
            //simpan ke tbl pesanan
            $pesanan = new pesanan;
            $pesanan->id_user = Session::get('id_user');
            $pesanan->tanggal_pesan = $tanggal;            
            $pesanan->status = "belum";
            $pesanan->jumlah_harga = 0;
            $pesanan->total_bayar = 0;
            $pesanan->save();
        }
        //
        $pesanan_baru = pesanan::where('id_user',Session::get('id_user'))->where('status','belum')->first();
        //cek pesanan detail
        $cek_pesanan_detail = detail_pesanan::where('id_masakan',$id_masakan)->where('id_pesan', $pesanan_baru->id_pesan)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new detail_pesanan;
            $pesanan_detail->id_masakan = $id_masakan;
            $pesanan_detail->id_pesan = $pesanan_baru->id_pesan;
            $pesanan_detail->jumlah = $request->jumlah;
            $pesanan_detail->jumlah_harga = $masakan->harga*$request->jumlah;
            $pesanan_detail->save();
        }else
        {
            $pesanan_detail = detail_pesanan::where('id_masakan',$id_masakan)->where('id_pesan', $pesanan_baru->id_pesan)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah;
            //harga sekrang
            $harga_pesanan_detail_baru = $masakan->harga*$request->jumlah;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = pesanan::where('id_user',Session::get('id_user'))->where('status','belum')->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $masakan->harga*$request->jumlah;
        $pesanan->update();

        alert()->success('Pesanan Berhasil Masuk Keranjang', 'Optional Title');
        return redirect()->route('index');
    }

    public function checkout()
    {
        $pesanan = pesanan::where('id_user',Session::get('id_user'))->where('status','belum')->first();
        $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = detail_pesanan::where('id_pesan', $pesanan->id_pesan)->get();
        }
        return view('kasir.checkout', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id_masakan)
    {
        $pesanan_detail = detail_pesanan::where('id_masakan', $id_masakan)->first();

        $pesanan = pesanan::where('id_pesan', $pesanan_detail->id_pesan)->first();    
        
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        
        $pesanan_detail->delete();

        alert()->error('Pesanan Sukses Di hapus', 'Success');
        return redirect('checkout');
    }

    public function confirm(Request $request)
    {
        $pesanan = pesanan::where('id_user',Session::get('id_user'))->where('status','belum')->first();
        $pesanan->total_bayar = $request->uang;
        $pesanan->status = "selesai";
        $pesanan->update();

        alert()->error('Pesanan Sukses Check Out', 'Success');
        return redirect('checkout');
    }

}
