<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Evaluation;
use App\Models\Invoices;
use App\Models\Notation;
use App\Models\Order;
use App\Models\Products;
use App\Models\Review;
use App\Models\User;
use App\Services\CollaborativeFilteringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontConteroller extends Controller
{
    public function index()
    {
        $featured_products_phone = Products::where('id_cate','1')->get();
        $featured_products_compt = Products::where('id_cate','2')->get();

        $users = Notation::all();
        $user_ids = DB::table('notations')->distinct()->pluck('id_user')->toArray();

        // ID of the user to get recommendations for
        foreach ($user_ids as $user_id) {
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
                if ($avg_rating >= 3) {
                    $product_ratings[$product_id] = $avg_rating ;
                }

            }

            // Sort the products by their average rating, in descending order
            arsort($product_ratings);

            // Get the top 10 products
            $top_products = array_slice($product_ratings, 0, 9, true);
        }
        return view('Frontend.index',['top_products' => $top_products], compact('featured_products_phone', 'featured_products_compt'));
    }

    // Algo Amine
    public function getRecommendedProducts()
    {
        $popularProducts = DB::table('orderitems')
            ->join('ratings', 'orderitems.product_id', '=', 'ratings.product_id')
            ->join('products', 'orderitems.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*','products.category_id',
            DB::raw('AVG(ratings.rating) as average_rating'),
            DB::raw('COUNT(orderitems.product_id) as count'))

            ->groupBy('products.id')
            ->orderByDesc('count')
            ->orderByDesc('average_rating')
            ->take(10)
            ->get();

            return response()->json([
                'status'=>200,
                'popular_products' => $popularProducts
            ]);

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
    public function algo()
    {
        // Preprocess ratings data
        $ratings = Notation::all();

        // Clean the data (if required)
        // Handle missing values (if required)

        // Normalize ratings to a common scale (e.g., 1 to 5)
        $normalizedRatings = $ratings->map(function ($rating) {
            $normalizedRating = ($rating->stars_rated - 1) / 4; // Normalize rating to range 0-1
            return [
                'user_id' => $rating->id_user,
                'product_id' => $rating->id_prod,
                'rating' => $normalizedRating,
            ];
        });
        // Collaborative Filtering Algorithm
        $userId = 1; // The ID of the user for whom we want to generate recommendations

        $targetUserRatings = $normalizedRatings->where('user_id', $userId);
        $targetUserProducts = $targetUserRatings->pluck('product_id')->toArray();

        $similarUsers = [];
        $recommendedProducts = [];

        // Calculate similarity between users
        $users = User::where('id', '!=', $userId)->get();
        foreach ($users as $user) {
            $userRatings = $normalizedRatings->where('user_id', $user->id);
            $userProducts = $userRatings->pluck('product_id')->toArray();

            $commonProducts = array_intersect($targetUserProducts, $userProducts);
            if (count($commonProducts) > 0) {
                // Calculate similarity score (e.g., cosine similarity)
                $similarity = count($commonProducts) / (sqrt(count($targetUserProducts)) * sqrt(count($userProducts)));

                $similarUsers[] = [
                    'user_id' => $user->id,
                    'similarity' => $similarity,
                ];
            }
        }

        // Sort similar users by descending similarity score
        rsort($similarUsers);

        // Generate recommendations
        foreach ($similarUsers as $similarUser) {
            $userRatings = $normalizedRatings->where('user_id', $similarUser['user_id']);
            $userProducts = $userRatings->pluck('product_id')->toArray();

            $newProducts = array_diff($userProducts, $targetUserProducts);
            foreach ($newProducts as $newProduct) {
                // Consider recommendations with higher ratings only (e.g., rating > 0.5)
                $rating = $userRatings->where('product_id', $newProduct)->first()['rating'];
                if ($rating > 0.5) {
                    $recommendedProducts[] = $newProduct;
                }
            }

            // Stop generating recommendations after a certain threshold (e.g., top 5)
            if (count($recommendedProducts) >= 5) {
                break;
            }
        }

        // Get the recommended product details
        $recommendations = Products::whereIn('id', $recommendedProducts)->get();
        return view('recommendations', compact('recommendations'));


    }

}
