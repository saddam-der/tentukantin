<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\masakan;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        $menu = DB::table('masakans')->paginate(6);
        if ($request->ajax()) {
            return view('kasir.menu', compact('menu'));
        }
        return view('kasir.menu', compact('menu'));
    }


}
