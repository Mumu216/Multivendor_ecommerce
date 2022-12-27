@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">


      </div>
            <div class="br-pagebody">
            <div class="br-section-wrapper">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bd-0 overflow-hidden">
                        <form action="{{ route('zone.store')}}"   method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <h6 class="br-section-label">Create new zone</h6>

                                    <div class="form-group">
                                        <label>Courier Name *</label>
                                        <select class="form-control" name="courier">
                                            @foreach($couriers as $courier)
                                             <option value="{{ $courier->id }}" @if($courier->id == $zone->courier_id) selected @endif>{{ $courier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>City Name *</label>
                                        <select class="form-control" name="city">
                                            @foreach($cities as $city)
                                             <option value="{{ $city->id }}" @if($city->id == $zone->city) selected @endif>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>zone Name *</label>
                                        <input type="text" name="zone" class="form-control" value="{{ $zone->zone }}"  required="required" >
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" @if($zone->status==1) selected @endif>Active</option>
                                            <option value="0" @if($zone->status==0) selected @endif>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="addzone" value="Add zone" class="btn btn-teal btn-block mg-b-10">
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
