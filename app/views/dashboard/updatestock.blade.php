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
      
      <div class="col-md-6 col-md-offset-2" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <h4>Update Item In Stock</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
   

    {{Form::open(array('url' => 'dashboard/updatetostock', 'method' => 'post'))}}
     
      
      
     <div class="form-group ">
        {{form::label('item_id', 'Select Item')}}
        {{form::select('item_id', $item, '',array('class'=> 'form-control'))}}
        
      </div>
      <div class="form-group {{$errors->has('current_quantity')?'has-error':''}}">
        {{form::label('current_quantity', 'Enter Quantity To Update Item')}}
        {{form::text('current_quantity', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('current_quantity')}}</span>
      </div>
      
    {{Form::submit('Update Stock', array('class' => 'btn btn-primary pull-right'))}}
    {{Form::close()}}
                            <!-- /.table-responsive -->
                        </div>
    

@stop











