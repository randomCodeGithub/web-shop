<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{

    public function index()
    {
        // \Debugbar::info(request);
        $categories = Category::get();
        return view("pages.index", compact('categories'));
    }

    public function auth()
    {
        return view("pages.auth");
    }

    public function product($category, $product = null)
    {

        $findProduct = Product::withTrashed()->findOrFail($product);

        abort_if($findProduct->category->code != $category, 404);

        return view("pages.product", ['product' => $findProduct]);
    }

    public function category($code, ProductsFilterRequest $request)
    {
        
        $category = Category::byCode($code)->first();
        $productQuery = $category->products();

            if ($request->filled('price_from')) 
                $productQuery->where('price', '>=', $request->price_from);

            if ($request->filled('price_to')) 
                $productQuery->where('price', '<=', $request->price_to);

            $category->products = $productQuery->paginate(12)->withPath('?' . $request->getQueryString());

        if ($category == null)
            return redirect('/');

        return view("pages.category", compact('category'));
    }
}
