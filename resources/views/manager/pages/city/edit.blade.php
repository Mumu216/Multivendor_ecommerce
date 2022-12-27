@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">


      </div>
            <div class="br-pagebody">
            <div class="br-section-wrapper">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bd-0 overflow-hidden">
                        <form action="{{ route('manager.city.store')}}" method="POST">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <h6 class="br-section-level">Create New City</h6>

                                    <div class="form-group">
                                        <label>Courier Name *</label>
                                        <select name="courier_id" class="form-control">
                                            @foreach($couriers as $courier)
                                              <option value="{{ $courier->id }}" @if($courier->id == $city->courier_id) selected @endif>{{ $courier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>city Name *</label>
                                        <input type="text" name="city" class="form-control" value="{{ $city->city }}"  required="required" >
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" @if($city->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($city->status == 0) selected @endif>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="updatecity" value="Update City" class="btn btn-teal btn-block mg-b-10">
                                    </div>


                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
