<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request, $id)
    {
        if(Auth::id()){
            $user = auth()->user();
            $cart = new cart;
            $product = Item::find($id);
            $cart->itemName = $product->nama;
            $cart->quantity = $request->quantity;
            $cart->itemId = $id;
            $cart->userId = $user->id;
            $cart->save();
            return redirect()->back()->with('success', 'Item Added to cart!');
        }
        else{
            return view('auth.login');
        }
    }
}
