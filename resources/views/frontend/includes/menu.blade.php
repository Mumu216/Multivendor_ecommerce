<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
    <div class="header-body border-color-primary border-bottom-0 box-shadow-none" data-sticky-header-style="{'minResolution': 0}" data-sticky-header-style-active="{'background-color': '#f7f7f7'}" data-sticky-header-style-deactive="{'background-color': '#FFF'}">
        <div class="header-top header-top-borders">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item nav-item-borders py-2">
                                        <span class="pl-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i> 1234 Street Name, City Name</span>
                                    </li>
                                    <li class="nav-item nav-item-borders py-2 d-none d-lg-inline-flex">
                                        <a href="tel:123-456-7890"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> 123-456-7890</a>
                                    </li>
                                    <li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
                                        <a href="mailto:mail@domain.com"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> mail@domain.com</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i> About Us</a>
                                    </li>
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> Contact Us</a>
                                    </li>
                                    <li class="nav-item dropdown nav-item-left-border d-none d-sm-block">
                                        <a class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            @if( Auth::check())
                                            @if( !is_null(Auth::user()->image) )
                                            <img src="{{ asset('backend/img/users/')}}/{{ Auth::user()->image }}" alt="User Image" class="user-avater">
                                          @else
                                           <img src="{{ asset('backend/img/users/images1.jpg') }}" class="user-avater" alt="English" />
                                         @endif

                                            {{ Auth::user()->name }}
                                               <i class="fas fa-angle-down"></i>
                                            @else
                                              <a href="{{ route('customer-login') }}"> Login  / Register</a>
                                            @endif
                                        </a>
                                          <div class="dropdown-menu" aria-labelledby="dropdownLanguage">
                                            <a class="dropdown-item" href="{{ route('order-history') }}">Order History</a>
                                            <a class="dropdown-item" href="{{ route('user-profile') }}">My Profile</a>

                                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row py-2">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="index.html">
                                <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="{{ asset('frontend/img/logo.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <ul class="header-extra-info d-flex align-items-center mr-3">
                            <li class="d-none d-sm-inline-flex">
                                <div class="header-extra-info-text">
                                    <label>SEND US AN EMAIL</label>
                                    <strong><a href="mailto:mail@example.com">MAIL@EXAMPLE.COM</a></strong>
                                </div>
                            </li>
                            <li>
                                <div class="header-extra-info-text">
                                    <label>CALL US NOW</label>
                                    <strong><a href="tel:8001234567">800-123-4567</a></strong>
                                </div>
                            </li>
                        </ul>
                        <div class="header-nav-features">
                            <div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex ml-2" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'top': '78px'}" data-sticky-header-style-deactive="{'top': '0'}">
                                <a href="#" class="header-nav-features-toggle">
                                    <img src="{{ asset('frontend/img/icons/icon-cart-big.svg') }}" height="34" alt="" class="header-nav-top-icon-img">
                                    <span class="cart-info">
                                        <span class="cart-qty">1</span>
                                    </span>
                                </a>
                                <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                                    <ol class="mini-products-list">
                                        <li class="item">
                                            <a href="#" title="Camera X1000" class="product-image"><img src="{{ asset('frontend/img/products/product-1.jpg') }}" alt="Camera X1000"></a>
                                            <div class="product-details">
                                                <p class="product-name">
                                                    <a href="#">Camera X1000 </a>
                                                </p>
                                                <p class="qty-price">
                                                     1X <span class="price">$890</span>
                                                </p>
                                                <a href="#" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
                                            </div>
                                        </li>
                                    </ol>
                                    <div class="totals">
                                        <span class="label">Total:</span>
                                        <span class="price-total"><span class="price">$890</span></span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-dark" href="#">View Cart</a>
                                        <a class="btn btn-primary" href="#">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-nav-bar bg-color-light-scale-1 mb-3 px-3 px-lg-0">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row justify-content-end">
                            <div class="header-nav header-nav-links justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '150px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
                                <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-arrow header-nav-main-effect-3 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{ route('homepage') }}">
                                                    Home
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{ route('allProducts') }}">
                                                    All Products
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    AboutUs
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{ route('cart') }}">
                                                    Cart
                                                </a>
                                            </li>


                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{ route('customer-login') }}">
                                                  Login / Register
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
