@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Update Division Information</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>



  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update Division Information</h6>
         <div class="row">

                 <div class="col-lg-6">
                    <form action="{{ route('division.update', $division->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Division Name</label>
                             <input type="text" name="name" class="form-control" required="required" autocomplete="off" placeholder="Enter Division Name" value="{{ $division->name }}">
                         </div>

                         <div class="form-group">
                            <label>Priority Display Division [Ex:1]</label>
                             <input type="number" name="priority" class="form-control"  autocomplete="off" placeholder="Priority Display Division"  value="{{ $division->priority }}">
                         </div>

                         <div class="form-group">
                           <label>Division Status</label>
                             <select class="form-control" name="status">
                                 <option value="1">Please Select the Status</option>
                                  <option value="1" @if($division->status == 1) selected @endif>Active</option>
                                   <option value="0" @if($division->status == 0) selected @endif>Inactive</option>
                                 </select>
                              </div>


                              <div class="form-group">
                               <input type="submit" name="updatedivision" value="Save Changes" class="btn btn-teal btn-block mg-b-10">
                             </div>
                            </div>
                     </form>
                </div>
             </div>
            </div>
        </div>
@endsection
