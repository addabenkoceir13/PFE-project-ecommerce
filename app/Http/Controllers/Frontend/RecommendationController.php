<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function extractFeatures(Products $product)
    {
        return [
            'name_prod' => $product->name_prod,
            'mark_prod' => $product->mark_prod,
            // 'screen_size' => $product->screen_size,
            // 'camera_quality' => $product->camera_quality,
            // add other features here
        ];
    }

}
