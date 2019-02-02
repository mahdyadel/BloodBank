@extends('layouts.app')
@inject('model' , App\Government)

@section('page_title')
 Create Governments
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create of Government</h3>

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
         'action' => 'GovernmentController@store'
        ]) !!}

        @include('vlaidate.validationErrors')

        @include('Governments.form')
        
        {!! Form::close() !!}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->  


@endsection


