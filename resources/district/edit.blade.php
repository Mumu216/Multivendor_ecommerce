@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Update District Information</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update District Information</h6>
         <div class="row">

                 <div class="col-lg-6">
                    <form action="{{ route('district.update' , $district->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>District Name</label>
                             <input type="text" name="district_name" class="form-control" required="required" autocomplete="off" placeholder="Enter District Name" value="{{ $district->district_name }}">
                         </div>

                         <div class="form-group">
                            <label>Division Name</label>
                              <select class="form-control" name="division_id">
                                <option>Please Selecet the Division Name</option>
                                 @foreach($divisions as $division)
                                 <option value="{{ $division->id }}"
                                   @if($division->id == $district->division_id)
                                     selected
                                   @endif
                                >{{ $division->name }}</option>
                                 @endforeach
                              </select>
                         </div>

                         <div class="form-group">
                           <label>District Status</label>
                             <select class="form-control" name="status">
                                 <option value="1">Please Select the Status</option>
                                  <option value="1" @if($district->status == 1) selected @endif>Active</option>
                                   <option value="0" @if($district->status == 0) selected @endif>Inactive</option>
                                 </select>
                              </div>


                              <div class="form-group">
                               <input type="submit" name="updatedistrict" value="Value Changes" class="btn btn-teal btn-block mg-b-10">
                             </div>
                            </div>
                     </form>
                </div>
             </div>
            </div>
        </div>
@endsection




