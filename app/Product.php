<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    public function details()
    {
        return $this->hasMany(ProductDetail::class,'product_id')->select('id','product_id','unit_price','qty');
    }
}
