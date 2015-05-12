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
                           Current Item List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <th class="bold">Item Name</th>
                  
                                      <th class="bold">Item Category</th>
                                       <th class="bold">Total Quantity</th>
                                        <th class="bold">Type</th>
                                       <th class="bold">Date Of Creation</th>
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($categorydetail as $underlist_item)
                                        <tr>
                                        
                                        <td >{{$underlist_item->item_name}}</td>
                                        <td >{{$underlist_item->category->category_name}}</td>
                                        <td >@if($underlist_item->consumable == 'Yes')
                                             {{$underlist_item->stock->current_quantity}}{{" "}} {{$underlist_item->stock->unit}}
                                            @else
                                             {{$underlist_item->stock->base_quantity}}{{" "}} {{$underlist_item->stock->unit}}
                                            @endif 
                                        </td>
                                        
                                        <td >@if($underlist_item->consumable == 'Yes')
                                              Consumable
                                            @else
                                              Non-Consumable
                                            @endif 
                                        </td>
                                      
                                        <td>{{$underlist_item->created_at}}</td> 
                                        </tr>
                                      @endforeach
                                      
                                    </tbody>
                                        
  
                                            
                                    
                                    
                                </table>
                            </div>
                           

                        </div>
  	

@stop











