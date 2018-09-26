<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use Faker\Provider\Company;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('details')->orderBy('price','ASC')->get();
    }
    public function store(Request $request){
        for($i = 1; $i<=10; $i++){
            $p = new Product();
            $p->title = Company::shuffleString('Hello world');
            $p->price = rand(1,9000);
            $p->location = Company::shuffleString('Dhaka Mirpur');
            $p->save();
            for($j=1; $j<=5; $j++){
                $d = new ProductDetail();
                $d->product_id = $p->id;
                $d->qty = rand(1,100);
                $d->unit_price = rand(1,2984);
                $d->save();
            }
        }

    }
}
