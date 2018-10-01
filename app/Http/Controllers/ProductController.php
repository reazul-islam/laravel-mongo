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
        return Product::with('details')
            //->where('price','>',3000)
            ->orderBy('created_at','DESC')
            ->limit(2)->get();
    }
    public function store(Request $request){
        Product::truncate();
        for($i = 1; $i<=10; $i++){
            $summary =[
                'total_view'=>rand(1,230),
                'total_sold'=>rand(1,900)
            ];
            $p = new Product();
            $p->title = Company::shuffleString('Hello world');
            $p->price = rand(1,9000);
            $p->location = Company::shuffleString('Dhaka Mirpur');
            $p->summary =$summary;
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
    public function update(Request $request, $id){

        $p = Product::find($id);
        $newSummary = $p->summary;
        $newSummary['total_view'] +=9;
        $p->summary = $newSummary;
        $p->save();
        return $p;
    }
}
