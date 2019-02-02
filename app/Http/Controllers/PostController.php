<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordes = Post::paginate(10);
        return view('posts.index' , compact('recordes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'description' => 'required',
            'category_id' => 'required',


        ];
        $message = [
            'title.required' => 'title is required',
            'image.required' => 'image is required',
            'content.required' => 'content is required',
            'description.required' => 'description is required',
            'category_id.required' => 'category_id is required',


        ];
        $this->validate($request , $rulse , $message);
        $record = new Post;
        $record->title = $request->input('title');
        $record->content = $request->input('content');
        $record->description = $request->input('description');
        $record->category_id = $request->input('category_id');
        if($request->hasFile('image')){
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save( public_path('/uploads/' . $filename ) );
            $record->image = $filename;
            $record->save();
        };


        $record->save();
        // $record = Post::create($request->all());
         flash()->success('تم الاضافه بنجاح');
        return redirect(route('posts.index'));
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
        $model = Post::findOrFail($id);
        return view('posts.edit' , compact('model'));
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
        $record = Post::findOrFail($id);
        $record->update($request->all());
        flash()->success('تم التعديل بنجاح');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect(route('posts.index'));



    }
}
