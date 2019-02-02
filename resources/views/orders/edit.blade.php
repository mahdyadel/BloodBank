@extends('layouts.app')
@inject('client' , 'App\Client')
@inject('city' , 'App\City')

@section('page_title')
 Edit Orders
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit of Order</h3>

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
         'action' => ['OrderController@update', $model->id],
         'method' => 'put'

        ]) !!}
      
        @inject('model' , 'App\Order')

        @include('vlaidate.validationErrors')
        <div class="form-group">
         <label for="name">Name</label>
         {!! Form::text('name' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="age">Age</label>
         {!! Form::text('age' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="blood_type">blood_type	</label>
         {!! Form::text('blood_type' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="many_bages">many_bages</label>
         {!! Form::text('many_bages' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="hospital_name">hospital_name</label>
         {!! Form::text('hospital_name' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="hospital_addres">hospital_addres</label>
         {!! Form::text('hospital_addres' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="phone">phone</label>
         {!! Form::text('phone' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="notes">notes</label>
         {!! Form::text('notes' ,null,[
           'class' => 'form-control'
         ]) !!}
        </div>
        <div class="form-group">
         <label for="city_id">City</label>
         {!! Form::select('city_id' , $city->pluck('name' , 'id')->toArray() , null, [
          'class' => 'form-control'

        ])!!}
        </div>
        <div class="form-group">
         <label for="client">Client</label>
         {!! Form::select('client_id' , $client->pluck('name' , 'id')->toArray() , null, [
          'class' => 'form-control'

        ])!!}
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


