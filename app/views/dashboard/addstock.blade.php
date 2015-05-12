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
                           <h4>Add Item to Stock</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
   

    {{Form::open(array('url' => 'dashboard/addtostock', 'method' => 'post'))}}
     
      
      <div class="form-group ">
        {{form::label('category_id', 'Select Category Name')}}
        {{form::select('cat_id', $items, '',array('class'=> 'form-control'))}}
        
      </div>
      <div class="form-group {{$errors->has('item_name')?'has-error':''}}">
        {{form::label('item_name', 'Enter Name Of Item')}}
        {{form::text('item_name', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('current_quantity')}}</span>
      </div>
      <div class="form-group {{$errors->has('current_quantity')?'has-error':''}}">
        {{form::label('current_quantity', 'Enter Quantity')}}
        {{form::text('current_quantity', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('current_quantity')}}</span>
      </div>
      
      <div class="form-group {{$errors->has('unit')?'has-error':''}}">
        {{form::label('unit', 'Specify Unit Of Measure')}}
        {{form::text('unit', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('unit')}}</span>
      </div>
      <div>
        {{form::label('comsumable', 'Consumeble: ')}}
        {{form::label('comsumable', 'Yes')}}
        {{form::radio('comsumable', 'Yes')}}
        {{form::label('comsumable', 'No')}}
        {{form::radio('comsumable', 'No',true)}}
      </div>
      <div class="form-group ">
        {{form::label('pid', 'Select Payment Option')}}
        {{form::select('pid', $payments, '',array('class'=> 'form-control'))}}
        
      </div>
      <div class="form-group {{$errors->has('amount')?'has-error':''}}">
        {{form::label('amount', 'Enter Cost Of item')}}
        {{form::text('amount', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('amount')}}</span>
      </div>

      <div class="form-group">

         <input class="form-control" type="date" name="doa" />

      </div>

       
      
    {{Form::submit('Add To Stock', array('class' => 'btn btn-primary pull-right'))}}
    {{Form::close()}}
                            <!-- /.table-responsive -->
                        </div>
    

@stop











