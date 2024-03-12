<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'content',
        'price',
        'price_salce',
        'quantity',
        'menu_id',
        'image',
        'active',
    ];
    public function menu()
    {
        return $this->hasOne(Menu::class,'id','menu_id');
    }
}
