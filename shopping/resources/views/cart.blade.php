@extends('layouts.site')
@section('main')

<!-- <div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Cart List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--================Cart Area =================-->
<!-- <section class="cart_area section_padding"> -->
<div class="container">
    <div class="cart_inner">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                    <?php $total = $item['price'] * $item['quantity']; ?>
                    <tr>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="{{url('public/uploads')}}/{{$item['image']}}" alt="" />

                                </div>
                                <div class="media-body">

                                    <p>
                                    <p>{{$item['name']}}</p>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>${{number_format($item['price'])}}</h5>

                        </td>
                        <td>
                            <form action="{{route('cart.update',['id'=>$item['id']])}}" method="get">
                                @csrf
                                <input name="quantity" type="number" value="{{$item['quantity']}}" min="1" style="width:50px">
                                <input class="btn_1" style="padding: 2px 4px;" type="submit" value="Update cart">
                            </form>
                        </td>
                        <td>
                            <h5>${{number_format($total)}}</h5>

                        </td>
                        <td>
                            <span><a href="{{route('cart.remove',['id'=>$item['id']])}}" style="color:red;font-size:14px;">Remove</a></span>
                        </td>
                    </tr>

                    @endforeach

                    <tr>
                        <td><a href="{{route('cart.clear')}}" class="btn" style="padding: 20px 15px;">Clear cart</a>
                        </td>
                        <td></td>
                        <td>
                            <h5>Subtotal</h5>
                        </td>
                        <td>
                            <h5>${{number_format($cart->total_price)}}</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="{{route('home.shop')}}">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="{{route('checkout.index')}}">Proceed to checkout</a>
            </div>
        </div>
    </div>
    <!-- </section> -->
    <!--================End Cart Area =================-->

    @stop()