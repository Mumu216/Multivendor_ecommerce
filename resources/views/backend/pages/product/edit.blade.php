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
                  <form action="{{ route('product.update', $product->id)}}" enctype="multipart/form-data"  method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label>Category</label>
                              <select class="form-control" name="category_id">
                                <option>Please Selecet the Category</option>
                                 @foreach($categories as $pcat)
                                 <option value="{{ $pcat->id }}"
                                  @if($pcat->id == $product->category_id)
                                   selected
                                  @endif
                                 >{{ $pcat->title }}</option>
                                 @foreach(App\Models\Category::orderBy('title' , 'asc')->where('is_parent' , $pcat->id)->get() as $ccat)
                                  <option value="{{ $ccat->id }}"
                                    @if($ccat->id == $product->category_id)
                                    selected
                                   @endif
                                   >--{{ $ccat->title }}</option>
                                   @endforeach
                                 @endforeach
                              </select>
                         </div>


                         <div class="form-group">
                            <label >product Name*</label>
                            <input type="text" name="title" class="form-control" autocomplete="off" required="required" value="{{$product->title}}" placeholder="Enter product Name">
                        </div>

                         <div class="form-group">
                            <label >SKU </label>
                            <input type="text" name="sku" value="{{$product->sku}}" class="form-control" autocomplete="off" placeholder="Enter SKU code">
                        </div>

                            <div class="form-group col-12" style="border: 1px solid #ddd;margin: 10px 0;border-radius: 5px">
                                    <h4 class="mb-1">Attributes</h4>
                                    <div class="form-row">
                                        @foreach(App\Models\ProductAttribute::all() as $attribute)
                                            <div class="form-group col-md-3 col-12">
                                                <input type="checkbox" name="atr[]" class="attribute_id" @foreach (App\Models\ProductAttribute::WhereIn('id',explode('"',$product->atr))->get() as $att)
                                                @if($att->id == $attribute->id) checked @endif

                                                @endforeach value="{{$attribute->id}}">

                                                <label class="text-capitalize" for="">{{$attribute->name}}</label>
                                                <div class="sub_atr">

                                                    @foreach(App\Models\Atr_item::where('atr_id',$attribute->id)->get() as $att_item)
                                                       <p class="mb-0">
                                                        <input type="checkbox" name="att_item[]" class="attribute_item" @foreach(App\Models\Atr_item::WhereIn('id',explode('"',$product->atr_item))->get() as $atr)
                                                        @if($atr->id == $att_item->id) checked  @endif

                                                          @endforeach value="{{$att_item->id}}">
                                                        <label class="text-capitalize" for="">{{$att_item->name}}</label>
                                                    </p>
                                                @endforeach
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"  class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1"@if($product->status==1)selected @endif>Published</option>
                                        <option value="0"@if($product->status==0)selected @endif>Unpublished</option>
                                    </select>
                                 </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Regular Price* </label>
                                        <input type="number" value="{{$product->regular_price}}" name="regular_price" class="form-control" autocomplete="off" required="required" placeholder="Enter regular price">
                                    </div>

                                    <div class="form-group">
                                        <label >Offer Price </label>
                                        <input type="number" value="{{$product->offer_price}}" name="offer_price" class="form-control" autocomplete="off"  placeholder="Enter offer price">
                                    </div>

                                    <div class="form-group">
                                        <label >Stock </label>
                                        <input type="number" value="{{$product->stock}}"  name="stock" class="form-control" autocomplete="off"  placeholder="Enter Stock">
                                    </div>

                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description" class="form-control ckeditor " rows="4">{{$product->description}}</textarea>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                   <div class="form-group">
                                   <input type="submit" name="addproduct" value="Update product" class="btn btn-teal btn-block mg-b-10">
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




