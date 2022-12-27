@extends('frontend.layout.template')
@section('body-content')
     <section class="min-height: 430px;">
        <div class="main-products-section">
            <div class="container-fluid container-97">
                <h4 class="my-2">Searched For <b>"{{ $category->title }}"</b></h4>
                <div class="row m-0">

                    @foreach($products as $product)
                    <div class="col-md-2 col-6 main-product">
                        <div class="main-product-inner-wrapper text-center">
                            <a href="{{ route('details', $product->id) }}">
                                <img src="{{ asset('backend/img/products/  .$product->image') }}" alt="Furniture Polish">
                            </a>
                            @if(!is_null($product->offer_price))

                             <p class="mb-0" style="text-decoration: line-through; color:#b8b8b8;">{{ $settings->currency ??  "৳" }}
                                {{ $product->regular_price }}</p>

                             <p class="font-weight-bold mb-0" style="color:#fca204;">{{$settings->currency ?? "৳" }}{{ $product->offer_price }}</p>

                             @else
                              <p class="font-weight-bold mb-0" style="color:#fca204;">{{$settings->currency ?? "৳" }}{{ $product->regular_price }}</p>
                              @endif
                              <p class="mb-0 prod_name"><a href="{{ route('details' , $product->id) }}">{{ $product->name }}</a></p>
                              <form action="" method="POST">
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

                    <div class="row mt-md-4 mt-2">
                        <div class="col-12">
                            <nav>
                                {{ $products->links() }}

                             </nav>
                         </div>
                    </div>
                </div>
           </div>
    </section>

@endsection
