<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakturdetail extends Model
{
    use HasFactory;

    protected $guard = [
        'invoice'
    ];
    
    protected $fillable = [
        'quantity',
        'address',
        'postal'
    ];

    public function faktur(){
        return $this->belongsTo(faktur::class);
    }
    public function cart(){
        return $this->hasMany(cart::class);
    }

}
