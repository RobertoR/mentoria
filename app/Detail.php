<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Detail extends Model
{
    protected $fillable = ['product_id', 'quantity', 'price'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
