<?php

namespace App\Http\Controllers\frontpage;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shetabit\Visitor\Facade\Visitor;

class PageProductController extends Controller
{
    public function category($lang, $slug)
    {
        $category = Category::where('slug->'.$lang, $slug)->firstOrFail();
    
        $products = Product::where('is_published', true)
                        ->where('category_id', $category->id)
                        ->latest()
                        ->paginate(9);
    
        $categories = Category::all();
        
        // Mengambil featured products
        $featured_products = Product::where('is_published', true)
                            ->where('is_featured', true)
                            ->take(3)
                            ->latest()
                            ->get();
    
        return view('frontpage.products.category', compact('products', 'category', 'categories', 'featured_products'));
    }
    
    public function search($lang, Request $request)
    {
        $query = $request->input('q');
        
        // Jika query kosong, redirect kembali
        if (empty($query)) {
            return redirect()->back();
        }
        
        // Cari produk berdasarkan nama atau deskripsi
        $products = Product::where('is_published', true)
                    ->where(function($q) use ($query, $lang) {
                        $q->whereRaw("LOWER(JSON_EXTRACT(name, '$.\"{$lang}\"')) LIKE ?", ['%' . strtolower($query) . '%'])
                        ->orWhereRaw("LOWER(JSON_EXTRACT(description, '$.\"{$lang}\"')) LIKE ?", ['%' . strtolower($query) . '%']);
                    })
                    ->latest()
                    ->paginate(9);
        
        $categories = Category::all();
        
        return view('frontpage.products.search', compact('products', 'categories', 'query'));
    } 

    public function validateCategory($lang, $slug)
    {
        $category = Category::where('slug->' . $lang, $slug)->firstOrFail();
        
        
        $products = Product::where('is_published', true)->where('category_id', $category->id)
        ->latest()
        ->paginate(9);
        
        visitor()->visit();

        return view('frontpage.products.category', compact('category', 'products'));
    }

    public function show($lang, $category_slug, $product_slug) 
    {
        $product = Product::whereJsonContains('slug->' . $lang, $product_slug)
                   ->firstOrFail();
    
        $related_products = Product::where('category_id', $product->category_id)
                           ->where('id', '!=', $product->id)
                           ->take(5)
                           ->get();
    
        return view('frontpage.products.show', compact('product', 'related_products')); 
    }
}

