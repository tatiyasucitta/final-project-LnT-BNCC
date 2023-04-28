<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class ItemController extends Controller
{
    public function index(){
        // $items = Item::all();
        return view('login');
    }
    public function view(){
        $items = Item::all();
        return view('home', ['items' =>$items]);
    }
    public function create(){
        return view('create', ['cat' => Category::all()]);
    }
    public function created(request $request){
        return $request->file('image')->store('post-images');

        $request->validate([
            "nama" => "required|min:5|max:80",
            "harga" =>"required|numeric",
            "jumlah" =>"required|numeric",
            "category_id" =>"required",
            // "image" =>"required|mimes:jpg,jpeg,png"
        ]);

        Item::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'category_id' => $request->category_id,
            // 'image' => $request->image
        ]);

        // $file = $request->file('image');

        // $filename = time() . '-' . $file->getClientOriginalName();
        // $path = public_path().'\\pictures\\';

        // $file->move($path, $filename);
        return redirect('admin/home')->with('success', 'Item Added!');
    }

    public function update($id){
        $item = Item::find($id);
        return view('update', [
            'item'=>$item,
            'cat'=>Category::all()
        ]);
    }
    public function updated(Request $request, $id){
        $item = Item::find($id);
        
        $request->validate([
            "nama" => "required|min:5|max:80",
            "harga" =>"required|numeric",
            "jumlah" =>"required|numeric",
            "category_id" =>"required|string"
        ]);

        $item->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'category_id' => $request->category_id
        ]);
        return redirect('admin/home')->with('success', 'Item Updated!');
    }
    
    public function delete($id){
        $item = Item::find($id);
        // dd($employee);
        $item->delete();

        return redirect('admin/home'); 
    }
}
