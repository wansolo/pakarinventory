@extends('masterlayouts.dashboardmaster')
@section('headerusername')
	 {{ Auth::user()->username }}
@stop
@section('content')
	   @if (Session::has('flash_notice'))
		<div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      
  	
        
  		<div class="col-lg-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Current Stock
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <th class="bold">Item Name</th>
                                      <th class="bold danger">Current Quantity</th>
                                      <th class="bold success">Base Quantity</th>
                                      
                                      <th class="bold danger">Item Type</th>
                                       <th class="bold">Date Of Creation</th>
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($stockdetail as $underlist_item)
                                        <tr>
                                        <td >{{$underlist_item->item->item_name}}</td>

                                        <td >{{$underlist_item->current_quantity}} {{ " "}} {{$underlist_item->unit}}</td>
                                        
                                        <td >@if($underlist_item->item->consumable == 'Yes')
                                              Its Consumable
                                            @else
                                             {{$underlist_item->base_quantity}}{{" "}} {{$underlist_item->unit}}
                                            @endif 
                                        </td>
                                        
                                       
                                        <td >@if($underlist_item->item->consumable == 'Yes')
                                              Consumable
                                            @else
                                              Non-Consumable
                                            @endif 
                                        </td>
                                        <td>{{$underlist_item->created_at}}</td> 
                                        </tr>
                                      @endforeach
                                    </tbody>
                                        
  
                                            
                                    {{$stockdetail->links()}}
                                    
                                </table>
                            </div>
                           

                        </div>
  	

@stop











