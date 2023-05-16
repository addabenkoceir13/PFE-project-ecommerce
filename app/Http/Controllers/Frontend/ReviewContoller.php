<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewContoller extends Controller
{
    public function addreview(Request $request)
    {
        $id_product   = $request->input('id_product');
        $name_product = $request->input('name_product');
        $user_review  = ucfirst($request->input('user_review'));

        $product = Products::where('id', $id_product)->first();
        if ($product)
        {
            $verified_purchase = Order::where('order.id_user', Auth::id())
                                        ->join('invoices', 'order.id', 'invoices.id_order')
                                        ->where('invoices.id_prod', $id_product)->get();
            $product = Products::where('id', $id_product)->first();

            $review = Review::where('id_user', Auth::id())->where('id_prod', $product->id )->get();

            if ($verified_purchase->count() > 0)
            {
                Review::create([
                    'id_user'     =>  Auth::id(),
                    'id_prod'     =>  $id_product,
                    'user_review' =>  $user_review,
                ]);
                return response()->json(['message'=> " Thank you for writing a review"]);

            }
            else
            {
                return response()->json(['messageerroe'=> "You are not eligible to review this product.
                For the trusthiness of the reviews, only customers who purchased
                the product can write a review about the product."]);
            }

        }
        else
        {
            return response()->json(['messageerroe'=> "The link You followed was broken"]);
        }

    }


    public function editreview($nameprod)
    {
        $product = Products::where('name_prod', $nameprod)->first();

        if ($product)
        {
            $id_prod = $product->id;
            $review = Review::where('id_user', Auth::id())->where('id_prod', $id_prod)->first();

            if ($review)
            {
                return view('frontend.reviews.edite', compact('review','product'));
            }
            else
            {
                return redirect()->back()->with('statuserror', 'The link You followed was broken');
            }
        }
        else
        {
            return redirect()->back()->with('statuserror', 'The link You followed was broken');
        }
    }

    public function update(Request $request)
    {
        $user_review = ucfirst($request->input('user_review'));

        if ($user_review != '')
        {
            $id_review = $request->input('id_review');
            $review = Review::where('id', $id_review)->where('id_user', Auth::id())->first();
            if ($review)
            {
                $review->user_review = $user_review;
                $review->update();
                return redirect('category/'. $review->products->category->name_cate.'/'.$review->products->name_prod)->with('status', 'Thank you for writing a review');
            }
        }
        else
        {
            return redirect()->back()->with('statuserror', 'You cannot submit an empty review');
        }
    }
}
