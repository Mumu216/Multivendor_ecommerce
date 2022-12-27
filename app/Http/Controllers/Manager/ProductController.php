<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::first();
        $products = Product::orderBy('id' , 'desc')->paginate(10);
        return view('manager.pages.product.manage' , compact('products', 'settings'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function p_selected_status(Request $request)
   {
        $status =$request->p_status;
        $ids =$request->p_all_status;
        $orders= Product::WhereIn('id',explode(",",$ids))->get();

        foreach($orders as $orders){
            $orders->status  =$status;
            $orders->save();
      }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderby('title' , 'asc')->where('is_parent', 0)->get();
        return view('manager.pages.product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->sku                   = $request->sku;

        if( $request->image){
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/products/' .$img);
            Image::make($image)->save($location);
            $product->image = $img;

        }
        if( $request->gallery_images){
            $image = $request->file('gallery_images');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/products/' .$img);
            Image::make($image)->save($location);
            $product->gallery_images = $img;

        }
        $product->title                 = $request->title;
        $product->slug                  = Str::slug($request->title);
        $product->description           = $request->description;
        $product->category_id           = $request->category_id;
        $product->atr                   =json_encode($request->atr);
        $product->atr_item              =json_encode($request->atr_item);
        $product->stock                 = $request->stock;
        $product->regular_price         = $request->regular_price;
        $product->offer_price           = $request->offer_price;
        $product->status                = $request->status;
        $product->assign                = $request->assign;
        $product->save();



        $notification = array(
            'message'    => 'product created!',
            'alert-type' => 'info'
        );

        return redirect()->route('product.manage')->with($notification);
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
    public function edit($id)
    {
        $product = Product::find($id);
        if(!is_null($product))
        {
            $categories = Category::orderby('title' , 'asc')->where('is_parent', 0)->get();
            return view('manager.pages.product.edit', compact('product','categories'));
        }
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
        $product =Product::find($id);
        $product->sku                      =$request->sku;
        if( $request->image){
            if (File::exists('Backend/img/products/' . $product->image)) {
                File::delete('Backend/img/products/' . $product->image);

            }
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/products/' .$img);
            Image::make($image)->save($location);
            $product->image = $img;

        }
        if( $request->gallery_images){
            if (File::exists('Backend/img/products/' . $product->gallery_images)) {
                File::delete('Backend/img/products/' . $product->gallery_images);

            }
            $image = $request->file('gallery_images');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/products/' .$img);
            Image::make($image)->save($location);
            $product->gallery_images = $img;

        }
        $product->title                    =$request->title;
        $product->stock                    =$request->stock;
        $product->description              =$request->description  ;
        $product->category_id              =$request->category_id;
        $product->atr                      =json_encode($request->atr);
        $product->atr_item                 =json_encode($request->atr_item);
        $product->regular_price            =$request->regular_price;
        $product->offer_price              =$request->offer_price;
        $product->assign                    =$request->assign;
        $product->status                   =$request->status;
        $product->save();



        $notification = array(
            'message'    => 'product updated!',
            'alert-type' => 'info'
        );
        return redirect()->route('product.manage')->with($notification);
        }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);
        if(!is_null($product))
        {
            $product->delete();
            $notification =array(
                'message'  => 'product deleted',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('product.manage')->with($notification);
   }

        public function assign_dlt($id)
        {
            $product = Product::find($id);
            if (!is_null($product)) {
                $product->assign ="";
                $product->save();
                $notification = array(
                'message'    => 'Assign deleted!',
                'alert-type' => 'error'
            );
            return redirect()->route('product.manage')->with($notification);
            }
        }

     public function deleteCheckedProducts(Request $request)
     {
        $ids =$request->ids;
        if(!is_null($ids))
        {
            Product::WhereIn('id',$ids)->delete();
            $notification =array(
                'message'  => 'product deleted',
                'alert-type' => 'error'

            );
        }
            else{

                $notification =array(
                    'message'  => 'product deleted',
                    'alert-type' => 'error'

                );
            }
            return redirect()->route('product.manage')->with($notification);

     }
}
