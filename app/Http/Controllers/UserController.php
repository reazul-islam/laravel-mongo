<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {

        $data = User::all()->toArray();
        echo "<pre>";
        print_r($data);
    }
    public function store(Request $request){
        return $request->all();
    }
}
