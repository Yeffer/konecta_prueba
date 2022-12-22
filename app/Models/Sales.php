<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'product_id',
        'quantity'
    ];

    public function product() {   
        return $this->hasOne(product::class,  'id', 'product_id' );
    }
}
