<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    public function getProducts(){
        $products = DB::table("products")
            ->where('type1', '=', 2)
            ->get();
        return DataTables::of($products)
            ->make(true);
    }
}
