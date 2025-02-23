<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApprovalModule;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-products')->only('index');
        $this->middleware('permission:create-products')->only(['create', 'store']);
        $this->middleware('permission:edit-products')->only(['edit', 'update']);
        $this->middleware('permission:delete-products')->only('destroy');
    }

    public function index()
    {
        $product = Product::all();
        return view('products.index', compact('product'));
    }

    public function create($lang)
    {
        $languages = Language::All();
        $categories = Category::all();
        return view('products.create', compact('languages', 'categories'));
    }

    public function store($lang, Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/products');
        

        $product = Product::create([
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'slug' => [],
            'name' => [],
            'content' => [],
            'date_published' => $request->date_published,
            'end_date' => $request->end_date,
        ]);
    
        foreach ($request->input('translations', []) as $locale => $data) {
            $product->setTranslation('name', $locale, $data['name']);
            $product->setTranslation('content', $locale, $data['content']);
            $product->setTranslation('slug', $locale, Str::slug($data['name']));
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                foreach ($matches[2] as $imageUrl) {
                    $product->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }
    
        $product->save();

        $approvalModule = ApprovalModule::find(5) ?? ApprovalModule::find(1);

         $approvalTypes = $approvalModule->pluck('id');

         foreach ($approvalTypes as $typeId) {
             $product->requiredApprovals()->create(['approval_type_id' => $typeId]);
         }
    
        return redirect()->route('products.index', ['lang' => $lang])
            ->with('success', __('Product created successfully!'));
    }

    public function edit($lang, Product $product)
    {
        $languages = Language::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'languages', 'categories'));
    }
    
    public function update($lang, Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('public/products');
        }

        $product->category_id = $request->category_id;
        $product->date_published = $request->date_published;
        $product->end_date = $request->end_date;
        $product->is_published = $request->is_published;

        foreach ($request->input('translations', []) as $locale => $data) {
            $product->setTranslation('name', $locale, $data['name']);
            $product->setTranslation('content', $locale, $data['content']);
            $product->setTranslation('slug', $locale, Str::slug($data['name']));
            
            preg_match_all('/<img[^>]+src=([\'"])?((.*?)\1)/i', $data['content'], $matches);
            
            if (!empty($matches[2])) {
                $product->images()->delete();
                
                foreach ($matches[2] as $imageUrl) {
                    $product->images()->create([
                        'url' => $imageUrl
                    ]);
                }
            }
        }

        $product->approvals()->delete();

        $approvalModule = ApprovalModule::find(5) ?? ApprovalModule::find(1);

        $approvalTypes = $approvalModule->pluck('id');
        
        $product->requiredApprovals()->delete();
        foreach ($approvalTypes as $typeId) {
            $product->requiredApprovals()->create(['approval_type_id' => $typeId]);
        }
    
        $product->save();
    
        return redirect()->route('products.index', ['lang' => $lang])
            ->with('success', __('Product updated successfully!'));
    }
    
    public function destroy($lang, Product $product)
    {
        foreach ($product->images as $image) {
            $path = str_replace(asset(''), public_path(), $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($product->image) {
            Storage::delete($product->image);
        }
        
        $product->images()->delete();
        $product->delete();
    
        return redirect()->route('products.index', ['lang' => $lang])
            ->with('success', __('Product deleted successfully!'));
    }

    public function show($lang, Product $product)
    {
        $related_products = Product::where('category_id', $product->category_id)
                           ->where('id', '!=', $product->id)
                           ->take(5)
                           ->get();
        return view('products.show', compact('product', 'related_products'));
    }
}
