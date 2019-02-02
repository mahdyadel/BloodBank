<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordes = Client::paginate(10);
        return view('clients.index' , compact('recordes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'blood_type_id' => 'required',
            'city_id' => 'required',
            'last_date' => 'required',
            'birthday' => 'required',


        ];
        $message = [
            'name.required'  => 'name is required',
            'password.required'  => 'password is required',
            'phone.required'  => 'phone is required',
            'email.required'  => 'email is required',
            'blood_type_id.required'  => 'blood_type is required',
            'city_id.required'  => 'city is required',
            'last_date.required'  => 'last_date is required',
            'birthday.required'  => 'birthday is required',

        ];
        $this->validate($request , $rulse , $message);

        // $recordes = new Client;
        // $recordes->name=$request->input('name');
        // $recordes->government_id=$request->input('government_id');
        // $recordes->save();
       $record = Client::create($request->all());
            flash()->success('تم الاضافه بنجاح');

        return redirect(route('clients.index'));
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
        $model = Client::findOrFail($id);
        return view('clients.edit' , compact('model'));
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
        $record = Client::findOrFail($id);
        $record->update($request->all());
        flash()->success('تم التعديل بجاح');
        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Client::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect(route('clients.index'));
    }
}
