<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'reference',
        'price',
        'weight',
        'category_id',
        'stock'
    ];

    public function category() {   
        return $this->hasOne(Category::class,  'id', 'category_id' );
    }   

}
