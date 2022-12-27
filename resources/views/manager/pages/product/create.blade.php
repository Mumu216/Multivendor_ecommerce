@extends('backend.layout.template');

@section('body-content')
<div class="br-pagetitle">

</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
         <h6 class="br-section-label">Create new product</h6>

        <div class="row">
            <div class="col-lg-12">
              <div class="card bd-0 overflow-hidden">
                <form action="{{ route('manager.product.store')}}" enctype="multipart/form-data"  method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Category</label>
                                  <select class="form-control" name="category_id">
                                   <option>Please Selecet the Category</option>
                                    @foreach($categories as $pcat)
                                      <option value="{{ $pcat->id }}">{{ $pcat->title }}</option>
                                     @foreach(App\Models\Category::orderBy('title' , 'asc')->where('is_parent' , $pcat->id)->get() as $ccat)
                                      <option value="{{ $ccat->id }}">--{{ $ccat->title }}</option>
                                     @endforeach
                                   @endforeach
                                </select>
                            </div>


                              <div class="form-group">
                                    <label >product Name*</label>
                                    <input type="text" name="title" class="form-control" autocomplete="off" required="required" placeholder="Enter product Name">
                                </div>

                                <div class="form-group">
                                    <label >SKU </label>
                                    <input type="text" name="sku" class="form-control" autocomplete="off" placeholder="Enter SKU code">
                                </div>


                                <div class="form-group col-12" style="border: 1px solid #ddd;margin: 10px 0;border-radius: 5px">
                                    <h4 class="mb-1">Attributes</h4>
                                    <div class="form-row">
                                        @foreach(App\Models\ProductAttribute::all() as $attribute)
                                            <div class="form-group col-md-3 col-12">
                                                <input type="checkbox" name="atr[]" class="attribute_id" value="{{$attribute->id}}">

                                                <label class="text-capitalize" for="">{{$attribute->name}}</label>
                                                <div class="sub_atr">

                                                    @foreach(App\Models\Atr_item::where('atr_id',$attribute->id)->get() as $att_item)
                                                <p class="mb-0">
                                                        <input type="checkbox" name="att_item[]" class="attribute_item" value="{{$att_item->id}}">
                                                        <label class="text-capitalize" for="">{{$att_item->name}}</label>
                                                    </p>
                                                @endforeach
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>


                            <div class="form-group">
                                <label>Featured thumbnail* [400px*400px]</label>
                            <input type="file" required="" name="image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label>Gallery Image[400px*400px]</label>
                            <input type="file" name="gallery_images" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Select Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Product Assign</label>
                                <select name="assign" class="form-control">
                                    <option value="">Select Employee</option>
                                    @foreach(App\Models\User::where('role',3)->get() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>Regular Price* </label>
                            <input type="number" name="regular_price" class="form-control" autocomplete="off" required="required" placeholder="Enter regular price">
                        </div>

                            <div class="form-group">
                                <label>Offer Price </label>
                                <input type="number" name="offer_price" class="form-control" autocomplete="off"  placeholder="Enter offer price">
                            </div>

                            <div class="form-group">
                                <label >Stock </label>
                                <input type="number" name="stock" class="form-control" autocomplete="off"  placeholder="Enter Stock">
                            </div>

                            <div class="form-group">
                               <label>Description </label>
                                <textarea name="description" class="form-control ckeditor " rows="4"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                         <div class="form-group">
                        <input type="submit" name="addproduct" value="Add New product" class="btn btn-teal btn-block mg-b-10">
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
