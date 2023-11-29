<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(4);
        $categories = Category::where('parent', 0)->get();
        foreach ($categories as $category) {
            $category->children = Category::where('parent', $category->id)->get();
        }
        return view('products',['products'=>$products , 'categories'=>$categories]);

    }
    public function category($catId)
    {
        $products = Product::where('cat', $catId)->paginate(4);
if ($products->isEmpty()) {
    abort(404); // or redirect to a custom 404 page
}
        
        $categories = Category::where('parent', 0)->get();
        foreach ($categories as $category) {
            $category->children = Category::where('parent', $category->id)->get();
        }
        return view('products', ['products' => $products, 'categories'=>$categories]);
    }
}
