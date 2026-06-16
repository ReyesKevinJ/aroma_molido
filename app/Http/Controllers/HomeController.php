<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        $query->when($request->filled('search'), function ($q) use ($request) {
            $searchTerm = '%' . $request->search . '%';
            $q->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('name', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm);
            });
        });

        $query->when($request->filled('category_id'), function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        });

        $products = $query->with('category')
            ->latest('id')
            ->where('is_available', true)
            ->paginate(10)
            ->withQueryString();
        $categories = Category::select('id', 'name')->get();

        return view('welcome', compact('products', 'categories'));
    }
}
