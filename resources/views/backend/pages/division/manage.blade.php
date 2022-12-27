@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage Division</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Basic Table</h6>
          <div class="bd bd-gray-300 rounded ">
            <div class="row">
               <div class="col-lg-12">

                <table class="table table-bordered table-striped mg-b-0">
                    <thead class="thead-colored thead-dark">
                      <tr>
                        <th scope="col">#Sl</th>
                        <th scope="col">Division Name</th>
                        <th scope="col">Priority No</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                         @foreach($divisions as $division)
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $division->name }}</td>
                        <td>{{ $division->priority }}</td>

                        <td>
                            @if($division->status == 1)
                              <span class="badge badge-info">Active</span>
                            @elseif($division->status == 0)
                              <span class="badge badge-primary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-button">
                                <ul>
                                    <li><a href="{{ route('division.edit' , $division->id) }}"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="" data-toggle="modal" data-target="#delete{{ $division->id }}"><i class="fa fa-trash"></i></a></li>
                                 </ul>
                                 <!-- Modal start -->

                                 <div class="modal fade" id="delete{{ $division->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Division?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-center" >
                                        <div class="modal-buttons">
                                          <ul>
                                            <li>
                                              <form action="{{ route('division.destroy' , $division->id) }}" method="POST">
                                                @csrf
                                                <input type="submit" name="delete" class="btn btn-success" value="Confirm">
                                              </form>
                                            </li>
                                            <li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                 <!-- Modal End -->


                            </div>
                        </td>
                    </tr>
                       @php $i++ ; @endphp
                       @endforeach
                   </tbody>
                  </table>
                  @if($divisions->count() == 0)
                  <div class="alert alert-warning">
                   No Division Added Yet. Please Add Division For Product Delivery Management.
                 </div>
                 @endif
                </div>
            </div>
        </div>
    </div>
</div>




  @endsection
