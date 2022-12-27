@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

      </div>
            <div class="br-pagebody" >
                        <div class="br-section-wrapper">
                          <h6 class="br-section-label">user Table</h6>
                          <a href="" data-toggle="modal" data-target="#add" class="btn btn-success btn-sm m-2">Add user</a>

                                    <!-- Modal add user start -->
                            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('user.store') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Full Name</label>
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" required="required">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Email</label>
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" required="required">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Phone</label>
                                                <input type="text" s name="phone" class="form-control form-control-lg" required="required" >
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Role</label>
                                                <select name="role" required="required" class="form-control role">

                                                    <option value="1">Admin</option>
                                                    <option value="2">Mangager</option>
                                                    <option value="3">Employee</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row emp_time">
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Start Time[optional]</label>
                                                <input type="text" value="00:00:00" name="start_time" class="form-control form-control-lg" required="required" >
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">End Time[optional]</label>
                                                <input type="text" value="23:59:59" name="end_time" class="form-control form-control-lg" required="required" >
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
                                                <input type="submit" value="Register" class="btn btn-primary float-right" data-loading-text="Loading...">
                                            </div>
                                        </div>

                                      </form>
                                    </div>
                                </div>
                              </div>
                            </div>

                                    <!-- Modal add user end -->

                                    <div class="bd bd-gray-300 rounded ">
                                        <div class="row" >
                                            <div class="col-lg-12">
                                                <table class="table mg-b-0 table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#Sl</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Phone</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Schedule</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($users as $user)
                                                        <tr>
                                                            <th scope="row">{{ $i }}</th>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->phone }}</td>

                                                            <td>
                                                                @if($user->role == 1)
                                                                   Admin
                                                                @elseif($user->role == 2)
                                                                  Manager
                                                                @elseif($user->role == 3)
                                                                  Employee
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($user->role==3)
                                                                <p class="mb-0"><b>Start:</b>{{$user->start_time}}</p>
                                                                <p class="mb-0"><b>End:</b>{{$user->end_time}}</p>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($user->status == 0)
                                                                <span class="badge badge-danger">Inactive</span>

                                                                @elseif($user->status== 1)
                                                                <span class="badge badge-success">Active</span>
                                                                @endif
                                                            </td>

                                                            <td class="action-button">
                                                                <ul>
                                                                  <li><a href="" data-toggle="modal" data-target="#edit{{$user->id}}"><i class="fa fa-edit"></i></a></li>
                                                                  @if(Auth::user()->id == $user->id)
                                                                  @else
                                                                  <li><a href="" data-toggle="modal" data-target="#delete{{$user->id}}"><i class="fa fa-trash"></i></a></li>

                                                                  @endif
                                                                </ul>

                                                                 {{-- modal for delete --}}

                                                    <!-- Modal -->
                                                <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Conform delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action={{ route('user.destroy', $user->id) }}>
                                                                @csrf
                                                             <input type="submit" value="confirm" name="delete"  class="btn btn-danger">
                                                            </form>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <!-- form start -->
                                                           <form action="{{ route('user.update', $user->id)}}" method="POST">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">Full Name</label>
                                                                <input type="text" value="{{ $user->name}}" name="name" class="form-control form-control-lg" required="required" >
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">E-mail Address</label>
                                                                <input type="text" value="{{ $user->email}}" name="email" class="form-control form-control-lg" required="required" >
                                                            </div>

                                                        </div>
                                                         <div class="form-row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">Phone</label>
                                                                <input type="text" value="{{ $user->phone}}" name="phone" class="form-control form-control-lg" required="required" >
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">Role</label>
                                                                <select name="role" required="required" class="form-control role_two">

                                                                    <option value="1" @if($user->role==1)selected @endif>Admin</option>
                                                                    <option value="2" @if($user->role==2)selected @endif>Mangager</option>
                                                                    <option value="3" @if($user->role==3)selected @endif>Employee</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">Password</label>
                                                                <input type="password" required name="password" class="form-control form-control-lg">
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">Re-enter Password</label>
                                                                <input type="password" required name="password_confirmation" class="form-control form-control-lg">
                                                            </div>
                                                        </div>
                                                          <div class="form-row emp_time_two">
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">Start Time[optional]</label>
                                                                <input type="text" value="00:00:00" name="start_time" class="form-control form-control-lg" required="required" >
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="font-weight-bold text-dark text-2">End Time[optional]</label>
                                                                <input type="text" value="23:59:59" name="end_time" class="form-control form-control-lg" required="required" >
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-12">
                                                                <label class="font-weight-bold text-dark text-2">Status</label>
                                                               <select name="status" class="form-control">
                                                                   <option value="1"@if($user->status==1)selected @endif>Active</option>
                                                                   <option value="0"@if($user->status==0)selected @endif>Inactive</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-3">
                                                                <input type="submit" value="update" class="btn btn-primary float-right" data-loading-text="Loading...">
                                                            </div>
                                                        </div>
                                                    </form>
                                                          <!-- form end -->

                                                        </div>

                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- modal for edit end -->

                                                </td>

                                                   {{-- edit for user --}}

                                                        </tr>
                                                    </tbody>
                                                    @php $i++ ; @endphp
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>



                        </div>
                    </div>

@endsection
