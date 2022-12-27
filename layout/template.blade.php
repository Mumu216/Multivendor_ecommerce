
<!DOCTYPE html>
<html lang="en">

    <head>
       @include('manager.includes.header')
       @include('manager.includes.css')



      </head>
  <body>
    @include('manager.includes.leftmenu')
    @include('manager.includes.topbar')
    @include('manager.includes.rightpanel')






    <!-- ########## START: MAIN PANEL ########## -->

    <div class="br-mainpanel">
        @yield('body-content')
     @include('manager.includes.footer')

      </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('manager.includes.script')

  </body>
</html>
