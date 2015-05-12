@extends('masterlayouts.dashboardmaster')
@section('headerusername')
	 {{ Auth::user()->username }}
@stop
@section('content')
	   @if (Session::has('flash_notice'))
		<div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      
  	
        
  		<div class="col-lg-12 col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Current Sysytem Log
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <th class="bold">User Name</th>
                  
                                      <th class="bold">Item Name</th>
                                       <th class="bold">Item Quantity</th>
                                        <th class="bold">Operation Performed</th>
                                       <th class="bold">Date Of Operation</th>
                                       <th class="bold">Purpose</th>
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($logdetail as $underlist_item)
                                        <tr>
                                        <td >{{$underlist_item->user->first_name}} {{""}} {{$underlist_item->user->last_name}}</td>
                                        <td >{{$underlist_item->stock->item->item_name}}</td>
                                        <td >{{$underlist_item->quantity}}</td>
                                        <td >{{$underlist_item->operation_type}}</td>
                                    
                                        <td>{{$underlist_item->created_at}}</td> 
                                        <td>{{$underlist_item->purpose}}</td> 
                                        </tr>
                                      @endforeach
                                    </tbody>
                                        
                              {{$logdetail->links()}}
                                            
                                    
                                    
                                </table>
                            </div>
                           

                        </div>
  	

@stop











