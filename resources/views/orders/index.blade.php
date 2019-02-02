@extends('layouts.app')

@inject('model' , 'App\Order')
@inject('client' , 'App\Client')
@inject('city' , 'App\City')




@section('page_title')
 orders
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of orders</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <a href = "{{url(route('orders.create'))}}" class="btn btn-primary"><i class= "fa fa-plus"></i>New Orders</a>
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
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Age
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> blood_type
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> many_bages
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> hospital_name
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> hospital_addres
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> phone
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> notes
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> longitude
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> latitude
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> City
                </th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Client
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
                  <td class="sorting text-center">{{$recorde->name}}</td>
                  <td class="sorting text-center">{{$recorde->age}}</td>
                  <td class="sorting text-center">{{$recorde->blood_type}}</td>
                  <td class="sorting text-center">{{$recorde->many_bages}}</td>
                  <td class="sorting text-center">{{$recorde->hospital_name}}</td>
                  <td class="sorting text-center">{{$recorde->hospital_addres}}</td>
                  <td class="sorting text-center">{{$recorde->phone}}</td> 
                  <td class="sorting text-center">{{$recorde->notes}}</td>
                  <td class="sorting text-center">{{$recorde->longitude}}</td>
                  <td class="sorting text-center">{{$recorde->latitude}}</td>
                  <td class="sorting text-center">{{optional($recorde->city)->name}}</td>
                  <td class="sorting text-center">{{optional($recorde->client)->name}}</td>                  


                  <td class="text-center"><a href = "{{url(route('orders.edit' , $recorde->id))}}"  class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                  <td class="text-center"> 
                  {!! Form::open([
                     
                     "action" => ['OrderController@destroy' , $recorde->id],
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


