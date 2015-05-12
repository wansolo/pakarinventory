@extends('masterlayouts.dashboardmaster')
@section('headerusername')
   {{ Auth::user()->username }}
@stop
@section('content')
     @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif

      @if (Session::has('message'))
    <div class="alert alert-info">{{Session::get('message')}}</div>
      @endif
      <div class="col-md-6">
                          <div class="panel panel-info">
                        <div class="panel-heading">
                           <h4>Current Category</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <th class="bold">Category Name</th>
                  
                                      
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($category as $underlist_item)
                                        <tr>
                                        
                                        <td >{{$underlist_item->category_name}}</td>
                                      
                                  
                                        </tr>
                                      @endforeach
                                      
                                    </tbody>
                          
                                </table>
                            </div>
                           

                        </div>
                        </div>
                        </div>
    
      <div class="col-md-6 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <h4>Create New Item Category</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
   

    {{Form::open(array('url' => 'dashboard/addtocategory', 'method' => 'post'))}}
     
      
      
      <div class="form-group {{$errors->has('category_name')?'has-error':''}}">
        {{form::label('category_name', 'Category Name')}}
        {{form::text('category_name', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('category_name')}}</span>
      </div>
      
      
    {{Form::submit('Add To Category', array('class' => 'btn btn-primary pull-right'))}}
    {{Form::close()}}
                            <!-- /.table-responsive -->
                        </div>
                        </div>
                        </div>
                        

@stop











