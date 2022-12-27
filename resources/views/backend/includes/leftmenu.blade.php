<div class="br-logo"><a href=""><span>@foreach(App\Models\Settings::all() as $settings)
    <img
        src="{{ asset('backend/img/'.$settings->logo)  }}" class="img-fluid">
    @endforeach</span></a></div>
<div class="br-sideleft sideleft-scrollbar ">

<ul class="br-sideleft-menu">
<!-- <li class="br-menu-item">
<a href="{{ route('admin.dashboard')}}" class="br-menu-link active">
<i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
<span class="menu-item-label">Dashboard</span>
</a>
</li> -->

    {{-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Product Mangement</label> --}}
   <!-- Brand Menu start -->
    {{-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Manage Brands</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('brand.create') }}" class="sub-link">Add New brand</a></li>
        <li class="sub-item"><a href="{{ route('brand.manage') }}" class="sub-link">Manage All Brand</a></li>
    </ul>
 </li> --}}
   <!-- Brand Menu start -->
   <!-- Order Menu start -->

   <li class="br-menu-item">
    <a href="{{ route('admin.dashboard')}}" class="br-menu-link {{ Request::is('admin/dashboard/*') ? 'active' : '' }}">
      <!-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> -->
      <i class="fas fa-fw fa-desktop"></i>
      <span class="menu-item-label">Dashboard</span>
    </a>
  </li>


   <li class="br-menu-item">
    <a href="{{ route('order.manage')}}" class="br-menu-link {{ Request::is('admin/order-management/*') ? 'active' : '' }}">
      <!-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> -->
      <i class="fas fa-fw fa-cart-plus"></i>
      <span class="menu-item-label">Orders</span>
    </a>
  </li>
   <!-- Order Menu start -->


      <!-- Category Menu start -->
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
          <span class="menu-item-label">Manage Category</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="{{ route('category.create') }}" class="sub-link">Add New category</a></li>
          <li class="sub-item"><a href="{{ route('category.manage') }}" class="sub-link">Manage All Categories</a></li>
      </ul>
   </li>
     <!-- Category Menu start -->


        <!-- product Menu start -->
        <li class="br-menu-item">
            <a href="{{ route('product.manage')}}" class="br-menu-link {{ Request::is('admin/product/*') ? 'active' : '' }}">
              <!-- <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i> -->
              <i class="fas fa-fw fa-box"></i>
              <span class="menu-item-label">Products</span>
            </a>
          </li>
         <!-- product Menu start -->


          {{-- slider menu start --}}

         <li class="br-menu-item">
            <a href="{{ route('slider.manage')}}" class="br-menu-link {{ Request::is('admin/slider/*') ? 'active' : '' }}">
              <i class="fas fa-fw fa-film"></i>
              <span class="menu-item-label">Slider</span>
            </a>
          </li>

          {{-- slider menu End --}}

          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ Request::is('admin/courier/*') || Request::is('admin/city/*')||Request::is('admin/zone/*') ? 'active' : '' }}">
              <i class="fas fa fa-truck"></i>
              <span class="menu-item-label">Couriers</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{route('courier.manage')}}" class="sub-link {{ Request::is('admin/courier/*') ? 'active' : '' }}">Courier</a></li>
              <li class="sub-item"><a href="{{route('city.manage')}}"  class="sub-link {{ Request::is('admin/city/*') ? 'active' : '' }}">City</a></li>
              <li class="sub-item"><a href="{{route('zone.manage')}}" class="sub-link {{route('courier.manage')}}" class="sub-link {{ Request::is('admin/zone/*') ? 'active' : '' }}">Zone</a></li>
            </ul>
          </li>


    {{-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Location Settings</label> --}}

     <!-- division Menu start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Division</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{ route('division.create') }}" class="sub-link">Add New Division</a></li>
              <li class="sub-item"><a href="{{ route('division.manage') }}" class="sub-link">Manage All Division</a></li>
          </ul>
       </li>
         <!-- division Menu End -->


            <!-- district Menu start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">District</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{ route('district.create') }}" class="sub-link">Add New District</a></li>
              <li class="sub-item"><a href="{{ route('district.manage') }}" class="sub-link">Manage All District</a></li>
          </ul>
       </li>
         <!-- district Menu End -->
    </ul>

    <li class="br-menu-item">
        <a href="{{ route('user.manage')}}" class="br-menu-link {{ Request::is('admin/user/*') ? 'active' : '' }} ">
          <i class="fas fa fa-user"></i>
          <span class="menu-item-label">User</span>
        </a>
      </li>

    </li>
    <li class="br-menu-item">
    <a href="{{ route('settings.edit')}}" class="br-menu-link {{ Request::is('admin/settings/*') ? 'active' : '' }}">
      <i class="fas fa-cogs"></i>
      <span class="menu-item-label">Settings</span>
    </a>
  </li>

    </li>
    <li class="br-menu-item">
    <a href="{{ route('shipping.manage')}}" class="br-menu-link {{ Request::is('admin/shipping/*') ? 'active' : '' }}">
    <i class="fas fa-cogs"></i>
    <span class="menu-item-label">Shipping</span>
    </a>
    </li>


      <li class="br-menu-item">
        <a href="{{ route('attribute.manage')}}" class="br-menu-link {{ Request::is('admin/attribute/*') ? 'active' : '' }} ">
          <i class="fas fa fa-user"></i>
          <span class="menu-item-label">Attribute</span>
        </a>
      </li>



  {{-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label> --}}



  <br>
</div><!-- br-sideleft -->
