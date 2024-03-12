<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'name',
        'parent_id',
        'description',
        'content',
        'slug',
        'active',
    ];
    public function products()
    {
        return $this->hasMany(product::class,'menu_id','id');
    }
}
