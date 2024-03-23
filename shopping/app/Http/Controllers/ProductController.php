<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->search()->paginate(10);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time() . '-' . 'product.' . $ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if (Product::create($request->all())) {
            return redirect()->route('product.index')->with('success', 'Thêm mới sản phẩm thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.product.edit', compact('product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->only('name', 'description', 'category_id', 'price', 'sale_price', 'prioty', 'status'));
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->details->count() > 0) {
            return redirect()->route('product.index')->with('error', 'Không thể xóa sản phẩm này');
        } else {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
        }
    }




    public function getRecommendations()
    {
        // Load data from the database tables

        $orders = Order::all();
        $details = OrderDetail::all();
        $users = User::has('orders')->get();
        $products = Product::all();
        $categories = Category::all();

        // Merge the data to create a complete view of the data
        $merged = $users->merge($orders)
            ->merge($details)
            ->merge($products)
            ->merge($categories);

        // Get a list of unique user IDs
        $user_ids = $merged->pluck('users_id')->unique();

        // Define a function to calculate the similarity between two users based on their purchase history
        function calculate_similarity($user1_purchases, $user2_purchases)
        {

            $user1_set = $user1_purchases->flip();
            $user2_set = $user2_purchases->flip();
            $intersection = $user1_set->intersect($user2_set);
            return $intersection->count();
        }

        // Define a function to get recommended products for a given user
        function get_recommended_products($user_id, $merged, $user_ids)
        {
            // Get the purchase history of the user
            $user_purchases = $merged->where('users_id', $user_id)->pluck('name_merged');

            // Initialize an array to store the similarity scores between the user and all other users
            $similarities = [];

            // Iterate over all other users and calculate their similarity score with the given user
            foreach ($user_ids as $other_user_id) {
                if ($other_user_id != $user_id) {
                    $other_user_purchases = $merged->where('users_id', $other_user_id)->pluck('name_merged');
                    $similarity = calculate_similarity($user_purchases, $other_user_purchases);
                    if ($similarity) {
                        $similarities[$other_user_id] = $similarity;
                    }
                }
            }

            // Sort the similarity scores in descending order and select the top 3 users with the highest scores
            arsort($similarities);
            $top_similarities = array_slice($similarities, 0, 3, true);

            // Get a list of products purchased by the top 3 similar users that the given user has not purchased
            $similar_products = [];
            foreach ($top_similarities as $similar_user_id => $similarity_score) {
                $similar_user_purchases = $merged->where('users_id', $similar_user_id)->pluck('name_merged');
                foreach ($similar_user_purchases as $product) {
                    if (!$user_purchases->contains($product) && !in_array($product, $similar_products)) {
                        $similar_products[] = $product;
                    }
                }
            }

            return $similar_products;
        }

        // Initialize an array to store the recommended products for each user
        $recommended_products = [];

        // Iterate over all users and get their recommended products
        foreach ($user_ids as $user_id) {
            $user = User::find($user_id);
            if ($user = User::find(1)) {
                $orders = $user->orders;

                $recommended = get_recommended_products($user_id, $merged, $user_ids);
                $recommended_products[$user_id] = $recommended;
            }
        }

        // Pass the recommended products to a view for display
        return view('recommendations', compact('recommended_products'));
    }
}
