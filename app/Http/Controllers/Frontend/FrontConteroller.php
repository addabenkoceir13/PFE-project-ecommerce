<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Evaluation;
use App\Models\Notation;
use App\Models\Products;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontConteroller extends Controller
{
    public function index()
    {
        $featured_products_phone = Products::where('id_cate','1')->get();
        $featured_products_compt = Products::where('id_cate','2')->get();

        return view('Frontend.index', compact('featured_products_phone', 'featured_products_compt'));
    }

    public function category()
    {
        $category = Category::all();
        return view('Frontend.category.categoer', compact('category'));
    }

    public function viewcategory(Request $request ,$name)
    {
        $id_prod = $request->input('id_product');
        if(Category::where('name_cate',$name)->exists())
        {
            $category = Category::where('name_cate', $name)->first();
            $products = Products::where('id_cate', $category->id)->get();

            return view('Frontend.products.index', compact('category', 'products'));
        }
        else{
            return redirect('/')->with('statuserror', ' doesnot exists');
        }
    }

    public function viewproduct($namecate, $nameprod)
    {
        if(Category::where('name_cate', $namecate)->exists())
        {
            if(Products::where('name_prod', $nameprod)->exists())
            {
                $products = Products::where('name_prod', $nameprod)->first();
                $ratings   = Notation::where('id_prod', $products->id)->get();
                $rating_sum = Notation::where('id_prod', $products->id)->sum('stars_rated');
                $user_rating   = Notation::where('id_prod', $products->id)->where('id_user', Auth::id())->first();

                $reviews = Review::where('id_prod',$products->id)->get();

                if ($ratings->count() > 0)
                {
                    $rating_value = $rating_sum/$ratings->count();
                }
                else
                {
                    $rating_value = 0;
                }

                return view('Frontend.products.veiw', compact('products','ratings', 'rating_value', 'user_rating','reviews'));
            }
            else{
                return redirect('/')->with('statuserror', 'Doesnot existss');
            }

        }
        else{
            return redirect('/')->with('statuserror', 'Doesnot existss');
        }
    }

    public function productlistajax()
    {
        $products = Products::select('name_prod')->get();
        $data = [];

        foreach($products as $item)
        {
            $data[] = $item['name_prod'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->input('name_prod');

        if ($searched_product != '') {
            $products = Products::where('name_prod', "LIKE", "%$searched_product%")->first();

            if ($products)
            {
                return redirect('category/'. $products->category->name_cate.'/'.$products->name_prod);
            }
            else
            {
                return redirect()->back()->with('statuserror', 'No Products matched your search');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
