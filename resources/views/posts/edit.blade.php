@extends('layouts.app')

@section('page_title')
 Edit Posts
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit of Post</h3>

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
         'action' => ['PostController@update', $model->id],
         'method' => 'put'

        ]) !!}
      
        @inject('model' , 'App\Post')

        @include('vlaidate.validationErrors')
        <div class="form-group">
         <label for="title">Title</label>
         {!! Form::text('title' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="image">Image</label>
         {!! Form::text('image' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="content">content	</label>
         {!! Form::text('content' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="description">description</label>
         {!! Form::text('description' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        
           <div class="form-group">
             <button class="btn btn-primary" type="submit">Add</button>
  
           </div>
        {!! Form::close() !!}
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->  


@endsection


