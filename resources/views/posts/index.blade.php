@extends('layouts.app')

@inject('model' , 'App\Post')
@inject('category' , 'App\Category')





@section('page_title')
 posts
@endsection


@section('content')



    <!-- Main content -->
    <section class="content">
  <!-- clients -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of posts</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <a href = "{{url(route('posts.create'))}}" class="btn btn-primary"><i class= "fa fa-plus"></i>New Posts</a>
        <br>
        @include('flash::message')
       @if(count($recordes))

       
<div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"> #
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">title
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> image
                </th>
                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> content
                </th>
                <th class="sorting  text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> description
                </th>
                <th class="sorting  text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> category_id
                </th> <th class="sorting  text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Edit
                </th>
                <th class="sorting  text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Delete
                </th>
               
                </thead>
            <tbody>          
            @foreach($recordes as  $recorde)    

            <tr role="row" class="odd">
                
                  <td class="sorting_1">{{$loop->iteration}}</td>
                  <td class="sorting text-center">{{$recorde->title}}</td>
                  <td>
                     <img src="{{asset('/uploads/' . $recorde->thumbnail)}}" style="width:200px; height:100px">
                  </td>
                  <td class="sorting text-center">{{$recorde->content}}</td>
                  <td class="sorting text-center">{{$recorde->description}}</td>
                  <td class="text-center">{{optional($recorde->category)->name}}</td>
                  
                  


                
                  

                  <td class="text-center"><a href = "{{url(route('posts.edit' , $recorde->id))}}"  class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                  <td class="text-center"> 
                  {!! Form::open([
                     
                     "action" => ['PostController@destroy' , $recorde->id],
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


