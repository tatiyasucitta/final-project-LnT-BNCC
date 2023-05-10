<?php

namespace App\Http\Controllers;

use App\Models\fakturdetail;
use App\Models\Item;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class FakturdetailController extends Controller
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
    public function create(request $request)
    {
        $request->validate([
            'address' =>'required|min:10|max:100',
            'postal' =>'required|min:5',
            'quantity' => 'required'
            ])
            $year = substr(Carbon::now()->year, 2, 4);
            $invoice->id = Str::random(3) . "." . "000.888" . $year . '.' . mt_rand(100, 999);
            $invoice->user_id = $user;
            $invoice->save();
        fakturdetail::create([
            'address' => $request->address,
            'postal' => $request->postal,
            'quantity' => $request->quantity,
            'invoice' => 
        ]);
        $user = auth()->id();
        $invoice = new faktur;
        $cart = Cart::all();
        
        return view('faktur',['items'=> $cart
            // ,'invoice' =>$invoice
            ]);
        
        return redirect('/ordered')->with('success', 'Order created!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
     //
    }

    /**
     * Display the specified resource.
     */
    public function show(fakturdetail $fakturdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fakturdetail $fakturdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fakturdetail $fakturdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fakturdetail $fakturdetail)
    {
        //
    }
}
