<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = Setting::find(1);
        return view('settings.edit' , compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rulse = [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'about' => 'required',
        //     'phone' => 'required',
        //     'facebook' => 'required',
        //     'twiter' => 'required',
        //     'instgram' => 'required',


        // ];
        // $message = [
        //     'name.required' => 'name is reqired',
        //     'email.required' => 'email is reqired',
        //     'about.required' => 'about is reqired',
        //     'phone.required' => 'phone is reqired',
        //     'facebook.required' => 'facebook is reqired',
        //     'twiter.required' => 'twiter is reqired',
        //     'instgram.required' => 'instgram is reqired',

        // ];
        // $this->validate($request , $rulse , $message);
        // $record = Setting::create($request->all());
        // flash()->success('تم الاضافه  بنجاح');
        // return redirect(route('settings.index'));
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
        $record = Setting::findOrFail(1);
        return view('settings.edit' , compact('record'));
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
        $record = Setting::findOrFail(1);
        $record->update($request->all());
        flash()->success('تم التعديل بنجاح');
        return redirect(route('settings.index'));
        
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
