<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_available', true)->paginate(12);
        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }
}
