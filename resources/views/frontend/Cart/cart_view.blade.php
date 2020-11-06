@extends('welcome')
@section('category_slider_brand')
<section id="cart_items">
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Shopping Cart</li>
        </ol>
    </div>
@php
   $items = ShoppingCart::all();

@endphp
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Image</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
@foreach ($items as $item)
    

                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{URL::to($item->image)}}" style="height: 80px; width: 80px" alt=""></a>
                    </td>
                    <td class="cart_description">
                    <h4><a href="">{{$item->name}}</a></h4>
                        <p>Web ID: {{$item->id}}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{$item->price}} TK</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                        <form action="{{URL::to("/update-item/")}}" method="POST">
                            @csrf
                            <input class="cart_quantity_input" id="qty" type="text" name="qty" value="{{$item->qty}}" autocomplete="off" size="2">
                            <input type="hidden" name="__raw_id" value="{{$item->__raw_id}}">
                            <button class="btn btn-default" type="submit">update</button>
                        </form>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{ $item->total}} TK</p>
                    </td>
                    <td class="cart_delete">
                    <a class="cart_quantity_delete" href="{{URL::to("/delete-item/".$item->__raw_id)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>

                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                    <li>Cart Sub Total <span>{{ ShoppingCart::total() }} TK</span></li>
                        <li>Eco Tax <span>Free</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{ ShoppingCart::total() }} TK</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                <a class="btn btn-default check_out" href="{{URL::to('/check-out-view/')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection