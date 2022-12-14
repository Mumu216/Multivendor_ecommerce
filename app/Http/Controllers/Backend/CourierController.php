<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::all();
        return view('backend.pages.courier.manage', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.courier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courier = new Courier;
        $courier->name      =$request->name;
        $courier->city_av   =$request->city_av;
        $courier->zone_av   =$request->zone_av;
        $courier->charge    =$request->charge;
        $courier->status    =$request->status;
        $courier->save();

        return redirect()->route('courier.manage');


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
        $courier = Courier::find($id);
         if (!is_null($courier)) {
         return view('backend.pages.courier.edit', compact('courier'));

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
        $courier = Courier::find($id);
        $courier->name =$request->name;
        $courier->city_av =$request->city_av;
        $courier->zone_av =$request->zone_av;
        $courier->charge =$request->charge;
        $courier->status =$request->status;
        $courier->save();
        return redirect()->route('courier.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courier = Courier::find($id);
        if(!is_null($courier))
        {
            $courier->delete();
        }

        return redirect()->route('courier.manage');

    }
}
