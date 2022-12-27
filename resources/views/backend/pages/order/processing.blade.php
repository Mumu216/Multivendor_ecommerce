@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">
      <div class="row">
        <div class="col-lg-12">
            <div class="card border-3 border-top border-top-success text-primary mb-2 p-2">
                <h4>Last Order :@if($last) {{$last->created_at->diffForHumans()}}
                    @endif
                </h4>

                <div class="card-body">
                </div>
            </div>

        </div>

                              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                                 <a href="{{route('order.manage')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5>Total Order</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::all())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                            <a href="{{route('order.processing')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5 class="text-info">Total Processing</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::where('status',1)->get())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                            <a href="{{route('order.pending')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5 class="text-secondary">Total Pending Delivery</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::where('status',3)->get())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                            <a href="{{route('order.pending_p')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5 class="text-secondary">Total Pending Payment</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::where('status',6)->get())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                            <a href="{{route('order.hold')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5 class="text-warning">Total Hold</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::where('status',2)->get())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                            <a href="{{route('order.cancel')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5 class="text-danger">Total Canceled</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::where('status',5)->get())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
                            <a href="{{route('order.completed')}}">
                                <div class="card border-3 border-top border-top-success">
                                    <div class="card-body">
                                        <h5 class="text-success">Total Completed</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{count(App\Models\Order::where('status',4)->get())}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                      </div>
                    </div>

                     <div class="br-pagebody">
                        <div class="br-section-wrapper">
                            <div class="row mb-3">

                                <div class="col-lg-4"><a class="btn btn-success" href="{{route('order.create')}}">Add Order</a></div>
                                <div class="col-lg-8"><input id="myInput" type="text" class="form-control" placeholder="Search Orders"></div>
                            </div>



                      <div class="row">
                        <div class="col-md-3 col-12">
                            <form action="{{route('selected_status')}}" method="post" id="all_status_form">
                                @csrf
                                <input type="hidden" id="all_status" name="all_status">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Processing</option>
                                    <option value="2">Pending Delivery</option>
                                    <option value="3">On Hold</option>
                                    <option value="4">Cancel</option>
                                    <option value="5">Completed</option>
                                    <option value="6">Pending Payment</option>
                                </select>
                            </form>
                        </div>



                        <div class="col-md-3 col-12">
                            <form action="{{route('selected_e_assign')}}" method="post" class="all_e_assign_form">
                                @csrf
                                <input type="hidden" class="all_e_assign" name="all_e_assign">
                                <select name="e_assign"  class="form-control e_assign">
                                    <option value="">Select Employee</option>

                                     @foreach(App\Models\User::where('role',3)->get() as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                  </select>
                            </form>
                        </div>



                        <div class="col-md-2 col-12">
                            <form action="{{route('deleteCheckedOrders')}}" method="POST" id="bulk_delete_form">
                                @csrf
                                <div>
                                    <input type="hidden" id="all_id" name="all_id">
                                    <button type="button" id="bulk_delete" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-2 col-12">
                           <form action="{{route('printCheckedOrders')}}" method="POST" id="bulk_print_form">
                                @csrf
                                <div>
                                    <input type="hidden" id="all_id_print" name="all_id_print">
                                    <button type="button" id="bulk_print" class="btn btn-warning ">Print Invoice</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-2 col-12">
                           <a href="{{route('order.export')}}" class="btn btn-info ">Export All</a>
                        </div>


                         </div>





                        <h6 class="br-section-label" style="margin-top: 20px;">Processing Orders</h6>
                        <div class="bd bd-gray-300 rounded ">


                        <div class="row">
                            <div class="col-lg-12">
                                <div style="overflow-x: auto;">
                                    <table class="table mg-b-0 table-bordered table-striped" >
                                      <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" class="chkCheckAll"></th>

                                          <th scope="col">#Sl</th>
                                          <th scope="col">Customer Info </th>
                                          <th scope="col">Products </th>
                                          <th scope="col">Total</th>
                                          <th scope="col">Courier</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Note</th>
                                          <th scope="col">Asigned</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody id="myTable">
                                        @php $i=1 @endphp
                                        @foreach( $orders as $order )

                                        <?php
                                            $check_duplicate = count(App\Models\Order::where('phone', $order->phone)->where('status','!=',5)->get())
                                          ?>


                                        <tr class='{{$check_duplicate>1?"bg-danger-light":""}}'>
                                             <th scope="row">
                                            <input type="checkbox" class="sub_chk" data-id="{{$order->id}}">
                                          </th>



                                          <td>{{ $i }}</td>


                                          <td>
                                           <p class="mb-0">{{ $order->name ?? "N/A" }}</p>
                                           <p class="mb-0">{{ $order->phone ?? "N/A" }}</p>
                                           <p class="mb-0">{{ $order->address ?? "N/A" }}</p>
                                          </td>

                                          <td>

                                            @foreach(App\Models\Cart::where('order_id',$order->id)->get() as $cart)

                                             @if(!is_null($cart->product))
                                             <p>{{$cart->quantity}} X {{$cart->product->name }}
                                                @if(!is_null($cart->attribute))
                                         <br>

                                            @foreach(App\Models\Atr_item::whereIn('id',explode('"',$cart->attribute))->get() as $item)

                                            - {{$item->name}}

                                            @endforeach
                                    <a href="" data-toggle="modal" data-target="#edit{{$cart->id}}"><i class="fa fa-edit"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$cart->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Attrubute</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>

                              </div>
                              <div class="modal-body">
                                <form action="{{route('cart_atr_edit',$cart->id)}}" class="cart_form" method="POST">
                                  @csrf
                                  @if($cart->product->atr_item !=NULL)

                                            @foreach(App\Models\ProductAttribute::whereIn('id',explode('"',$cart->product->atr))->get() as $c)
                                            <div class="row mb-2 justify-content-center">
                                              <div class="col-md-6 col-12">
                                               <label for="">{{$c->name}}  </label>
                                               <input type="hidden" name="attribute_id[]" value="">
                                                <select name="attribute[]" id="" class="form-control attribute_item_id">
                                                @foreach(App\Models\Atr_item::whereIn('id',explode('"',$cart->product->atr_item))->where('atr_id',$c->id)->get() as $at)
                                              <option value="{{$at->id}}">{{$at->name}}</option>

                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach
                                  @endif
                                  <input type="submit" class="btn btn-success my-2 cart_button" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                                    @endif
                                </p>



                                            @elseif(is_null($carts->product))
                                            N/A
                                            @endif

                                          @endforeach
                                          </td>
                                          <td>{{$settings->currency ?? "৳"}} {{ $order->total }}</td>
                                          <td> {{$order->couriers->name ??"NOT SELECTED"}} </td>
                                          <td>
                                            {{$order->created_at}}
                                          </td>
                                          <td>

                                             <div class="btn-group">
                                                @if($order->status==1)

                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Processing
                                                    </button>

                                                @elseif($order->status==2)
                                                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   On Hold
                                                </button>
                                                   @elseif($order->status==3)
                                                  <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Pending Delivery
                                              </button>
                                                   @elseif($order->status==4)
                                                  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   Completed
                                              </button>
                                                   @elseif($order->status==5)
                                                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   Cancel
                                              </button>
                                               @elseif($order->status==6)
                                                  <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                pending payment
                                              </button>

                                                   @endif



                                              <div class="dropdown-menu">
                                                @if($order->status!=1)
                                                 <a class="dropdown-item" href="{{route('order.to_processing',$order->id)}}">Processing</a>
                                                 @endif

                                              @if($order->status!=2)
                                                <a class="dropdown-item" href="{{route('order.to_pending',$order->id)}}">On Hold</a>
                                                 @endif
                                                @if($order->status!=3)

                                                <a class="dropdown-item" href="{{route('order.to_hold',$order->id)}}">Pending Delivery</a>
                                                 @endif
                                                @if($order->status!=4)

                                                <a class="dropdown-item" href="{{route('order.to_cancel',$order->id)}}">Completed</a>
                                                 @endif
                                                @if($order->status!=5)

                                                <a class="dropdown-item" href="{{route('order.to_completed',$order->id)}}">Cancel</a>
                                                 @endif

                                                  @if($order->status!=6)

                                                <a class="dropdown-item" href="{{route('order.to_pending_p',$order->id)}}">Pending Payment</a>
                                                 @endif


                                              </div>
                                            </div>

                                          </td>
                                          <td>
                                            {{$order->order_note ??"N/A"}}
                                          </td>
                                          <td>

                                            {{$order->user->name ?? "N/A"}}
                                            <a href="" data-toggle="modal" data-target="#assign{{$order->id}}"><i class="fa fa-edit"></i></a>
                                            <!-- assign modaal start -->
                                    <div class="modal fade" id="assign{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                            <h5 class="modal-title " id="exampleModalLabel">Assign User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </div>

                                            <div class="modal-body ">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6">
                                                        <form action="{{ route('order.assign_edit', $order->id)}}" method="POST" class="assign_f_button">
                                                    @csrf
                                                    <select name="order_assign" class="form-control">
                                                        @foreach(App\Models\User::where('role',3)->get() as $user)
                                                        <option value="{{$user->id}}" @if($user->id==$order->order_assign)selected @endif>{{$user->name}}</option>
                                                        @endforeach
                                                    </select>

                                                <input type="submit" value="Assign" name="delete" class="btn btn-success btn-block mt-2 assign_e_button">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                            <!-- assign modaal end -->
                                          </td>
                        <td class="action-button">

                          <ul>
                              <li><a href="{{route('order.edit', $order->id)}}"><i class="fa fa-edit"></i></a></li>
                              <li><a href="{{route('order.print', $order->id)}}"><i class="fa fa-print"></i></a></li>


                              <li><a href="" data-toggle="modal" data-target="#delete{{$order->id}}"><i class="fa fa-trash"></i></a></li>
                          </ul>


                          <div class="modal fade" id="delete{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                   </div>
                                     <div class="modal-body">
                                        Are you sure to want to delete this Order?
                                    </div>
                                   <div class="modal-footer">
                                     <form action="{{ route('order.destroy', $order->id)}}" method="POST">
                                        @csrf
                                         <input type="submit" value="Confirm" name="delete" class="btn btn-danger" >
                                        </form>
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </td>
                                        </tr>
                                        @php $i++ @endphp
                                        @endforeach
                                      </tbody>
                                      @if($orders->count()==0)
                                      <div class="alert alert-danger">sorry! No Orders Found.</div>
                                      @endif
                                    </table>
                                </div>
                                <p class="my-3">
                                    {{$orders->links()}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
