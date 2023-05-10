<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\faktur;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;


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
    public function userviewpage(){
        $items = Item::all();
        return view('homeuser', ['items' =>$items]);
    }
    public function create(){
        return view('create', ['cat' => Category::all()]);
    }
    public function created(request $request){
        // return $request->file('image')->store('post-images');

        $request->validate([
            "nama" => "required|min:5|max:80",
            "harga" =>"required|numeric",
            "jumlah" =>"required|numeric",
            "category_id" =>"required",
            "image" =>"required|mimes:jpg,jpeg,png"
        ]);
        // $userid = auth()->id();
        // $user = User::with('faktur')->find($userid);
        // $user = User::find($userid);
        // $user = faktur::where('user_id', $userid);
        // @dd($user->id);
        $input = $request->all();

        if($request->hasFile('image')){
            $destination_path = 'public/images/products';
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image_name = Str::random(10) . '_' . $img_name;
            $path = $request->file('image')->storeAs($destination_path, $image_name);
        
            $input['image'] = $image_name;
        }
        // if ($request->img) {
        //     $file = $request->File('img');
        //     $ext  = $user->username . "." . $file->clientExtension();
        //     $file->storeAs('images/', $ext);
        //     $user->image_name = $ext;
        // }

        // $img = $request->file('bookImg')->getClientOriginalName();
        // $newNameBookImg = Str::random(10) . '_' . $img;
        // $request->file('bookImg')->storeAs('public/', $newNameBookImg);

        Item::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'category_id' => $request->category_id,
            'image' => $image_name,
            // 'faktur_id' => $user->id
        ]);
       
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
