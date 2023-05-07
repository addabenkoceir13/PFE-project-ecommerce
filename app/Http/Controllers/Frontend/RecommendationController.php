<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notation;
use App\Models\Products;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function extractFeatures()
    {
        $users = Notation::all();
        $user_id = 5; // ID of the user to get recommendations for

            // Retrieve all ratings for the given user
            $ratings = Notation::where('id_user', $user_id)->get();

            // Get the IDs of all products that the user has rated
            $rated_products = $ratings->pluck('id_prod')->toArray();

            // Retrieve all ratings for products that the user has not rated
            $other_ratings = Notation::whereNotIn('id_prod', $rated_products)->get();

            // Group the ratings by product ID
            $grouped_ratings = $other_ratings->groupBy('id_prod');

            // Calculate the average rating for each product
            $product_ratings = [];
            foreach ($grouped_ratings as $product_id => $ratings) {
                $avg_rating = $ratings->avg('stars_rated');
                $product_ratings[$product_id] = $avg_rating;
            }

            // Sort the products by their average rating, in descending order
            arsort($product_ratings);

            // Get the top 10 products
            $top_products = array_slice($product_ratings, 0,10, true);


        return view('Frontend.index', compact('top_products'));
        return  $top_products;

    }

}
