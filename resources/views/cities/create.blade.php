@extends('layouts.app')
@inject('model' , App\City)
<!-- @inject('model' , App\Government) -->

@section('page_title')
 Create cities
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create of City</h3>

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
         'action' => 'CityController@store'
        ]) !!}
      
        @include('vlaidate.validationErrors')
        <div class="form-group">
         <label for="name">Name</label>
         {!! Form::text('name' ,null,[
           'class' => 'form-control'
           ]) !!}
        </div>
        {!! Form::select('government_id' , $governments , [
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


