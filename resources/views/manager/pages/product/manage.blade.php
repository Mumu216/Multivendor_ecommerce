@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

      </div>
            <div class="br-pagebody">
                        <div class="br-section-wrapper">
                          <h6 class="br-section-label">product Table</h6>
                          <a href="{{route('manager.product.create')}}" class="btn btn-success btn-sm my-3">Add Product</a>
                           <!-- <a href="{{route('product.export')}}" class="btn btn-info btn-sm my-3">Export All</a> -->
                           <div class="row">
                             <div class="col-lg-3">
                              <form action="{{route('manager.p_selected_status')}}" method="post" id="p_all_status_form">
                                @csrf
                                <input type="hidden" id="p_all_status" name="p_all_status">
                                <select name="p_status" id="p_status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>

                                </select>
                            </form>
                        </div>
                    </div>


                          <form action="{{ route('manager.deleteSelected')}}" method="POST">
                            @csrf

                          <button type="submit"  class="btn btn-danger btn-sm my-3">Delete Product</button>

                     <div class="bd bd-gray-300 rounded">
                    	<div class="row">
                    		<div class="col-lg-12" style="overflow-x: auto;">
                             <table class="table mg-b-0 table-bordered table-striped">
                                      <thead class="">
                                        <tr>
                                          <th scope="col"><input type="checkbox" class="chkCheckAll"></th>
                                          <th scope="col">#Sl</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Title</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">SKU</th>
                                          <th scope="col">stock</th>
                                          <th scope="col">Regular Price</th>

                                          <th scope="col">Offer Price</th>
                                         <th scope="col">Attributes</th>
                                          <th scope="col">Status</th>

                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @php $i=1 @endphp
                                        @foreach( $products as $product )
                                        <tr>
                                          <th scope="row">
                                            <input type="checkbox" name="ids[{{$product->id}}]" class="checkBoxClass" data-id="{{$product->id}}" value="{{$product->id}}">
                                          </th>


                                          <td>{{ $i }}</td>
                                          <td><img src="{{ asset('backend/img/products/' .$product->image)}}" width="30"></td>

                                          <td>{{ $product->title }}</td>

                                          <td>
                                            @if(!is_null($product->category))
                                            {{ $product->category->title }}
                                            @endif
                                        </td>

                                          <td>{{ $product->sku }}</td>
                                          <td>{{ $product->stock }}</td>
                                          <td>{{$settings->currency ?? "৳"}} {{ $product->regular_price }}</td>
                                          <td>
                                            @if( !empty( $product->offer_price ) )
                                           {{$settings->currency ?? "৳"}} {{ $product->offer_price }}
                                            @else
                                            -N\A-

                                            @endif

                                           </td>
                                           <td>

                                            @if($product->atr_item !=NULL)

                                            @foreach(App\Models\ProductAttribute::whereIn('id',explode('"',$product->atr))->get() as $att)

                                            <p>{{$att->name}} -(@foreach(App\Models\Atr_item::whereIn('id',explode('"',$product->atr_item))->where('atr_id',$att->id)->get() as $atr)
                                              {{$atr->name}},

                                              @endforeach
                                            )</p>
                                             @endforeach
                                            @endif
                                        </td>

                                          <td> @if($product->status == 1)
                                            <span class="badge badge-success">Published</span>
                                          @elseif($product->status ==0 )
                                          <span class="badge badge-warning">Unpublished</span>
                                          @endif
                                          @if($product->assign == !NULL)
                                          <p><span class="badge badge-warning">Assigned</span><a href="{{route('manager.assign_dlt',$product->id)}}" onclick="return confirm('do you confirm to delete')" ><i class="fa fa-trash" style
                                            ="color: red;"></i></a></p>
                                            @endif
                                        </td>

                                        <td class="action-button">
                                            <ul>
                                                <li><a href="{{route('manager.product.edit', $product->id)}}"><i class="fa fa-edit"></i></a></li>

                                                <li><a href="" data-toggle="modal" data-target="#delete{{$product->id}}"><i class="fa fa-trash"></i></a></li>
                                            </ul>

                                       <!-- Modal Start -->
                                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route('manager.product.destroy',$product->id)}}" class="btn btn-danger">Delete</a>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                      <!-- Modal End -->
                                    </td>
                                    </tr>
                                        @php $i++ @endphp
                                        @endforeach
                                      </tbody>
                                      @if( $products->count()==0)
                                      <div class="alert alert-info">
                                        No Product Found Yet.

                                      </div>

                                      @endif

                                    </table>
                                    </form>
                                    {{-- <p class="m-3">{{$products->links()}}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
          </div>

@endsection
