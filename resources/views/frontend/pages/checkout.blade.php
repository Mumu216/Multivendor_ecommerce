@extends('frontend.layout.template')
@section('body-content')

@if($carts->count() > 0 )

   <div class="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-12 mb-md-mb-4">
                <div class="card" style="boder: 1px solid #e9e9e9">
                    <div class="card-body p-2">
                        <h5 class="font-weight-bold card-header">Billing Address</h5>
                        <form action="{{ route('order') }}"  method="POST" id="checkout_form" class="checkout_form">
                            @csrf

                            <div class="form-group">
                                <label for="customer_name">Your Name</label>
                                <input type="text" onkeyup='saveValue(this);' class="form-control" id="name" class="name" placeholder="Your Name" required>
                            </div>

                            <div class="form-group">
                                <label for="customer_address">Your Address</label>
                                <input type="text" onkeyup='saveValue(this);' class="form-control" id="address" name="address" placeholder="Your address" required>
                            </div>

                             <div class="form-group">
                                <label for="customer_phone">Your Mobile Number</label>
                                <input type="text" onkeyup='saveValue(this);' class="form-control" id="phone" name="phone" placeholder="Your Phone Number" required>
                            </div>

                            <div class="form-group">
                                <label for="shipping_method">Selected Area</label>
                                <select class="form-control" name="shipping_method" id="shipping_method">
                                    <option value="">Select Shipping</option>
                                    @foreach($shipping as $shipping)
                                      <option value="{{ $shipping->id }}">{{ $shipping->type }}  {{$settings->currency ?? "৳"}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <input type="hidden" name="sub_total" value="{{App\Models\Cart::totalPrice()}}">
                                <button type="submit" class="btn btn-success w-100 mb-2" style="height: 50px" id="conf_order_btn">Confirm Order</button>
                            </form>
                        </div>
                    </div>
                </div>

                            <div class="col-md-7 col-12">
                                <div class="card" style=" border: 1px solid #e9e9e9">
                                     <h5 class="font-weight-bold card-header">Your Order</h5>
                                     <div class="card-body p-2 table-responsive" id="order_info_table">
                                        <table class="cart_table table text-center mb-0" >
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($carts as $cart)
                                                @if($cart->product)
                                                <tr>
                                                    <td>
                                                        <a href="{{route('cart.destroy', $cart->id)}}"><i class="fa fa-trash text-danger"></i></a>
                                                    </td>
                                                    <td class="text-left">
                                                        <img width="35" src="{{ asset('backend/img/products/'.$cart->product->image) ?? ''  }}" alt="">
                                                        <a style="font-size: 14px"
                                                           href="{{route('details',$cart->product->id)}}">@if(!is_null($cart->product)){{$cart->product->title}} @endif</a>
                                                    </td>
                                                    <td>{{$cart->product->offer_price ?? $cart->product->regular_price}}</td>

                                                    <td width="15%" class="cart_qty">
                                                        <a href="#"><i class="fa fa-minus qty_minus" id="" data-id="{{$cart->id}}"></i></a>
                                                        <input type="text" name="qty" id="qty" min="1" value="{{$cart->quantity}}" readonly>
                                                        <a href="#"><i class="fa fa-plus qty_plus" id="" data-id="{{$cart->id}}"></i></a>
                                                    </td>

                                                    <td>{{($cart->product->offer_price ?? $cart->product->regular_price) * $cart->quantity}}</td>
                                                </tr>
                                                 @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-right pr-2">Sub Total</th>
                                                    <td><span id="sub_total">{{ App\Models\Cart::totalPrice() }}</span></td>
                                                </tr>

                                                <tr>
                                                    <th colspan="4" class="text-right pr-2">Shiiping Cost</th>
                                                    <td><span id="cart_shippping_cost">0</span></td>
                                                </tr>

                                                <tr>
                                                    <th colspan="4" class="text-right pr-2">Total</th>
                                                    <td><span id="net_total">{{ App\Models\Cart::totalPrice() }}</span></td>
                                                </tr>
                                            </tfoot>

                                        </table>

                                     </div>


                                </div>
                            </div>

                        @else

                        @endif



        </div>
    </div>
</div>

@endsection

