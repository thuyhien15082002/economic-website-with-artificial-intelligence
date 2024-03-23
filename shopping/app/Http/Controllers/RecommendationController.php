<?php

namespace App\Http\Controllers;

use \PDO;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    public function getRecommendations($id)
    {



        $response = Http::get('http://localhost:5000/api/reated/' . $id);
        $recommended_products = [];
        if ($response->ok()) {
            $recommended_products = $response->object();
        }
        return view('recommendations', compact('recommended_products'));
    }
}
