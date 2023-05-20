<?php

namespace App\Services;

use App\Models\Notation;
use App\Models\Order;

class CollaborativeFilteringService
{
    public function buildUserItemMatrix()
    {
        $matrix = [];

        // Fetch user ratings from the ratings table
        $ratings = Notation::all();

        // Populate the matrix
        foreach ($ratings as $rating) {
            $userId = $rating->id_user;
            $productId = $rating->id_prod;
            $ratingValue = $rating->stars_rated;

            if (!isset($matrix[$userId])) {
                $matrix[$userId] = [];
            }

            $matrix[$userId][$productId] = $ratingValue;
        }

        return $matrix;
    }

    public function calculateCosineSimilarity($vectorA, $vectorB)
    {
        $dotProduct = 0;
        $magnitudeA = 0;
        $magnitudeB = 0;

        foreach ($vectorA as $key => $value) {
            if (isset($vectorB[$key])) {
                $dotProduct += $value * $vectorB[$key];
            }
            $magnitudeA += pow($value, 2);
        }

        foreach ($vectorB as $value) {
            $magnitudeB += pow($value, 2);
        }

        $magnitudeA = sqrt($magnitudeA);
        $magnitudeB = sqrt($magnitudeB);

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0;
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }
}
