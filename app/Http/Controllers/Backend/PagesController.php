<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;
use File;
use Image;
use Auth;

class PagesController extends Controller
{
   /**
     * Display a listing of our Admin Dashboard
     *
     * @return \Illuminate\Http\Response
     *
     *

     */

    public function dashboard()
    {
       return view('backend.pages.dashboard');
    }

    public function blank()
    {
       return view('backend.pages.blank');
    }

    /**

     * Display a listing of our Admin Dashboard
     *
     * @return \Illuminate\Http\Response
     *
     *

     */
    public function cart_atr_edit(Request $request,$id)
    {
        $cart = Cart::find($id);
        $cart->attribute =json_encode($request->attribute);
        $cart->save();
        return redirect()->back();
    }

    public function p_i_e(Request $request,$id)
    {
        $product = Product::find($id);
        if( $request->image){
             if (File::exists('backend/img/products/' . $product->image)) {
                File::delete('backend/img/products/' . $product->image);

            }
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/products/' .$img);
            Image::make($image)->save($location);
            $product->image = $img;

        }
        $product->save();
        return redirect()->back();
    }

    public function p_i_d($id)
    {
       $product = Product::find($id);
       $product->image =NULL;
       $product->save();
       return redirect()->back();
    }

    public function p_g_e(Request $request,$id)
    {
        $product = Product::find($id);
        if( $request->image){
             if (File::exists('backend/img/products/' . $product->gallery_images)) {
                File::delete('backend/img/products/' . $product->gallery_images);

            }
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/products/' .$img);
            Image::make($image)->save($location);
            $product->gallery_images = $img;

        }
        $product->save();
        return redirect()->back();
    }

    public function p_g_d(Request $request,$id)
    {
        $product = Product::find($id);
        $product->gallery_image =NULL;
        $product->save();
        return redirect()->back();
    }


    public function p_s_e(Request $request,$id)
    {
        $product = Slider::find($id);
        if( $request->image){
             if (File::exists('backend/img/sliders/' . $product->name)) {
                File::delete('backend/img/sliders/' . $product->name);

            }
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/sliders/' .$img);
            Image::make($image)->save($location);
            $product->name = $img;

        }
        $product->save();
        return redirect()->back();
    }
    public function p_s_d($id)
    {
       $product = Slider::find($id);
       $product->name =NULL;
       $product->save();
       return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::all();
        return view('backend.pages.settings' , compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings = Settings::find($id);
        // $settings->address        = $request->address;
        $settings->phone               = $request->phone;
        $settings->phone_two           = $request->phone_two;
        $settings->phone_three         = $request->phone_three;
        $settings->email               = $request->email;
        $settings->email_two           = $request->email_two;
        $settings->fb_link             = $request->fb_link;
        $settings->twitter_link        = $request->twitter_link;
        $settings->youtube_link        = $request->youtube_link;
        $settings->insta_link          = $request->insta_link;
        $settings->copyright           = $request->copyright;

        if($request->logo)
        {
            if(File::exists('Backend/img/'  .$settings->logo)){
                File::delete('Backend/img/' .$settings->logo);
            }

            $image = $request->file('logo');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/' .$img);
            Image::make($image)->save($location);
            $settings->logo = $img;
        }

        if( $request->favicon){
            if (File::exists('Backend/img/' . $settings->favicon)) {
               File::delete('Backend/img/' . $settings->favicon);

           }
           $image = $request->file('favicon');
           $img = rand() . '.' . $image->getClientOriginalExtension();
           $location = public_path('backend/img/' .$img);
           Image::make($image)->save($location);
           $settings->favicon = $img;

       }

        $settings->currency = $request->currency;
        $settings->bkash = $request->bkash;
        $settings->fb_pixel = $request->fb_pixel;
        $settings->about_us = $request->about_us;
        $settings->delivery_policy = $request->delivery_policy;
        $settings->return_policy = $request->return_policy;
        $settings->google_sheet = $request->google_sheet;
        $settings->save();
         $notification = array(
            'message'    => 'settings updated!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
