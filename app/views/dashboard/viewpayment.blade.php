@extends('masterlayouts.dashboardmaster')
@section('headerusername')
	 {{ Auth::user()->username }}
@stop
@section('content')
	   @if (Session::has('flash_notice'))
		<div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      
  	
        
  		<div class="col-lg-12 col-md-12">
                   <div class="panel panel-default" style="margin-top:10px;">

                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                           <center><h4>Select Payment Mode And Range</h4></center>
                        </div>
                        <center>
                          <div class="form-inline col-md-8 " onchange="check()" style="margin-top:10px;">
                          <select class="form-control form-inline" id="mySelect">
                            <option value=" ">Select Mode</option>
                            <option value="1">Impress</option>
                            <option value="2">By Order</option>
                          </select>
                          
                          <label>From:</label>
                           <input class="form-control form-inline" type="date" id="from" />
                           <label>To:</label>
                            <input class="form-control form-inline" type="date" id="to" />


      
                        </div>
                        </center>

                        

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <div class="col-lg-12" id="search-results">

                            </div>
                   
                        </div>
    

    
                  </div>

      </div>
  	

@stop











