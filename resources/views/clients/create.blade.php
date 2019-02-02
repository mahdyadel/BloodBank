@extends('layouts.app')
@inject('model' , App\Client)
@inject('blood_type' , App\Blood_type)
@inject('city' , App\City)
  


@section('page_title')
 Create Clients
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create of Client</h3>

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
         'action' => 'ClientController@store'
        ]) !!}

        @include('vlaidate.validationErrors')

        <div class="form-group">
         <label for="name">Name</label>
         {!! Form::text('name' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>        
        <div class="form-group">
         <label for="password">Password</label>
         {!! Form::password('password' ,null,[
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
         <label for="email">Email</label>
         {!! Form::text('email' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="blood_type">Blood_type</label>
         {!! Form::select('blood_type_id' , $blood_type->pluck('name' , 'id')->toArray() , null, [
          'class' => 'form-control'

        ])!!}
        </div>
        <div class="form-group">
         <label for="city">City</label>
         {!! Form::select('city_id' , $city->pluck('name' , 'id')->toArray() , null, [
          'class' => 'form-control'

        ])!!}
        </div>
        <div class="form-group">
         <label for="last_date">Last_date</label>
         {!! Form::text('last_date' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        <div class="form-group">
         <label for="birthday">Birthday</label>
         {!! Form::text('birthday' ,null,[
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


