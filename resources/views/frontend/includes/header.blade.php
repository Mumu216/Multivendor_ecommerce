<header>

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-4 d-md-none cat_menu_btn_m">
                    <ul>
                        <li>
                            <i class="fa fa-bars" id="cat_menu_mobile_btn"></i>
                        </li>
                        <li>
                            <i class="fa fa-search" id="search_mobile_btn"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-7 logo-m">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            @foreach(App\Models\Settings::all() as $settings)
                            <img
                                src="{{ asset('backend/img/'.$settings->logo)  }}" alt="">
                            @endforeach</a>
                    </div>
                </div>

                <div class="col-md-6 py-md-3 d-none d-md-block">
                    <div class="search">
                        <form action="{{route('search')}}" id="search_form" method="get">
                            <select name="category" id="category" class="search-select">
                                @php $categories = App\Models\Category::orderBy('title','asc')->where('status',1)->get(); @endphp
                                <option value="">ক্যাটেগরীজ</option>@foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                            <input type="text" name="search" class="search-input" placeholder="সার্চ করুন">
                            <button type="submit" class="search-btn"></button>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 text-md-right text-center py-3 cart-m">
                    <span class="cart-number d-none d-md-inline-block"><i class="fa fa-phone"></i> @foreach(App\Models\Settings::all() as $settings) {{$settings->phone}}@endforeach</span>
                    <div class="cart d-inline-block position-relative">
                                                    <span class="badge badge-danger rounded-circle">@php
                                                    $cart = App\Models\Cart::where('ip_address', request()->ip())->where('order_id',NULL)->get()
                                                     @endphp
                                                     {{count($cart)}}
                                                 </span>
                                                <a href="{{route('checkout')}}"><i style="color: #fff" class="fa fa-2x fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cat_menu_m">
            <ul>
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                @foreach($categories as $category)
                                    <li>
                        <a href="{{route('category', $category->id)}}">{{$category->title}}</a>
                    </li>
                            @endforeach
                            </ul>
        </div>

        <div class="search-form-m">
            <form action="{{route('search')}}" method="get">
                <input type="text" name="search" class="form-control" placeholder="সার্চ করুন" autocomplete="off">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <button class="search_btnclose">
                <i class="fa fa-times-circle"></i>
            </button>
        </div>
    </div>

    <div class="header-bottom d-md-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cat_menu">
                        <ul>
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                                 @foreach($categories as $category)
                                    <li>
                        <a href="{{route('category', $category->id)}}">{{$category->title}}</a>
                    </li>
                            @endforeach
                                                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

