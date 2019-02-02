@extends('layouts.app')
@inject('model' , App\Post)
@inject('categories' , App\Category)

@section('page_title')
 Create posts
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create of Post</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">     
        
        {!! Form :: model($model , [
         'action' => 'PostController@store'
        ]) !!}
      
        @include('vlaidate.validationErrors')
        <div class="form-group">
         <label for="title">Title</label>
         {!! Form::text('title' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <label class="form-control" for="image">Choose an image : </label>
                    {!! Form::file('image', [
                    'class'=>'form-control'

                   ]) !!}
                   <div class="form-group">
         <label for="content">content</label>
         {!! Form::text('content' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div><div class="form-group">
         <label for="description">description</label>
         {!! Form::text('description' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        {!! Form::select('category_id' , $categories->pluck('name' , 'id')->toArray() , [
          'class' => 'form-control'

        ])!!}

           <div class="form-group">
             <button class="btn btn-primary" type="submit">Add</button>
  
           </div>
        {!! Form::close() !!}
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->  


@endsection


