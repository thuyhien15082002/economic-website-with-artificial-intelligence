@extends('layouts.site')
@section('main')

<section class="checkout_area">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="{{route('checkout.store')}}" method="POST">
                        @csrf
                        <input type="hidden"  name="users_id" value="{{Auth::user()->id}}">
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="phone" placeholder="Phone number">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{Auth::user()->email}}">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                            </div>
                            <textarea class="form-control" name="note" rows="1"
                                placeholder="Order Notes"></textarea>
                        </div>
                        <input class="btn_3" type="submit" value="Proceed to Paypal">
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li>
                                <a href="#">Product
                                    <span>Total</span>
                                </a>
                            </li>
                            @foreach($cart->items as $item)
                            <li>
                                <a href="#">{{$item['name']}}
                                    <span class="middle">x {{$item['quantity']}}</span>
                                    <span class="last">${{number_format($item['price'])}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Subtotal
                                    <span>${{number_format($cart->total_price)}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop()