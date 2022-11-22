<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $products = Product::query();
        $products->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%".$search."%");
        });
        $queryResult = $products->get();
        //$products = $products->paginate(10);
        return view('home', [
            'products' => $queryResult,
        ]);
    }
}
