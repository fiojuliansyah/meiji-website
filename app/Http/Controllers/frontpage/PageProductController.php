<?php

namespace App\Http\Controllers\frontpage;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageProductController extends Controller
{
    public function category($lang, $slug)
    {
        $category = Category::where('slug->'.$lang, $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
                    ->latest()
                    ->paginate(9);

        return view('frontpage.products.category', compact('products', 'category'));
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
