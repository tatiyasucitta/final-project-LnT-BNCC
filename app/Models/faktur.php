<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'postal'
    ];

    public function user(){
        return $this->hasOne(user::class);
    }

    public function fakturdetail(){
        return $this->hasMany(fakturdetail::class);
    }
}
