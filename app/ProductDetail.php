<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ProductDetail extends Eloquent
{
    protected $collection ='product_details';
}
