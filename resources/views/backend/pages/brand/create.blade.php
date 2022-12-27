@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create New brand</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Create New brand</h6>
         <div class="row">

                 <div class="col-lg-6">
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Brand Name</label>
                             <input type="text" name="name" class="form-control" required="required" autocomplete="off" placeholder="Enter Brand Name">
                         </div>

                         <div class="form-group">
                           <label>Brand Status</label>
                             <select class="form-control" name="status">
                                 <option value="0">Please Select the Status</option>
                                  <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                                 </select>
                              </div>

                              <div class="form-group">
                               <label>Image</label>
                                  <input type="file"  name="image" class="form-control-file">
                              </div>

                              <div class="form-group">
                               <input type="submit" name="addbrand" value="Add New Brand" class="btn btn-teal btn-block mg-b-10">
                             </div>
                            </div>
                     </form>
                </div>
             </div>
            </div>
        </div>
@endsection
