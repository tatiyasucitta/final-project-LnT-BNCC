<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga', 
        'jumlah',
        'category_id',
        'image'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function fakturdetail(){
        return $this->belongsTo(fakturdetail::class);
    }
}
