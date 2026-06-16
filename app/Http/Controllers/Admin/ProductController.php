<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::withTrashed();
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
            ->paginate(10)
            ->withQueryString();
        $categories = Category::select('id', 'name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }
    public function create()
    {
        $categories = Category::select('name', 'id')->get();
        $weights = Weight::select('name', 'id')->get();
        return view('admin.products.create', compact('categories', 'weights'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'weight_id' => 'required|exists:weights,id',
            'is_available' => 'required|boolean',
            'stock' => 'required|integer|min:0',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp,avif,gif'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'weight_id' => $request->weight_id,
            'is_available' => $request->is_available,
            'stock' => $request->stock
        ]);

        //logica de imagen
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            $product->images()->create([
                'url' => $path,
                'name' => $product->slug
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(String $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('name', 'id')->get();
        $weights = Weight::select('name', 'id')->get();
        return view('admin.products.edit', compact('product', 'categories', 'weights'));
    }

    public function update(Request $request, String $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'weight_id' => 'required|exists:weights,id',
            'is_available' => 'required|boolean',
            'stock' => 'required|integer|min:0',

            'deleted_images' => 'nullable|array',
            'deleted_images.*' => 'exists:images,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp,avif,gif'
        ]);

        $product->update($request->except(['images', 'deleted_images']));

        if ($request->has('deleted_images')) {
            $imagesToDelete = $product->images()->whereIn('id', $request->deleted_images)->get();

            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete($image->url);
                $image->delete();
            }
        }

        // 4. Procesar Subida de Nuevas Imágenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $product->images()->create([
                    'url' => $path
                ]);
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente');
    }
    public function destroy(String $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function restore(String $id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('admin.products.index')->with('success', 'Producto restaurado exitosamente.');
    }
}