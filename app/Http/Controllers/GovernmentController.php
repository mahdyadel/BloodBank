<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validate;
use App\Government;

class GovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordes = Government::paginate(20);
        return view('governments.index' , compact('recordes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governments.create');
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

        $recordes = new Government;
        $recordes->name=$request->input('name');
        $recordes->save();
        //$record = Government::create($request->all());
            flash()->success('Success');

        return redirect(route('governments.index'));
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
        $model  = Government::findOrFail($id);
        return view('governments.edit' , compact('model'));
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
        $record = Government::findOrFail($id);
        $record->update($request->all());
        flash()->success('Edited');
        
        return redirect(route('governments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Government::findOrFail($id);
        $record->delete();
        flash()->success('Deleted');
        return redirect(route('governments.index'));
    }

 
}
