@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

      </div>
            <div class="br-pagebody" >
                        <div class="br-section-wrapper">
                          <h6 class="br-section-label">attribute Table</h6>
                          <a href="" data-toggle="modal" data-target="#add" class="btn btn-success btn-sm m-2">Add Attribute</a>

                            <!-- Modal for add -->
                                          <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Add Attribute </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{ route('attribute.store')}}" method="POST">
                                                    @csrf

                                                    <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Title</label>
                                                            <input type="text"  name="name" class="form-control form-control-lg" required="required" >
                                                        </div>


                                                    </div>



                                                     <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Status</label>
                                                           <select name="status" class="form-control">
                                                               <option value="1">Active</option>
                                                               <option value="0">Inactive</option>
                                                           </select>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-lg-3">
                                                            <input type="submit" value="Add" class="btn btn-success" data-loading-text="Loading...">
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Customer signup form  End-->


                                                    </div>

                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Modal add End -->
                        <div class="bd bd-gray-300 rounded">

                         <div class="row" >
                           <div class="col-lg-12" >

                                    <table class="table mg-b-0 table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">#Sl</th>
                                          <th scope="col">Title</th>
                                          <th scope="col">Attribute Item(s)</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @php $i=1 @endphp
                                       @foreach( $attributes as $attribute )
                                        <tr>
                                          <th scope="row">{{ $i }}</th>

                                          <td>{{ $attribute->name }}</td>

                                          <td class="action-button">
                                            @foreach(App\Models\Atr_item::where('atr_id',$attribute->id)->get() as $atr_item)
                                            <ul>

                                              <li><a href="" data-toggle="modal" data-target="#atredit{{$atr_item->id}}"><i class="fa fa-edit"></i></a></li>

                                                <!-- Modal for edit -->
                                              <div class="modal fade" id="atredit{{$atr_item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Edit Attribute Item</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{ route('attribute.item_update',$atr_item->id)}}" method="POST">
                                                    @csrf
                                                      <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Attribute Title</label>
                                                           <select name="atr_id" class="form-control">

                                                               <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Title</label>
                                                            <input type="text" value="{{ $atr_item->name }}"  name="name" class="form-control form-control-lg" required="required" >
                                                        </div>
                                                    </div>



                                                    <div class="form-row">
                                                        <div class="form-group col-lg-3">
                                                            <input type="submit" value="Update" class="btn btn-success " data-loading-text="Loading...">
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Customer signup form  End-->


                                                    </div>

                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Modal edit End -->

                                              <li><a href="" data-toggle="modal" data-target="#atrdelete{{$atr_item->id}}"><i class="fa fa-trash"></i></a></li>
                                              <li>{{$atr_item->name}}</li>
                                          </ul>

                                           <!--item delete Modal start -->
                                            <div class="modal fade" id="atrdelete{{ $atr_item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    Are you sure to want to delete this attribute Item?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <form action="{{ route('attribute.item_destroy', $atr_item->id)}}" method="POST">
                                                      @csrf
                                                      <input type="submit" value="Confirm" name="delete" class="btn btn-danger" >

                                                    </form>



                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                          <!--item delete Modal End -->
                                          @endforeach


                                             <a href="" data-toggle="modal" data-target="#add_item{{$attribute->id}}" class="badge badge-primary">Add</a>

                                            <!-- Modal for add_item -->
                                              <div class="modal fade" id="add_item{{$attribute->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Add Attribute Item </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{ route('attribute.item_store')}}" method="POST">
                                                    @csrf

                                                     <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Attribute Title</label>
                                                            <select name="atr_id" class="form-control">
                                                                <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Title</label>
                                                            <input type="text"  name="name" class="form-control form-control-lg" required="required" >
                                                        </div>


                                                    </div>




                                                    <div class="form-row">

                                                        <div class="form-group col-lg-3">
                                                            <input type="submit" value="Add" class="btn btn-success " data-loading-text="Loading...">
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Customer signup form  End-->


                                                    </div>

                                                  </div>
                                                </div>
                                              </div>

                                              <!-- Modal add_item End -->
                                          </td>

                                          <td>
                                            @if($attribute->status == 0)
                                            <span class="badge badge-danger">Inactive</span>

                                            @elseif($attribute->status== 1)
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                          </td>
                                        <td class="action-button">

                                          <ul>
                                              <li><a href="" data-toggle="modal" data-target="#edit{{$attribute->id}}"><i class="fa fa-edit"></i></a></li>

                                                <!-- Modal for edit -->
                                              <div class="modal fade" id="edit{{$attribute->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Edit Attribute </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{ route('attribute.update',$attribute->id)}}" method="POST">
                                                    @csrf

                                                    <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Title</label>
                                                            <input type="text" value="{{ $attribute->name }}"  name="name" class="form-control form-control-lg" required="required" >
                                                        </div>
                                                      </div>



                                                     <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label class="font-weight-bold text-dark text-2">Status</label>
                                                           <select name="status" class="form-control">
                                                               <option value="1" @if($attribute->status==1)selected @endif>Active</option>
                                                               <option value="0" @if($attribute->status==0)selected @endif>Inactive</option>
                                                           </select>
                                                        </div>
                                                      </div>

                                                    <div class="form-row">
                                                      <div class="form-group col-lg-3">
                                                            <input type="submit" value="Add" class="btn btn-success " data-loading-text="Loading...">
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Customer signup form  End-->


                                                    </div>
                                                    </div>
                                                </div>
                                              </div>

                                              <!-- Modal edit End -->

                                              <li><a href="" data-toggle="modal" data-target="#delete{{$attribute->id}}"><i class="fa fa-trash"></i></a></li>
                                          </ul>

                                           <!-- Modal -->
                                            <div class="modal fade" id="delete{{ $attribute->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    Are you sure to want to delete this attribute?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <form action="{{ route('attribute.destroy', $attribute->id)}}" method="POST">
                                                      @csrf
                                                      <input type="submit" value="Confirm" name="delete" class="btn btn-danger">
                                                    </form>



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
                                      @if( $attributes->count()==0)
                                      <div class="alert alert-info">
                                        no attribute found Yet.

                                      </div>

                                      @endif
                                    </table>

                        </div>

                      </div>
            </div>
            </div>
          </div>

@endsection

