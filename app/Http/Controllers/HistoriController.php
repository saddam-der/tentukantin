<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Barryvdh\DomPDF\Facade as PDF;

use App\Models\detail_pesanan;
use App\Models\pesanan;


class HistoriController extends Controller
{
    //
    public function index()
    {
        $pesanans = pesanan::where('status', "selesai")->get();

        return view('histori', compact('pesanans'));
    }

    public function detail($id_pesan)
    {
        $pesanan = pesanan::where('id_pesan', $id_pesan)->first();
        $pesanan_details = detail_pesanan::where('id_pesan', $pesanan->id_pesan)->get();

        return view('detail', compact('pesanan','pesanan_details'));
    }

    public function cetak_pdf($id_pesan)
    {
        $pesanan = pesanan::where('id_pesan', $id_pesan)->first();
        $pesanan_details = detail_pesanan::where('id_pesan', $pesanan->id_pesan)->get();

        $pdf = PDF::loadView('cetak.struk_pdf', compact('pesanan','pesanan_details'));
        
        return $pdf->download('struk.pdf');
    }
}
