@extends('layouts.app')

@inject('model' , 'App\Client')
@inject('cities' , 'App\City')
@inject('blood_type' , 'App\Blood_type')



@section('page_title')
 Clients
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of Client</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <a href = "{{url(route('clients.create'))}}" class="btn btn-primary"><i class= "fa fa-plus"></i>New Clients</a>
        <br>
        @include('flash::message')
       @if(count($recordes))

       
<div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"> #
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Password
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">PHone
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">BloodType
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">City
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">LastDate
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Birthdate
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Edite
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Delete
                </th>
                </tr>
                </thead>
            <tbody>          
            @foreach($recordes as  $recorde)    

            <tr role="row" class="odd">
                
                  <td class="sorting_1">{{$loop->iteration}}</td>
                  <td>{{$recorde->name}}</td>
                  <td>{{$recorde->password}}</td>
                  <td>{{$recorde->phone}}</td>
                  <td>{{$recorde->email}}</td>
                  <td>{{optional($recorde->blood_type)->name}}</td>
                  <td>{{optional($recorde->city)->name}}</td>
                  <td>{{$recorde->last_date}}</td>
                  <td>{{$recorde->birthday}}</td>


                  <td class="text-center"><a href = "{{url(route('clients.edit' , $recorde->id))}}"  class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                  <td class="text-center"> 
                  {!! Form::open([
                     
                     "action" => ['ClientController@destroy' , $recorde->id],
                     'method' => 'delete'
                     ])!!}
                     <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i>
                     </button>

                  
                  {!! Form::close() !!}
                  </td>
                 
                </tr> 
                @endforeach
              </table></div>
        </div>
      
      @else
      <div class="alert alert-dengar" role="alert">
                No Data
        </div>
      @endif
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->  


@endsection


