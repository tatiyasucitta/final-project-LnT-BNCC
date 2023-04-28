<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable =[
        'categoryName'
    ];

    public function Item(){
        return $this->hasMany(Item::class);
    }
}
