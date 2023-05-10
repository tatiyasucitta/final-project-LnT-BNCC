<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faktur extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(user::class);
    }

    public function fakturdetail(){
        return $this->hasMany(fakturdetail::class);
    }
}
