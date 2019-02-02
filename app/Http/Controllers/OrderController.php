<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Client;
use App\City;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordes = Order::paginate(20);
        return view('orders.index' , compact('recordes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
      return view('orders.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rulse = [
            'name' =>  'required',
            'age' =>  'required',
            'blood_type' =>  'required',
            'many_bages' =>  'required',
            'hospital_name' =>  'required',
            'hospital_addres' =>  'required',
            'phone' =>  'required',
            'notes' =>  'required',
            'city_id' =>  'required',
            'client_id' =>  'required',
            'latitude' =>  'required',
            'longitude' =>  'required',





        ];
        $message = [
            'name.required' => 'name is required',
            'age.required' => 'age is required',
            'blood_type.required' => 'blood_type is required',
            'many_bages.required' => 'many_bages is required',
            'hospital_name.required' => 'hospital_name is required',
            'hospital_addres.required' => 'hospital_addres is required',
            'phone.required' => 'phone is required',
            'notes.required' => 'notes is required',
            'city_id.required' => 'city_id is required',
            'client_id.required' => 'client_id is required',
            'latitude.required' => 'latitude is required',
            'longitude.required' => 'longitude is required',



        ];
        $this->validate($request , $rulse , $message);

        // $recordes = new Order;
        // $recordes->name = $request->input('name');
        // $recordes->age = $request->input('age');
        // $recordes->blood_type = $request->input('blood_type');
        // $recordes->many_bages = $request->input('many_bages');
        // $recordes->hospital_name = $request->input('hospital_name');
        // $recordes->hospital_addres = $request->input('hospital_addres');
        // $recordes->phone = $request->input('phone');
        // $recordes->notes = $request->input('notes');
        // $recordes->City = $request->input('City');
        // $recordes->Client = $request->input('Client');


        // $recordes->save();
          $record = Order::create($request->all());

        flash()->success('تم الاضافه بنجاح');
        return redirect(route('orders.index'));


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
        $model = Order::findOrFail($id);
        return view('orders.edit' , compact('model'));
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
        $record = Order::findOrFail($id);
        $record->update($request->all());
        flash()->success('تم التعديل بنجاح');
        return redirect(route('orders.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Order::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect(route('orders.index'));


    }
}
