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
      
      <div class="col-md-6 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <h3>Edit Stock Item</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
   

    {{Form::open(array('url' => 'dashboard/updatetostockinfo', 'method' => 'post'))}}
     
      
      
     <div class="form-group ">
        {{form::label('item_name', 'Current Item Name')}}
        {{form::text('item_name', $stockdetail->item->item_name,array('class'=> 'form-control'))}}
        {{form::hidden('id', $stockdetail->stock_id, array('class'=> 'form-control'))}}
         {{form::hidden('item_id', $stockdetail->item->item_id, array('class'=> 'form-control'))}}
        
      </div>
      <div class="form-group {{$errors->has('base_quantity')?'has-error':''}}">
        {{form::label('base_quantity', 'Current Item Base Quantity')}}
        {{form::text('base_quantity', $stockdetail->base_quantity, array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('base_quantity')}}</span>
      </div>
      <div class="form-group {{$errors->has('new_quantity')?'has-error':''}}">
        {{form::label('new_quantity', 'New Item Base Quantity')}}
        {{form::text('new_quantity', '', array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('new_quantity')}}</span>
      </div>
      <div class="form-group {{$errors->has('unit')?'has-error':''}}">
        {{form::label('unit', 'Current Item Unit Of Measure')}}
        {{form::text('unit', $stockdetail->unit, array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('unit')}}</span>
      </div>
      
    {{Form::submit('Update Stock', array('class' => 'btn btn-primary pull-right'))}}
    {{Form::close()}}
                            <!-- /.table-responsive -->
                        </div>
    

@stop











