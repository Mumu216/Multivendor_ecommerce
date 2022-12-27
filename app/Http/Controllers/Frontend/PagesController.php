<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Settings;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\User;
// use DateTime;
use Carbon\Carbon;

class PagesController extends Controller
{
    /**
     * Display a listing of the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        $settings = Settings::first();
        $sliders =  Slider::where('status',1)->get();
        $products = Product::where('status', 1)->paginate(10);
        $hots = Product::whereNotNull('offer_price')->take(6)->get();
        $categories = Category::orderBy('title','asc')->where('status', 1)->get();
        return view('frontend.pages.homepage', compact('sliders','products','hots','categories'));
    }

     /**
     * Display a listing of the All Products.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
        return view('frontend.pages.allProducts');
    }

     /**
     * Display a listing of the Product Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $product = Product::find($id);
        if(!is_null($product))
        {
            $settings = Settings::first();
            $categories = Category::orderBy('title','asc')->where('status', 1)->get();
        }
        return view('frontend.pages.details',compact('product','settings','categories'));
    }

       /**
     * Display a listing of the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $category =$request->category;
        $search   =$request->search;
        $settings = Settings::first();
         if($category || $search)
         {
            if($category)
            {
                $products = Product::where('category_id', 'like', '%' . $category . '%')->orderBy('id', 'asc')->where('status', 1)->paginate(10);
            }
            if($search)
            {
                $products = Product::where('name', 'like', '%' . $search . '%')->orderBy('id', 'asc')->where('status', 1)->paginate(10);
            }

            if($search && $category){
                $products = Product::where('category_id', 'like', '%' . $category . '%')
                ->where('name', 'like', '%' . $search . '%')
                ->orderBy('id','desc')->where('status', 1)->paginate(10);
            }
         }
         else{

            $products = Product::orderBy('id','desc')->Where('status',1)->paginate(10);

         }
        return view('frontend.pages.search', compact('products', 'search', 'settings'));
    }


     /**
     * Display a listing of the cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $current_time  = Carbon::now()->format('H:i:s');
        $user = User::where('start_time' ,'<','$current_time')->where('end_time','>','$current_time')->where('role',3)->inRandomOrder()->first();

        $order = new Order;
        $order->name    =$request->name;
        if(!is_null($user))
        {
            $order->order_assign   =$user->id;
        }

        $order->address   =$request->address;
        $order->phone     =$request->phone;
        $shipping = Shipping::where('id' , $request->shipping_method)->get();
        foreach($shipping as $shipping)
        {
           $order->shipping_cost   =$shipping->amount;
           $order->total    =$request->sub_total + $shipping->amount;

        }
           $order->shipping_method      =$request->shipping_method;
           $order->status  = 1;
           $order->sub_total    =$request->sub_total;
           $order->ip_address   =$request->ip();
           $order->save();
           foreach(Cart::totalCarts() as $cart)
           {
              $cart->order_id   =$order->id;
              $cart->save();
           }
        return redirect()->route('c_order');

    }


    public function ajax_find_shipping($id)
    {
        $shipping = Shipping::where('id', $id)->get();
        return response()->json($shipping);
    }


    public function cart_plus($id)
    {
        $cart_plus  = Cart::find($id);

        $cart_plus->quantity +=1;
        $cart_plus->save();

        return response()->json($cart_plus);
    }

    public function qty_minus($id)
    {
        $cart_plus  = Cart::find($id);

        if($cart_plus->quantity >=2  )
        {
           $cart_plus->quantity -=1;
        }
         $cart_plus->save();
         return response()->json($cart_plus);
    }




     /**
     * Display a listing of the checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $settings = Settings::first();
        $shipping = Shipping::where('status', 1)->get();
        $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        return view('frontend.pages.checkout', compact('settings','shipping', 'carts'));
    }

    /**
     * Display a listing of the login & Register page.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('frontend.pages.login');

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
    public function category($id)
    {
        $settings = Settings::first();
        $categories = Category::find($id);
        $products = Product::where('category_id', $categories->id)->where('status', 1)->paginate(10);
        return view('frontend.pages.category',compact('settings','categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
