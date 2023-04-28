<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakturdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity'
    ];

    public function faktur(){
        return $this->belongsTo(faktur::class);
    }
    public function item(){
        return $this->hasMany(item::class);
    }

}
