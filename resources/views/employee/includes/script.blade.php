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
    <script type="text/javascript">
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}"

      switch(type){
        case 'info':
        toastr.info("{{Session::get('message')}}");

        break;

        case 'warning':
        toastr.warning("{{Session::get('message')}}");


        break;

        case 'success':
        toastr.success("{{Session::get('message')}}");


        break;

        case 'error':
        toastr.error("{{Session::get('message')}}");


        break;
      }

      @endif
      
    </script>
    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    </script>
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script>
  $(function(){
    $(".chkCheckAll").click(function(){
      $(".sub_chk").prop('checked',$(this).prop('checked'));
      $(".checkBoxClass").prop('checked',$(this).prop('checked'));
    })
  })
</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
  $(function() {
    $('.emp_time').hide(); 
    $('.role').change(function(){
        if($('.role').val() == '3') {
            $('.emp_time').show(); 
        } else {
            $('.emp_time').hide(); 
        } 
    });
});

   $(function() {
    if($('.role_two').val() == '3') {
            $('.emp_time_two').show(); 
        } else {
            $('.emp_time_two').hide(); 
        } 
    $('.role_two').change(function(){
        if($('.role_two').val() == '3') {
            $('.emp_time_two').show(); 
        } else {
            $('.emp_time_two').hide(); 
        } 
    });
});

  
</script>
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
    $("#SubmitForm").on('submit',function(e){
        e.preventDefault();
        let title = $('#title').val();
        let status = $('#status').val();
        $.ajax({
            url: "/employee/category/store",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                title:title,
                status:status,
            },
            success:function(response){
                document.location.href = '/employee/category/manage';

            }
        })

    })





    // 
      $.ajax({
      url: "/submit-form",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        mobile:mobile,
        message:message,
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
      },
      error: function(response) {
        $('#nameErrorMsg').text(response.responseJSON.errors.name);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
        $('#messageErrorMsg').text(response.responseJSON.errors.message);
      },
      });


</script>

<script type="text/javascript">
     
            $('#bulk_delete').on('click', function (e) {
                var allVals = [];
                $(".sub_chk:checked").each(function () {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    if (confirm('Are Your Sure To Delete?') == true) {
                        $('#all_id').val(allVals);
                        $('#bulk_delete_form').submit();
                    }
                }
            });
             $('#status').on('change', function (e) {
                var allVals = [];
                $(".sub_chk:checked").each(function () {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    $('#all_status').val(allVals);
                    $('#all_status_form').submit();
                }
            });
    
</script>
<script>
    // start add remove product ajax
    $(document).ready(function(){
        $("#productadd").on("change",function(e){
            e.preventDefault();

          var product =$("#productadd").val();
          $.ajax({
            type: 'GET',
            url: "/admin_cart/"+product,
            dataType:"json",
            success:function(data){
                window.location = "/employee/order-management/create";
             
            


             
             
            }
        });
          $("#product").prop("selectedIndex", 0);

        });


    });

     //end add remove product ajax
     // courier start
     // $(document).ready(function(){
     //    $("#courier_id").on("change",function(e){
     //        e.preventDefault();
     //        var courier =$("#courier_id").val();
     //        $.ajax({
     //        type: 'GET',
     //        url: "/ajax_find_courier/"+courier,
     //        dataType:"json",
     //        success:function(data){
     //            alert(data.charge)

     //        }
     //    });

     //    });
     // });

     // get city

     $('#courier_id').change( function(){
        var courier =$('#courier_id').val();
        $('#city_id').html("");
        var option="";
        
        $.get( "/get-city/" + courier, function( data ) {
          data = JSON.parse(data);
          data.forEach( function(element){
            option += "<option value='"+ element.id +"'>" +element.city + "</option>";
          });
          $('#city_id').html(option);

        });


        // courier start
        if (courier) {
            $.ajax({
            type: 'GET',
            url: "/ajax_find_courier/"+courier,
            dataType:"json",
            success:function(data){
                $("#shipping_cost").val(data.charge);

                var amount =parseInt(data.charge) ;

                var net_total = parseInt({{ App\Models\Cart::totalPrice() }}) ;

                var discount = $("#discount").val();
                 var result =(net_total + amount - discount);
                 $("#total").val(result);
                

            }
        });
            
        }else{
            var discount = $("#discount").val();
            var sub_total = $("#sub_total").val();
            $("#shipping_cost").val(0);
            $("#total").val(sub_total - discount);


        }
        

        // courier end
    });

     // get zone

     $('#city_id').change( function(){
        var city =$('#city_id').val();
        $('#zone_id').html("");
        var option="";
        
        $.get( "/get-zone/" + city, function( data ) {
          data = JSON.parse(data);
          data.forEach( function(element){
            option += "<option value='"+ element.id +"'>" +element.zone + "</option>";
          });
          $('#zone_id').html(option);

        });
    });



// qty
 
    
$(".qty_plus").on("click",function(){

    
      var id= $(this).attr("data-id");
     $.ajax({
            type: 'GET',
            url: "/cart_plus/"+id,
            dataType:"json",
            success:function(data){
                location.reload();
                // window.location = "/admin/order-management/create";
            }
            
        })



});
    
$(".qty_minus").on("click",function(){

    
      var id= $(this).attr("data-id");
     $.ajax({
            type: 'GET',
            url: "/qty_minus/"+id,
            dataType:"json",
            success:function(data){
                window.location = "/employee/order-management/create";
            }
            
        })



});

$(".discount").on("keyup",function(){
    var discount = parseInt($(this).val()) ;
   var sub_total = parseInt($("#sub_total").val());
   var shipping = parseInt($(".shipping").val()) ;

   var calc= parseInt(sub_total - discount + shipping) ;


   $("#total").val(calc);

})






</script>

<script type="text/javascript">
        document.getElementById("customer_name").value = getSavedValue("customer_name");    // set the value to this input
        document.getElementById("customer_address").value = getSavedValue("customer_address");   // set the value to this input
        document.getElementById("customer_phone").value = getSavedValue("customer_phone");   // set the value to this input
        document.getElementById("customer_phone").value = getSavedValue("customer_phone");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>


