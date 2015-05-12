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
                            Personal Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
                                        
                                        <tr>
                                            <td class="bold">First Name</td>
                                            <td>{{ Auth::user()->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Last Name</td>
                                            <td>{{ Auth::user()->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Gender</td>
                                            <td>{{ Auth::user()->gender}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="bold">E-mail</td>
                                            <td>{{ Auth::user()->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Joined Since</td>
                                            <td>{{ Auth::user()->created_at}}</td>
                                        </tr>
                                            
                                    
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











