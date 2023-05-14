<?php

namespace App\Http\Controllers;

use App\Models\fakturdetail;
use App\Models\Item;
use App\Models\faktur;
use App\Models\Cart;
use App\Models\User;
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
        ]);

        $userid = auth()->id();
        $faktur = faktur::where('user_id', $userid)->firstorfail();
        $invoice1 = $faktur->invoice;
        fakturdetail::create([
            'address' => $request->address,
            'postal' => $request->postal,
            'quantity' => $request->quantity,
            'invoice' => $invoice1
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
