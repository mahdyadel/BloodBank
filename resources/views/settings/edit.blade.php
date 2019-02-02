@extends('layouts.app')

@section('page_title')
 Edit Settings
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit of Setting</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">     
        
        {!! Form :: model($record , [
         'action' => ['SettingsController@update', $record->id],
         'method' => 'put'

        ]) !!}
      

        @include('vlaidate.validationErrors')
        <div class="form-group">
         <label for="name">Name</label>
         {!! Form::text('name' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="email">Email</label>
         {!! Form::text('email' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="about">About</label>
         {!! Form::text('about' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="phone">PHone</label>
         {!! Form::text('phone' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="facebook">Facebook</label>
         {!! Form::text('facebook' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="twiter">Twiter</label>
         {!! Form::text('twiter' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="instgram">Instgram</label>
         {!! Form::text('instgram' ,null,[
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


