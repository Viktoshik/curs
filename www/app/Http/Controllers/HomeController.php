<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        Auth::loginUsingId(2);
        return view('home', ['products' => $products, 'categories' => $categories]);

    }
    public function category(Category $category)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $category->id)->get();
        return view('categories', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function basket(Product $product)
    {
        return view('basket', ['product' => $product]);
    }
}
