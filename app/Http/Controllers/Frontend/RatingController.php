<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Notation;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addrating(Request $request)
    {
        $stars_rateds = $request->input('product_rating');
        $id_prod     = $request->input('id_prod');

        $product_check = Products::where('id', $id_prod)->first();
        // ->where('status', '0')
        if ($product_check)
        {
            $verified_purchase = Order::where('order.id_user', Auth::id())
                                ->join('invoices', 'order.id', 'invoices.id_order')
                                ->where('invoices.id_prod', $id_prod)->get();
            if ($verified_purchase->count() > 0)
            {
                $existing_rating = Notation::where('id_user', Auth::id())->where('id_prod', $id_prod)->exists();
                if ($existing_rating)
                {
                    $existing = Notation::where('id_user', Auth::id())->where('id_prod', $id_prod)->first();
                    $existing->stars_rated = $stars_rateds;
                    $existing->update();
                }
                else
                {
                    Notation::create([
                        'id_user'     => Auth::id(),
                        'id_prod'     => $id_prod,
                        'stars_rated' => $stars_rateds,
                    ]);
                }
                return redirect()->back()->with('status', 'Thank you for Rating this Product');
            }
            else
            {
                return redirect()->back()->with('statusalart', 'You cannot rate a product without purchase');
            }
        }
        else
        {
            return redirect()->back()->with('statuserror', 'The link you followed has broken');
        }

    }
}
