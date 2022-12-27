@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">


      </div>
            <div class="br-pagebody">
            <div class="br-section-wrapper">


            	<div class="row">
            		<div class="col-lg-12">
            			<div class="card bd-0 overflow-hidden">
                        <form action="{{ route('shipping.store')}}" enctype="multipart/form-data"  method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <h6 class="br-section-label">Create new Shipping Method</h6>

                                  <div class="form-group">
                                    <label>Shipping Method Type</label>
                                    <input type="text" name="type" class="form-control" required="required" placeholder="eg:Inside Dhaka" required="required">
                                </div>


                                <div class="form-group">
                                    <label>Shipping Method Text</label>
                                    <input type="text" name="text" class="form-control" required="required" placeholder="eg:Inside Dhaka Delivery Charge" required="required">
                                </div>

                                <div class="form-group">
                                    <label >Shipping Method Amount</label>
                                    <input type="number" name="amount" class="form-control" autocomplete="off" required="required" placeholder="eg: 60">
                                </div>

                                  <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="addShipping" value="Add Shipping Method" class="btn btn-teal btn-block mg-b-10">
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
