@extends('layouts.site')
@section('main')

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Male-Fashion Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End-->
<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">
                    <div class="single_product_img">
                        <img src="{{url('public/uploads')}}/{{$product->image}}" alt="#" class="img-fluid">
                    </div>
                    <div class="single_product_img">
                        <img src="{{url('public/uploads')}}/{{$product->image}}" alt="#" class="img-fluid">
                    </div>
                    <div class="single_product_img">
                        <img src="{{url('public/uploads')}}/{{$product->image}}" alt="#" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{$product->name}}</h3>
                    <div>{!!$product->description!!}</div>
                    <div class="card_area">
                        <div class="product_count_area">
                            <p>Quantity</p>
                            <div class="product_count d-inline-block">
                                <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                                <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                            </div>
                            <p>${{number_format($product->price)}}</p>
                        </div>
                        <div class="add_to_cart">
                            <a href="{{route('cart.add',['id'=>$product->id])}}" class="btn_3">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    @if(null !== Auth::user())
                    <h4>Leave a Reply {{Auth::user()->name}} </h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="content" cols="30" placeholder="Write Comment"></textarea>
                                    <small id="comment-error" class="help-blog"></small>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <button id="btn-cmt" class="genric-btn info radius">Send Message</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <a href="{{route('login')}}"><button class="button button-contactForm btn_1 boxed-btn">Login to
                            leave a reply</button></a>
                    @endif
                </div>
                <h4>{{$comment_pro->count()}} Comments</h4>
                <div id="comment" class="comments-area">
                    @foreach($comment_pro as $cmt_)
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{url('public/site')}}/img/comment/comment_1.png" alt="">
                                </div>
                                <div class="desc">
                                    <h5>{{$cmt_->users->name}}</h5>
                                    <p class="comment">{{$cmt_->content}}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <p class="date">{{date('d-m-Y', strtotime($cmt_->created_at))}}</p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

<div class="popular-items section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Bạn có thể thích</h2>
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- exec('python /storages/app/recommendation.py', $output); -->
            @foreach($data as $model)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="{{url('public/uploads')}}/{{$model->image}}" alt="">
                        <div class="img-cap">
                            <a href="{{route('cart.add',['id'=>$model->id])}}"><span>Add to cart</span></a>
                        </div>
                        <div class="favorit-items">
                            <span class="flaticon-heart"></span>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="{{route('productdetail',['id'=>$model->id])}}">{{$model->name}}</a></h3>
                        <span>$ {{number_format($model->price)}}</span>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Button -->

        </div>
    </div>

    @stop()

    @section('js')

    <script>
        $('#btn-cmt').click(function(ev) {
            ev.preventDefault();
            let content = $('#content').val();
            let _commenturl = "{{route('comment', $product->id)}}";
            var _csrf = '{{csrf_token()}}';
            $.ajax({
                url: _commenturl,
                type: 'POST',
                data: {
                    content: content,
                    _token: _csrf
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error);
                    } else {
                        $('#comment-error').html('');
                        $('#content').val('');
                        $('#comment').html(res);
                    }
                }
            });
        })
    </script>

    @stop()