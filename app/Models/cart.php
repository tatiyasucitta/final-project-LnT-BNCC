<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    public function item(){
        return $this->belongsTo(item::class);
    }
    public function fakturdetail(){
        return $this->belongsTo(fakturdetail::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
