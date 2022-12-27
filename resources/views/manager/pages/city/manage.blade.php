@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

      </div>
            <div class="br-pagebody" >
                        <div class="br-section-wrapper">
                          <h6 class="br-section-label">city Table</h6>
                          <a href="{{ route('manager.city.create')}}" class="btn btn-success btn-sm my-2">Add city</a>
                        <div class="bd bd-gray-300 rounded ">

                      <div class="row" >
                        <div class="col-lg-12" style="overflow-x: auto;">

                                    <table class="table mg-b-0 table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#Sl</th>
                                                <th scope="col">#Courier Name</th>
                                                <th scope="col">#City Name</th>
                                                <th scope="col">#Status</th>
                                                <th scope="col">#Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 1 ;@endphp
                                            @foreach($cities as $city)
                                             <th scope="row">{{ $i }}</th>
                                             <td>{{ $city->courier->name ?? "N/A" }}</td>
                                             <td>{{ $city->city }}</td>

                                             <td>
                                                @if($city->status == 0)
                                                <span class="badge badge-danger">Inactive</span>

                                                @elseif($city->status== 1)
                                                <span class="badge badge-success">Active</span>
                                                @endif
                                            </td>
                                            <td class="action-button">

                                                <ul>
                                                    <li><a href="{{route('manager.city.edit', $city->id)}}"><i class="fa fa-edit"></i></a></li>

                                                    <li><a href="" data-toggle="modal" data-target="#delete{{$city->id}}"><i class="fa fa-trash"></i></a></li>
                                                </ul>

                                                  <!-- Modal -->
                                            <div class="modal fade" id="delete{{ $city->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to want to delete this city?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('manager.city.destroy', $city->id)}}" method="POST">
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
                                          @if( $citys->count()==0)
                                          <div class="alert alert-info">
                                            No city Found Yet.
                                        </div>

                                          @endif

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
