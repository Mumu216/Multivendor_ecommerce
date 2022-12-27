@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">

 </div>
            <div class="br-pagebody">
            <div class="br-section-wrapper">

                @foreach($settings as $settings)


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bd-0 overflow-hidden">
                           <form action="{{ route('settings.update', $settings->id)}}" enctype="multipart/form-data"  method="POST">
                            @csrf
                           <div class="row">
                               <div class="col-lg-6">
                                     <div class="form-group">
                                <label >Website Address</label>
                                <textarea name="address" class="form-control">{{ $settings->address}}</textarea>
                            </div>

                            <div class="form-group">
                                <label >Website Phone</label>
                                <input type="text" name="phone" value="{{ $settings->phone}}" class="form-control">
                            </div>

                             <div class="form-group">
                                <label >Website Phone 2</label>
                                <input type="text" name="phone_two" value="{{ $settings->phone_two}}" class="form-control">
                            </div>
                             <div class="form-group">
                                <label >Website Phone 3</label>
                                <input type="text" name="phone_three" value="{{ $settings->phone_three}}" class="form-control">
                            </div>
                             <div class="form-group">
                                <label >Website Email</label>
                                <input type="text" name="email" value="{{ $settings->email}}" class="form-control">
                            </div>
                             <div class="form-group">
                                <label >Website Email 2</label>
                                <input type="text" name="email_two" value="{{ $settings->email_two}}" class="form-control">
                            </div>
                             <div class="form-group">
                                <label >Website Facebook Link</label>
                                <input type="text" name="fb_link" value="{{ $settings->fb_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Website Twitter Link</label>
                                <input type="text" name="twitter_link" value="{{ $settings->twitter_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Website Youtube Link</label>
                                <input type="text" name="youtube_link" value="{{ $settings->yt_link}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Website Instagram Link</label>
                                <input type="text" name="insta_link" value="{{ $settings->insta_link}}" class="form-control">
                            </div>
                        </div>

                          <div class="col-lg-6">
                             <div class="form-group">
                              <label>Website Copyright Text</label>
                              <textarea name="copyright" class="form-control">{{ $settings->copyright}}</textarea>
                            </div>

                               <div class="form-group">
                                  <label >Website Header Logo</label>
                                   <input type="file" class="form-control-file" name="logo">
                                   @if(!is_null($settings->logo))
                                   <img src="{{ asset('backend/img/'.$settings->logo)  }}" width="50">
                                   @endif
                                </div>

                              <div class="form-group">
                                  <label>Website Favicon</label>
                                   <input type="file" class="form-control-file" name="favicon">
                                   @if(!is_null($settings->favicon))
                                   <img src="{{ asset('backend/img/'.$settings->favicon)  }}" width="50">
                                   @endif
                                </div>

                                <div class="form-group">
                                  <label>Currency Sign</label>
                                  <input type="text" name="currency" value="{{ $settings->currency}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Bkash Merchant Number</label>
                                <input type="text" name="bkash" value="{{ $settings->bkash}}" class="form-control">
                            </div>

                              <div class="form-group">
                                  <label >Facebook Pixel Code</label>
                                   <textarea name="fb_pixel" class="form-control">{{ $settings->fb_pixel}}</textarea>
                                </div>

                               <div class="form-group">
                                  <label >About Us</label>
                                   <textarea name="about_us" class="form-control">{{ $settings->about_us}}</textarea>
                                </div>

                               <div class="form-group">
                                  <label >Delivery Policy</label>
                                  <textarea name="delivery_policy" class="form-control">{{ $settings->delivery_policy}}</textarea>
                                </div>

                               <div class="form-group">
                                  <label >Return Policy</label>
                                   <textarea name="return_policy" class="form-control">{{ $settings->return_policy}}</textarea>
                                </div>
                            </div>
                           </div>

                            <div class="form-group">
                                <input type="submit" name="addSettings" value="Update" class="btn btn-teal btn-block mg-b-10">
                             </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection
