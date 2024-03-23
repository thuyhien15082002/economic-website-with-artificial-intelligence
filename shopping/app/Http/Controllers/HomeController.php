<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;




use Illuminate\Http\Request;
// use Validator;


class HomeController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();
            $response = Http::get('http://localhost:5000/api/products/' . $user["id"]);
            $data = [];
            if ($response->ok()) {
                $data = $response->object();
            }
        } else {
            $data = Product::orderBy('id', 'DESC')->limit(6)->get();
        }
        return view('welcome', compact('data'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function shop()
    {
        $cate = Category::limit(7)->get();
        $data = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(9);
        return view('shop', compact('data', 'cate'));
    }

    public function category($category)
    {
        $category_id = $category;
        $cate = Category::limit(7)->get();
        $data = Product::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(9);
        return view('category', compact('data', 'category', 'cate'));
    }

    public function productdetail($id)
    {
        $comment_pro = Comment::where(['product_id' => $id])->orderBy('id', 'DESC')->get();

        $product = Product::where('id', $id)->first();
        $response = Http::get('http://localhost:5000/api/related/' . $id);
        $data = [];
        if ($response->ok()) {
            $data = $response->object();
        }
        // $data = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(6);

        return view('product_detail', compact('product', 'comment_pro', 'data'));
    }

    public function ajaxSearch()
    {

        $data = Product::search()->get();
        return view('ajaxSearch', compact('data'));
    }

    public function ajaxcomment($product_id, Request $req)
    {
        $users_id = Auth::user()->id;
        $validator = Validator::make($req->all(), [
            'content' => 'required'
        ], [
            'content.required' => 'Nội dung bình luận không để trống'
        ]);

        if ($validator->passes()) {
            $data = [
                'users_id' => $users_id,
                'product_id' => $product_id,
                'content' => $req->content
            ];
            if ($comment = Comment::create($data)) {
                $cmt = Comment::where(['product_id' => $product_id])->orderBy('id', 'DESC')->get();
                return view('comment', compact('cmt'));
            }
        }

        return response()->json(['error' => $validator->errors()->first()]);
    }
}
