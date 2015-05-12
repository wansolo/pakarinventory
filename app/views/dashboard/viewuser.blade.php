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
                           Current Users 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <th class="bold"> Full Name</th>
                  
                                      <th class="bold">Username</th>
                                       <th class="bold">Access Level</th>
                                       <th class="bold">Status</th>
                                    </thead>
                                    <tbody>
                                      
                                      @foreach($users as $underlist_item)
                                        <tr>
                                        
                                        <td >{{$underlist_item->first_name}} {{""}} {{$underlist_item->last_name}}</td>
                                        <td >{{$underlist_item->username}}</td>
                                       
                                        <td >@if($underlist_item->type == 'admin')
                                              Super User
                                            @else
                                              Normal User / Limited Access
                                            @endif 
                                        </td>
                                        <td >@if($underlist_item->flag == 1)
                                              Active Account
                                            @else
                                              <a href="/dashboard/activate/{{$underlist_item->uid}}" class="btn btn-large btn-warning ">Activate Account</a>
                                            @endif 
                                        </td>
                                       
                                        </tr>
                                      @endforeach
                                      
                                    </tbody>
                                        
  
                                            
                                    
                                    
                                </table>
                            </div>
                           

                        </div>
  	

@stop











