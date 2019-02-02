@extends('layouts.app')

@inject('model' , 'App\Setting')


@section('page_title')
 Settings
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of Setting</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <a href = "{{url(route('settings.create'))}}" class="btn btn-primary"><i class= "fa fa-plus"></i>New Settings</a>
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
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Email
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">About
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">PHone
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Facebook
                </th><th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Twiter
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Instgram
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Edit
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
                  <td>{{$recorde->email}}</td>
                  <td>{{$recorde->about}}</td>
                  <td>{{$recorde->phone}}</td>
                  <td>{{$recorde->facebook}}</td>
                  <td>{{$recorde->twiter}}</td>
                  <td>{{$recorde->instgram}}</td>


                  <td class="text-center"><a href = "{{url(route('settings.edit' , $recorde->id))}}"  class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                  <td class="text-center"> 
                  {!! Form::open([
                     
                     "action" => ['SettingsController@destroy' , $recorde->id],
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


