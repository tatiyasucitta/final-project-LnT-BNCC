<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\faktur;
use App\Models\Cart;
use App\Models\User;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Auth;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createinvoice(request $request)
    {
        
        $harga = faktur::with('Item')->get();
        $invoice = faktur::where('user_id')->find($userid);
        $cart = Cart::all();
        return view('faktur',['items'=> $cart, 'harga'=>$harga]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(faktur $faktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(faktur $faktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, faktur $faktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(faktur $faktur)
    {
        //
    }
}
