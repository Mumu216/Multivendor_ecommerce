@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

      </div>
            <div class="br-pagebody" >
                        <div class="br-section-wrapper">
                          <h6 class="br-section-label">slider Table</h6>
                          <a href="{{ route('slider.create')}}" class="btn btn-success btn-sm m-2">Add slider</a>
                        <div class="bd bd-gray-300 rounded ">

                    	<div class="row" >
                    		<div class="col-lg-12" >

                                    <table class="table mg-b-0 table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">#Sl</th>
                                          <th scope="col">slider Image</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @php $i=1 @endphp
                                        @foreach( $sliders as $slider )
                                        <tr>
                                          <th scope="row">{{ $i }}</th>

                                          <td class="text-center"><img src="{{ asset('backend/img/sliders/' .$slider->name)  }}" width="150"></td>

                                          <td>
                                            @if($slider->status == 0)
                                            <span class="badge badge-danger">Inactive</span>

                                            @elseif($slider->status== 1)
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td class="action-button">
                                            <ul>
                                                <li><a href="{{route('slider.edit', $slider->id)}}"><i class="fa fa-edit"></i></a></li>

                                                <li><a href="" data-toggle="modal" data-target="#delete{{$slider->id}}"><i class="fa fa-trash"></i></a></li>
                                            </ul>

                           <!-- Modal -->
                    <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                           <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               Are you sure to want to delete this slider?
                            </div>
                            <div class="modal-footer">
                              <form action="{{ route('slider.destroy', $slider->id)}}" method="POST">
                                @csrf
                               <input type="submit" value="Confirm" name="delete" class="btn btn-danger" >
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
                                      @if( $sliders->count()==0)
                                      <div class="alert alert-info">
                                        No Slider Found Yet.
                                    </div>

                                      @endif
                                    </table>

                    		</div>

                    	</div>
            </div>
            </div>
          </div>

@endsection
