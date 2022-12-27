<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartItems = Cart::orderBy('id', 'desc')->where('order_id', null)->get();
        return view('frontend.pages.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('ip_address', request()->ip())->where('product_id', $request->product_id)->where('order_id', NULL)->first();

          if(!is_null($cart))
          {
            $cart->increment('quantity');
            $notification = array(
                'message'    => 'Another Quantity Added',
                'alert-type' => 'info'
            );
                return redirect()->back()->with($notification);
          }
          else{
            $cart= new Cart();

            $cart->attribute  =json_encode($request->attribute);
            $cart->ip_address =$request->ip();
            $cart->product_id =$request->product_id;
            $cart->quantity   =$request->quantity;
            $cart->price     =$request->price;

            $cart->save();

            $notification = array(
                'message'    => 'Item Added successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function o_store(Request $request)
    {
        $cart = Cart::where('ip_address', request()->ip())->where('product_id', $request->product_id)->where('order_id', NULL)->first();

        if(!is_null($cart))
        {
          $cart->increment('quantity');
          $notification = array(
              'message'    => 'Another Quantity Added',
              'alert-type' => 'info'
          );
              return redirect()->route('checkout');
        }
        else{
          $cart= new Cart();

          $cart->attribute  =json_encode($request->attribute);
          $cart->ip_address =$request->ip();
          $cart->product_id =$request->product_id;
          $cart->quantity   =$request->quantity;
          $cart->price     =$request->price;

          $cart->save();

          $notification = array(
              'message'    => 'Item Added successfully',
              'alert-type' => 'success'
          );
          return redirect()->route('checkout');
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
        $cart = Cart::find($id);
        if(!is_null($cart))
        {
            $cart->quantity  =$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else{

            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart= Cart::find($id);

        if (!is_null($cart)) {
            $cart->delete();
             $notification = array(
             'message'    => 'Cart Deleted',
             'alert-type' => 'error'
         );
        }
        else
        {
         return redirect()->back()->with($notification);
        }
        return redirect()->back()->with($notification);

     }
    
}
