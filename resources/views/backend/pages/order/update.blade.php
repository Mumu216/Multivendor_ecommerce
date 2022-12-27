<!DOCTYPE html>
<html lang="en">
  <head>
   @include('backend.includes.header')
   @include('backend.includes.css')

  </head>

  <body>


    @include('backend.includes.leftmenu')

    @include('backend.includes.topbar')
   <div class="br-mainpanel">
     <div class="br-pagetitle">
       <div class="br-pagebody">
         <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="br-section-wrapper" style="padding: 10px !important">
                        <div class="card" data-select2-id="11">
                            <h4 class="card-header">Customer Info</h4>
                            <div class="card-body" data-select2-id="10">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Order Date<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker" id="order_date" name="order_date" readonly value="{{ date('d M y',strtotime($order->created_at)) }}" required="">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Invoice ID <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  readonly="" value="INV{{ $order->id }}" required="" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Customer Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ $order->name }}" onkeyup='saveValue(this);' id="customer_name" name="name" required="">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Customer Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ $order->phone }}" onkeyup='saveValue(this);' id="customer_phone" name="phone" required="">
                                    </div>
                                </div>

                                 <div class="form-row">
                                    <div class="froup-group col-12">
                                        <label for="">Customer Address <span class="text-danger">*</span></label>
                                        <textarea name="address" id="" onkeyup='saveValue(this);'>{{ $order->address }}</textarea>
                                    </div>
                                </div>

                                 <div class="form-row">
                                    <div class="form-group col-12">
                                      <label for="courier_id">Courier Name</label>
                                        <select name="courier" id="courier_id" class="form-control select2">
                                            <option value="">Select A Courier</option>
                                            @foreach(App\Models\Courier::all() as $key => $item)
                                              <option value="{{ $item->id }}" @if($item->id == $order->courier)selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-row">
                                    <div class="froup-group col-12">
                                        <label for="city_id">City Name</label>
                                        <select name="city" id="city_id" class="form-control select2">
                                            <option value="">Select A City</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="froup-group col-12">
                                        <label for="zone_id">Zone Name</label>
                                        <select name="zone" id="zone_id" class="form-control select2">
                                            <option value="">Select A Zone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                   <div class="col-lg-6">
                    <div class="br-section-wrapper" style="padding: 10px !important;">
                        <div class="card">
                           <h4 class="card-header">Product Info</h4>
                           <div class="card-body">
                            <div class="table-responsive mb-3">
                               <table class="table table-bordered  text-center">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                    <tbody id="prod_row">
                                        @foreach($carts as $cart)
                                        @if($cart->product)
                                        <tr>
                                            <td>{{ $cart->product->sku  ?? "N/A" }}</td><td>{{ $cart->product->title  ?? "N/A" }}</td><td width="15%" class="cart_qty">
                                                <a href=""><i class="fa fa-minus qty_minus" id="" data="{{ $cart->id }}"></i></a>
                                                <input style="text-align: center; width: 35px; margin: 0 5px 0 5px;" type="text"  id="qty" min="1" value="{{$cart->quantity}}" readonly>
                                                <a href=""><i class="fa fa-minus qty_plus" id="" data="{{ $cart->id }}"></i></a>
                                            </td>
                                            <td class="total_price">{{ ($cart->product->offer_price  ?? $cart->product->regular_price) * $cart->quantity }}</td>
                                            <td>
                                                <a href="{{ route('cart.destroy' , $cart->id) }}"><i class="fa fa-trash remove_btn text-danger" style="cursor: pointer"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td colspan="5">
                                                <div class="form-row">
                                                    <div class="form-group col-12 text-left">
                                                        <select id="productadd" class="form-control">
                                                            <option value="">Select A Product</option>
                                                            @foreach(App\Models\Product::all() as $key => $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group row" style="padding: 6px 0;">
                                <div class="form-group col-6 mb-0">
                                    <input type="text" class="form-control" id="memo_number" placeholder="Memo Number">
                                </div>
                                <label for="sub_total" class="col-md-2 col-form-label text-right">Sub Total</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="sub_total" name="sub_total" min="0" value="{{ App\Models\Cart::totalPrice() }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group row" style="padding: 6px 0;">
                                <label for="sub_total" class="offset-md-6 col-md-2 col-form-label text-right">Shipping</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control shipping" id="shipping_cost" name="shipping_name" min="0" value="0" readonly="">
                                </div>
                            </div>

                            <div class="form-group row" style="padding: 6px 0;">
                                <label for="discount" class="offset-md-6 col-md-2 col-form-label text-right">Discount</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control discount" id="discount" name="discount" min="0" value="0" readonly="">
                                </div>
                            </div>

                            <div class="form-group row" style="padding: 6px 0;">
                                <label for="pay" class="offset-md-6 col-md-2 col-form-label text-right">Pay</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control pay" id="discount" name="discount" min="0" value="0" readonly="">
                                </div>
                            </div>


                            <div class="form-group row" style="padding: 6px 0;">
                                <label for="total" class="offset-md-6 col-md-2 col-form-label text-right">Total</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control total" id="total" name="total" min="0" value="{{ App\Models\Cart::totalPrice() }}" readonly="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12">
                                   <textarea name="order_note" id="order_note" class="form-control" placeholder="Order Note"></textarea>
                                </div>
                             </div>

                             <div class="row mt-3">
                                <div class="col-12 text-center">
                                   <input type="submit" value="Update" class="btn btn-success w-100">
                                </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>



    @include('backend.includes.footer')
</div><!-- br-mainpanel -->
<script src="{{ asset('backend/lib/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('backend/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{ asset('backend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{ asset('backend/js/bootstrap-tagsinput.js')}}"></script>
 <script src="{{ asset('backend/js/bootstrap-tagsinput.min.js')}}"></script>

<script src="{{ asset('backend/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('backend/lib/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('backend/lib/peity/jquery.peity.min.js')}}"></script>
<script src="{{ asset('backend/lib/rickshaw/vendor/d3.min.js')}}"></script>
<script src="{{ asset('backend/lib/rickshaw/vendor/d3.layout.min.js')}}"></script>
<script src="{{ asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{ asset('backend/lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{ asset('backend/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('backend/lib/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ asset('backend/lib/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('backend/lib/echarts/echarts.min.js')}}"></script>
<script src="{{ asset('backend/lib/select2/js/select2.full.min.js')}}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
<script src="{{ asset('backend/lib/gmaps/gmaps.min.js')}}"></script>

<script src="{{ asset('backend/js/bracket.js')}}"></script>
<script src="{{ asset('backend/js/map.shiftworker.js')}}"></script>
<script src="{{ asset('backend/js/ResizeSensor.js')}}"></script>
<script src="{{ asset('backend/js/dashboard.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // start add or remove product ajax
    $(document).ready(function(){
      $("#productadd").on("change",function(e){
         e.preventDefault();
      });
    });
</script>

