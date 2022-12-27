<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Courier;
use App\Models\Product;
use App\Models\City;
use App\Models\Zone;
use App\Models\Settings;
use App\Models\Shipping;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\CustomersExport;
use App\Exports\OrdersExport;
use DB;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_cart_update(Request $request, $id, $order)
    {
        $orders = Order::find($order);

        $cart = Cart::where('ip_address' , request()->ip())->where('product_id' , $id)->where('order_id', $order)->first();

        if(!is_null($cart))
        {
            $cart->increment('quantity');
            $notification = array(
                'message' => 'Another Quantity Added',
                'alert-type' => 'info'
            );
            return response()->json($cart);
        }
        else{
            $cart = new Cart();
            $cart->ip_address   =$request->ip();
            $cart->product_id   =$id;
            $cart->quantity     = 1;
            $cart->order_id     =$order;

            $cart->save();
            $notification = array(
                'message' =>'Item Added Successfully',
                'alert-type' => 'info'
            );

            return response()->json($orders);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_cart(Request $request, $id)
    {

        $cart = Cart::where('ip_address' , request()->ip())->where('product_id' , $id)->where('order_id', NULL)->first();

        if(!is_null($cart))
        {
            $cart->increment('quantity');
            $notification = array(
                'message' => 'Another Quantity Added',
                'alert-type' => 'info'
            );
            return response()->json($cart);
        }
        else{
            $cart = new Cart();
            $cart->ip_address   =$request->ip();
            $cart->product_id   =$id;
            $cart->quantity     = 1;


            $cart->save();
            $notification = array(
                'message' =>'Item Added Successfully',
                'alert-type' => 'info'
            );

            return response()->json($cart);

        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $settings = Settings::all();
       $orders = Order::orderBy('id','desc')->paginate(15);
       $last = Order::orderBy('id','desc')->first();
       return view('backend.pages.order.manage', compact('settings' , 'orders','last'));
    }

    public function get_city(Request $request)
    {
       $data['city'] = City::where('courier_id' , $request->courier_id)->get();
       return response()->json($data);
    }

    public function get_zone(Request $request)
    {
       $data['zone'] = Zone::where('city' , $request->city)->get();
       return response()->json($data);
    }

    public function processing()
    {
       $settings = Settings::first();
       $orders = Order::orderBy('id','desc')->where('status',1)->paginate(15);
       $last = Order::orderBy('id','desc')->where('status',1)->first();
       return view('backend.pages.order.manage', compact('settings' , 'orders','last'));
    }

    public function hold()
    {
       $settings = Settings::first();
       $orders = Order::orderBy('id','desc')->where('status',2)->paginate(15);
       $last = Order::orderBy('id','desc')->where('status',2)->first();
       return view('backend.pages.order.manage', compact('settings' , 'orders','last'));
    }

    public function pending()
    {
       $settings = Settings::first();
       $orders = Order::orderBy('id','desc')->where('status',3)->paginate(15);
       $last = Order::orderBy('id','desc')->where('status',3)->first();
       return view('backend.pages.order.manage', compact('settings', 'orders','last'));
    }

    public function completed()
    {
       $settings = Settings::first();
       $orders = Order::orderBy('id','desc')->where('status',4)->paginate(15);
       $last = Order::orderBy('id','desc')->where('status',4)->first();
       return view('backend.pages.order.manage', compact('settings', 'orders','last'));
    }

    public function canceled()
    {
       $settings = Settings::first();
       $orders = Order::orderBy('id','desc')->where('status',5)->paginate(15);
       $last = Order::orderBy('id','desc')->where('status',5)->first();
       return view('backend.pages.order.manage', compact('settings', 'orders','last'));
    }


    public function pending_p()
    {
       $settings = Settings::first();
       $orders = Order::orderBy('id','desc')->where('status',6)->paginate(15);
       $last = Order::orderBy('id','desc')->where('status',6)->first();
       return view('backend.pages.order.manage', compact('settings', 'orders','last'));
    }


    public function to_processing($id)
    {
       $order = Order::find($id);
       $order->status = 1;
       $order->save();
       $notification = array(
        'message' => 'Status changed!',
        'alert-type' => 'info'
       );
       return redirect()->back()->with('notification');
    }


    public function to_hold($id)
    {
       $order = Order::find($id);
       $order->status = 2;
       $order->save();
       $notification = array(
        'message' => 'Status changed!',
        'alert-type' => 'info'
       );
       return redirect()->back()->with('notification');
    }

    public function to_pending($id)
    {
       $order = Order::find($id);
       $order->status = 3;
       $order->save();
       $notification = array(
        'message' => 'Status changed!',
        'alert-type' => 'info'
       );
       return redirect()->back()->with('notification');
    }

    public function to_completed($id)
    {
       $order = Order::find($id);
       $order->status = 4;
       $order->save();
       $notification = array(
        'message' => 'Status changed!',
        'alert-type' => 'info'
       );
       return redirect()->back()->with('notification');
    }

    public function to_canceled($id)
    {
       $order = Order::find($id);
       $order->status = 5;
       $order->save();
       $notification = array(
        'message' => 'Status changed!',
        'alert-type' => 'info'
       );
       return redirect()->back()->with('notification');
    }

    public function to_pending_p($id)
    {
       $order = Order::find($id);
       $order->status = 6;
       $order->save();
       $notification = array(
        'message' => 'Status changed!',
        'alert-type' => 'info'
       );
       return redirect()->back()->with('notification');
    }


       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shippings = Shipping::where('status' , 1)->get();
        $cart = Cart::where('ip_address' , request()->ip())->where('order_id' , NULL)->get();
        return view('backend.pages.order.create', compact('shippings', 'cart'));
    }


    public function assign_edit(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_assign   =$request->order_assign;
        $order->save();
        return redirect()->back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        if($cart->count()>=1){
            $current_time = Carbon::now()->format('H:i:s');
        $user = User::where('start_time', '<', $current_time)->where('end_time','>', $current_time)->where('role',3)->inRandomOrder()->first();

        $order = new Order();
        $order->name  =$request->name;
        if(!is_null($user))
        {
            $order->order_assign  =$user->id;
        }


        $order->address          =$request->address;
        $order->sub_total        =$request->sub_total;
        $order->pay              =$request->pay;
        $order->phone            =$request->phone;
        $order->shipping_cost    =$request->shipping_cost;
        $shipping = Shipping::where('id' , $request->shipping_method)->get();
        $order->total             =$request->sub_total + $request->shipping_cost - $request->discount;
        $order->shipping_method   =$request->shipping_method;
        $order->discount          =$request->discount;
        $order->status            = 1;
        $order->order_note        =$request->order_note;
        $order->courier           =$request->courier;
        $order->city              =$request->city;
        $order->zone              =$request->zone;
        $order->sub_total         =$request->sub_total;
        $order->ip_address        =request()->ip();
        $order->save();
        foreach(Cart::totalCarts() as $cart)
        {
            $cart->order_id     =$order->id;
            $cart->save();
        }

        return redirect()->route('order.manage');

    }
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shippings =Shipping::where('status',1)->get();
        $orderDetails = Order::find($id);
        if (!is_null($orderDetails)) {
            return view('backend.pages.order.details', compact('orderDetails','shippings'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $carts = Cart::where('order_id', $id)->get();

        $total_price = 0;

        foreach($carts as $cart)
        {
            if(!is_null($cart->product))
            {
                if(!is_null($cart->product->offer_price))
                {
                    $total_price += $cart->product->offer_price *  $cart->quantity;
                }
                else{

                    $total_price += $cart->product->regular_price *  $cart->quantity;

                }
            }
        }

        $net_price = $total_price - $order->discount + $order->shipping_cost;

        if (!is_null($order))
        {
            $shippings =Shipping::where('status',1)->get();
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', $order->id)->get();
            return view('backend.pages.order.update', compact('order','carts','net_price','total_price'));
        }
    }

    public function print($id)
    {
        $orders = Order::find($id);
        $carts = Cart::where('order_id', $id)->get();
        $settings = Settings::first();
        return view('backend.pages.order.invoice', compact('orders','carts', 'settings'));
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
        $order = Order::find($id);
        $cart = Cart::where('ip_address', request()->ip())->where('order_id', $order->id)->get();
        if($cart->count()>=1){

        $order = new Order();
        $order->name  =$request->name;



        $order->address          =$request->address;
        $order->sub_total        =$request->sub_total;
        $order->pay              =$request->pay;
        $order->phone            =$request->phone;
        $order->shipping_cost    =$request->shipping_cost;
        $shipping = Shipping::where('id' , $request->shipping_method)->get();
        $order->total             =$request->sub_total + $request->shipping_cost - $request->discount;
        $order->shipping_method   =$request->shipping_method;
        $order->discount          =$request->discount;
        $order->status            = 1;
        $order->order_note        =$request->order_note;
        $order->courier           =$request->courier;
        $order->city              =$request->city;
        $order->zone              =$request->zone;
        $order->sub_total         =$request->sub_total;
        $order->ip_address        =request()->ip();
        $order->save();
        foreach(Cart::totalCarts() as $cart)
        {
            $cart->order_id     =$order->id;
            $cart->save();
        }

        return redirect()->route('order.manage');

    }
    return redirect()->back();
    }

    public function update_s(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status   =$request->status;
        $order->save();

        return redirect()->route('order.manage');
    }

    public function update_auto(Request $request)
    {
        dd($request->all());
        return 'success';
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!is_null($order)) {
           $order->delete();
        }
        return redirect()->back();

    }

    public function  deleteCheckedOrders(Request $request)
    {
        $ids = $request->all_id;
        Order::whereIn('id', explode(",",$ids))->delete();
        $notification =array(
            'message' => 'order deleted',
            'alert-type' => 'error'
        );

        return redirect()->route('order.manage')->with($notification);
    }

    public function printCheckedOrders(Request $request)
    {
        $ids = $request->all_id_print;

        $settings = Settings::first();
        $orders = Order::whereIn('id', explode(",",$ids))->get();
        return view('backend.pages.order.bulk_invoices', compact('orders','settings'));

    }

    public function selected_status(Request $request)
    {
        $status  =$request->status;
        $ids     =$request->all_status;
        $orders = Order::whereIn('id', explode(",",$ids))->get();
        foreach($orders as $order)
        {
            $order->status   =$status;
            $order->save();
        }
        return redirect()->back();

    }


    public function selected_e_assign(Request $request)
    {
        $status  =$request->e_assign;
        $ids     =$request->all_e_assign;
        $orders = Order::whereIn('id', explode(",",$ids))->get();
        foreach($orders as $order)
        {
            $order->order_assign   =$status;
            $order->save();
        }
        return redirect()->back();

    }

    public function ajax_find_product($id)
    {
        $product = Product::where('id' , $id)->first();
        return response()->json($product);
    }

    public function ajax_find_courier($id)
    {
        $courier = Courier::where('id' , $id)->first();
        return response()->json($courier);
    }

}
