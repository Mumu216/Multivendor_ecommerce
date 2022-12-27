@extends('frontend.layout.template')

@section('body-content')
<section>
    <div class="category_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>
                        <a href="{{ url('/') }}">Home</a>
                        /
                        <a href="javascript:void(0);">{{ $product->name }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 mb-md-3 mb-2">
                    @if(is_null($product->gallery_images))
                    <div id="sing_prod_img_slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('backend/img/products'  .$product->image) }}" class="d-block w-100" alt="">
                            </div>
                        </div>
                    </div>
                    @else

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('backend/img/products'  .$product->image) }}" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('backend/img/products'  .$product->gallery_images) }}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                       @endif
                    </div>

                      <div class="col-md-5 mb-3">
                        <h2 class="text-capitalize sing_prod_name">{{ $product->name }}</h2>
                        <h3 class="font-weight-bold sing_prod_prices">
                            @if(!is_null($product->offer_price))
                            <span class="old_price" style="text-decoration: line-through; color:#555; opacity: 0.5;">{{ $product->currency ?? "৳" }}{{ $product->regular_price }}</span>
                            <span style="color: #f91018;">{{$settings->currency ?? "৳"}} {{$product->offer_price}}</span>
                            @else
                            <span style="color: #f91018;">{{$settings->currency ?? "৳"}} {{$product->offer_price}}</span>
                        </h3>


                    <form action="{{route('o_cart.store',$product->id)}}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="qty-text-div">
                                <span>Quantity: </span>
                            </div>
                            <div class="qty_div">
                                <div class="minus-qty-div">
                                    <i class="fa fa-minus minus" id="qty_minus"></i>
                                </div>
                                <div class="qty-div">
                                    <input type="number" class="qtyy" name="quantity" id="qty" min="1" value="1" readonly />
                                </div>
                                <div class="plus-qty-div">
                                    <i class="fa fa-plus plus" id="qty_plus"></i>
                                </div>
                            </div>
                        </div>

                        @if($product->atr_item   !=NULL)

                           @foreach(App\Models\ProductAttribute::whereIn('id',explode('"',$product->atr))->get() as $b)
                            <div class="row mb-2">
                                <div class="col-md-6 col-12">
                                       <label for="">{{ $b->name }}</label>
                                       <input type="hidden" name="attribute_id[]" value="">
                                       <select name="attribute[]" id="" class="form-control attribute_item_id">
                                        @foreach(App\Models\Atr_item::whereIn('id',explode('"', $product->atr_item))->where('atrribute_id',$b->id)->get() as $att)
                                        <option value="{{ $att->id }}">{{ $att->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <input type="hidden" name="product_id" value="{{$product->id}}" >
                             <input type="hidden" name="price" value="@if(is_null($product->offer_price)){{$product->regular_price}}@else {{$product->offer_price}} @endif">

                             <div class="mt-md-4 mt-2 d-md-flex">
                                <input type="submit" class="btn px-4 order_now_btn order_now_btn_m" name="order_now" value="Order Now" />
                                <input type="submit" class="btn px-4 add_cart_btn" name="add_cart" value="Add to Cart" />
                            </div>
                        </form>

                        <div class="mt-md-2 mt-2">
                            @php $settings = App\Models\Settings::all() @endphp @foreach($settings as $settings)
                            @if(!is_null($settings->phone))

                            <h4 class="font-weight-bold">
                               <a class="btn btn-success w-100" href="tel:01957-580692">
                                   <i class="fa fa-phone-square"></i>
                                   {{$settings->phone}}
                               </a>
                           </h4>
                           @endif

                           @if(!is_null($settings->phone_two))
                            <h4 class="font-weight-bold">
                             <a class="btn btn-success w-100" href="tel:01957-580692">
                                <i class="fa fa-phone-square"></i>
                                {{$settings->phone_two}}
                            </a>
                        </h4>
                           @endif

                           @if(!is_null($settings->phone_three))
                            <h4 class="font-weight-bold">
                             <a class="btn btn-success w-100" href="tel:01957-580692">
                                <i class="fa fa-phone-square"></i>
                                {{$settings->phone_three}}
                            </a>
                        </h4>
                           @endif
                           @endforeach

                        </div>

                        <div class="col-12 mt-3 delivery_details" style="padding:0">
                            <table class="table" style="color: rgb(7, 92, 134)">
                                <tbody>
                                    @foreach(App\Models\Shipping::all() as $shipping)
                                    <tr>
                                        <td style="padding-left: 0 ; border-bottom:1px solid #ddd;">
                                            {{ $shipping->text }}
                                        </td>

                                        <td style="border-bottom:1px solid #ddd;">
                                            <b>{{$settings->currency ?? "৳"}} {{ $shipping->amount }}</b>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="featured-products d-md-block d-none">
                            <p>Necessary Product</p>
                            <div class="featured-products-wrapper">
                                <table>
                                    @foreach(App\Models\Product::orderBy('id','desc')->where('status', 1)->take(3)->get()as $products)
                                    <tr>
                                        <td class="img">
                                            <a href="{{ route('details', $products->id) }}">
                                            <img src="{{ asset('backend/img/products'  . $products->image) }}" width="50" alt="">
                                        </a>
                                        </td>

                                        <td class="title">
                                         <a href="{{route('details', $products->id)}}" class="text-dark">
                                            {{ $products->title }}
                                         </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>

                     <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs nav-tabs-mod">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Product Details</a>
                                </li>
                            </ul>

                            <div class="tab-content tab-content-mod">
                                <div class="tab-pane active">
                                    <div>
                                        {!! $product->description !!}

                                    </div>
                                </div>
                            </div>

                        </div>
                     </div>

                     <div class="row mt-5 related-products">
                        <div class="col-md-12">
                            <h4 class="mb-3">Related Products</h4>
                        </div>
                    </div>

                    <div class="row-m-o">
                       @foreach(App\Models\Product::where('category_id', $product->category_id )->where('status', 1)->get() as $product)
                       <div class="col-md-2 col-6 main-product">
                        <div class="main-product-inner-wrapper text-center">
                            <a href="{{ route('details', $product->id) }}">
                                <img src="{{ asset('backend/img/products/' .$product->image) }}" alt="Furniture Polish">
                            </a>
                            @if(!is_null($product->offer_price))

                             <p class="mb-0" style="text-decoration: line-through; color:#b8b8b8;">{{ $settings->currency ??  "৳" }}
                                {{ $product->regular_price }}</p>

                             <p class="font-weight-bold mb-0" style="color:#fca204;">{{$settings->currency ?? "৳" }}{{ $product->offer_price }}</p>

                             @else
                              <p class="font-weight-bold mb-0" style="color:#fca204;">{{$settings->currency ?? "৳" }}{{ $product->regular_price }}</p>
                              @endif
                              <p class="mb-0 prod_name"><a href="{{ route('details' , $product->id) }}">{{ $product->name }}</a></p>
                              <form action="{{'cart.store' }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price" value="@if(is_null($product->offer_price)){{$product->regular_price}}@else {{$product->offer_price}} @endif">
                                <input type="submit" class="btn btn-sm w-100 mb-2 order_now_btn"  value="Add To Cart">
                            </form>
                        </div>
                    </div>
                       @endforeach

                    </div>
                </div>
            </div>
</section>
@endsection

