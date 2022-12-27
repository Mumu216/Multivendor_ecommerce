@extends('frontend.layout.template')
     @section('body-content')

    <section class="my-3">
        <div class="container-fluid container-97">
        <div class="row">
            <div class="col-12">
                         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
@php $i =0 @endphp
  @foreach($sliders as  $slider)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
   @php $i++ @endphp
@endforeach


  </ol>
  <div class="carousel-inner">
    @foreach($sliders as $key => $slider)
    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
      <img class="d-block w-100" src="{{ asset('backend/img/sliders/'.$slider->name)  }}" alt="First slide">
    </div>
    @endforeach


  </div>


</div>
                    </div>
        </div>
        </div>
    </section>

    <!--  -->
    <!-- category -->
    <section class="my-5">
        <div class="main-products-section">
            <div class="container-fluid container-97">
                <h4 class="my-2 text-center">BROWSE PRODUCT CATEGORIES</h4>
                 <div class="row m-0">
                    @foreach(App\Models\Category::where('status',1)->get() as $category)


                       <span class="badge badge-warning mr-2 mb-2 px-3 py-2" style="border-radius: 40px;">
                        <a href="{{route('category', $category->id)}}" class="">
                            <h5 class="text-center text-dark text-md font-bold uppercase" style="font-size: 14px;font-weight: 700;">{{$category->title}}</h5>
                          </a>
                      </span>
                      @endforeach

                 </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
         <div class="container-fluid container-97">
            <div class="row">
                <div class="col-6">
                    <h5 class="my-2"><b>হট ডিল !!</b></h5>
                </div>
                <div class="col-6">
                     <a href="{{url('hot_deals')}}" class="btn btn-sm btn-warning float-right ">See All</a>
                </div>
            </div>
            <div class="row m-0">

                    @foreach($hots as $product)
                                            <div class="col-md-2 col-6 main-product">
                            <div class="main-product-inner-wrapper text-center">
                                <a href="{{route('details',$product->id)}}">
                                    <img src="{{ asset('backend/img/products/'.$product->image)  }}" alt="Furniture Polish">
                                </a>
                                @if(!is_null($product->offer_price))
                                    <p class="mb-0" style="text-decoration: line-through;color: #b8b8b8">{{$settings->currency ?? "৳"}} {{$product->regular_price}}</p>

                                    <p class="font-weight-bold mb-0" style="color: #fca204">{{$settings->currency ?? "৳"}} {{$product->offer_price }}</p>
                                    @else

                                    <p class="font-weight-bold mb-0" style="color: #fca204; margin-top: 24px">{{$settings->currency ?? "৳"}} {{$product->regular_price}}</p>

                                    @endif
                                  <p class="mb-0 prod_name"><a href="{{route('details',$product->id)}}">{{$product->name}}</a></p>
                                  <form action="{{route('o_cart.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}" >
                                     <input type="hidden" name="quantity" value="1">
                                     <input type="hidden" name="price" value="@if(is_null($product->offer_price)){{$product->regular_price}}@else {{$product->offer_price}} @endif">
                                    <input type="submit" class="btn btn-sm w-100 mb-2 order_now_btn"  value="Order Now">
                                </form>
                            </div>
                        </div>
                        @endforeach



                                    </div>

         </div>

        <div class="flex justify-between items-center mb-4 md:mb-7">


      </div>
    </section>

    <!--need product  -->

    <section>
        <div class="main-products-section">
            <div class="container-fluid container-97">
                <h5 class="my-2"><b>প্রয়োজনীয় প্রোডাক্ট</b></h5>
                <div class="row m-0">

                    @foreach($products as $product)
                        <div class="col-md-2 col-6 main-product">
                            <div class="main-product-inner-wrapper text-center">
                                <a href="{{route('details',$product->id)}}">
                                    <img src="{{ asset('backend/img/products/'.$product->image)  }}" alt="Furniture Polish">
                                </a>
                                @if(!is_null($product->offer_price))
                                    <p class="mb-0" style="text-decoration: line-through;color: #b8b8b8">{{$settings->currency ?? "৳"}} {{$product->regular_price}}</p>

                                    <p class="font-weight-bold mb-0" style="color: #fca204">{{$settings->currency ?? "৳"}} {{$product->offer_price}}</p>
                                    @else

                                    <p class="font-weight-bold mb-0" style="color: #fca204; margin-top: 24px">{{$settings->currency ?? "৳"}} {{$product->regular_price}}</p>
                                    @endif
                                    <p class="mb-0 prod_name"><a href="{{route('details',$product->id)}}">{{$product->name}}</a></p>
                                      <form action="{{route('o_cart.store')}}" method="POST">
                                        @csrf
                                     <input type="hidden" name="product_id" value="{{$product->id}}" >
                                     <input type="hidden" name="quantity" value="1">
                                     <input type="hidden" name="price" value="@if(is_null($product->offer_price)){{$product->regular_price}}@else {{$product->offer_price}} @endif">
                                    <input type="submit" class="btn btn-sm w-100 mb-2 order_now_btn"  value="Order Now">
                                </form>
                            </div>
                        </div>
                        @endforeach



                                    </div>

                <div class="row mt-md-4 mt-2">
                    <div class="col-12">
                        <nav>
       {{$products->links()}}
    </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>


    @endsection
