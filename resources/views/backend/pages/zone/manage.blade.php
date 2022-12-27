@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

      </div>
            <div class="br-pagebody" >
                        <div class="br-section-wrapper">
                          <h6 class="br-section-label">Zone Table</h6>
                          <a href="{{ route('zone.create')}}" class="btn btn-success btn-sm my-2">Add zone</a>
                        <div class="bd bd-gray-300 rounded ">

                      <div class="row" >
                        <div class="col-lg-12" style="overflow-x: auto;">

                                    <table class="table mg-b-0 table-bordered table-striped" >
                                      <thead class="">
                                        <tr>
                                          <th scope="col">#Sl</th>
                                          <th scope="col">Courier Name</th>
                                          <th scope="col">City Name</th>
                                          <th scope="col">zone Name</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @php $i=1 @endphp
                                        @foreach( $zones as $zone )
                                        <tr>
                                          <th scope="row">{{ $i }}</th>

                                          <td>{{ $zone ->courier->name ??"N/A" }}</td>
                                          <td>{{ $zone ->city->city ??"N/A" }}</td>
                                          <td>{{ $zone ->zone }}</td>


                                          <td>
                                            @if($zone->status == 0)
                                            <span class="badge badge-danger">Inactive</span>

                                            @elseif($zone->status== 1)
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td class="action-button">
                                            <ul>
                                                <li><a href="{{route('zone.edit', $zone->id)}}"><i class="fa fa-edit"></i></a></li>

                                                <li><a href="" data-toggle="modal" data-target="#delete{{$zone->id}}"><i class="fa fa-trash"></i></a></li>
                                            </ul>

                                                    <!-- Modal -->
                            <div class="modal fade" id="delete{{ $zone->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to want to delete this zone?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('zone.destroy', $zone->id)}}" method="POST">
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
                                      @if( $zones->count()==0)
                                      <div class="alert alert-info">
                                        No Zone Found Yet.
                                    </div>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          </div>

@endsection
