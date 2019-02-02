<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Government;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordes = City::paginate(10);
        return view('cities.index' , compact('recordes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governments = Government::pluck('name' , 'id')->toArray();
        return view('cities.create' , compact('governments'));
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
            'name' => 'required'
        ];
        $message = [
            'name.required'  => 'name is required'
        ];
        $this->validate($request , $rulse , $message);

        $recordes = new City;
        $recordes->name=$request->input('name');
        $recordes->government_id=$request->input('government_id');
        $recordes->save();
       // $record = City::create($request->all());
            flash()->success('Success');

        return redirect(route('cities.index'));

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
    //     $governments = Government::pluck('name' , 'id')->toArray();
    //     return view('cities.create' , compact('governments'));
        $model = City::findOrFail($id);
        return view('cities.edit' , compact('model'));
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


        $record = City::findOrFail($id);
        $record->update($request->all());
        flash()->success('تم التعديل  بنجاح');
        return redirect(route('cities.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = City::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect(route('cities.index'));
    }
}
