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
        $menu = DB::table('masakans')->paginate(3);
        if ($request->ajax()) {
            return view('user.menu', compact('menu'));
        }
        return view('user.menu', compact('menu'));
    }

    public function cart()
    {
        $idpes = DB::table('pesanans')->get();
        $menu = DB::table('masakans')->get();
        return view('user.cart', ['id_pes' => $idpes], ['menu' => $menu]);
    }

    public function addToCart($id_masakan)
    {
        $product = masakan::find($id_masakan);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id_masakan => [
                    "nama_masakan" => $product->nama_masakan,
                    "id_masakan" => $product->id_masakan,
                    "jumlah" => 1,
                    "harga" => $product->harga,
                    "gambar" => $product->gambar
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id_masakan])) {

            $cart[$id_masakan]['jumlah']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // // if item not exist in cart then add to cart with quantity = 1
        $cart[$id_masakan] = [
            "nama_masakan" => $product->nama_masakan,
            "id_masakan" => $product->id_masakan,
            "jumlah" => 1,
            "harga" => $product->harga,
            "gambar" => $product->gambar
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->jumlah) {
            $cart = session()->get('cart');

            $cart[$request->id]["jumlah"] = $request->jumlah;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
