<!Doctype html>
<html>
	<head>
		<title>Pakar Lab Inventory</title>
		@include('includes.jqueryandbootstrap')
	</head>
	<body>
		
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="letter-spacing:5px">Pakar Lab Inventory</a>
                	
                 </div>

                 
                 <ul class="nav pull-right top-nav" >
                 	<li class="dropdown">
                 		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome: @yield('headerusername')</i><b class="caret"></b></a>
                 		<ul class="dropdown-menu">
                 			<li class="divider"></li>
                 			<li><a href="{{ URL::to('logout') }}"><i class="fa fa-fw fa-power-off"></i>Log Out</a></li>
                 		</ul>
                 	</li>
                	
                </ul>
            <!-- /.navbar-header -->

            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        
                        <li>
                            <a href="{{URL::to('dashboard/')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> View Stock<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/viewstock')}}">Current Stock</a>
                                </li>
                                 <li>
                                    <a href="{{URL::to('dashboard/viewitem')}}">Current Items</a>
                                </li>
                                 <li>
                                    <a href="{{URL::to('dashboard/viewlog')}}">Current Log</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Add To Stock<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="{{URL::to('dashboard/updatestock')}}">Update Stock Item</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('dashboard/addstock')}}">Add To Stock</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('dashboard/addcategory')}}">Add To Item Category</a>
                                </li>
                                

                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Take Out<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/addoutflow')}}">Register Take Out</a>
                                </li>
                               

                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Edit Stock<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/editstock')}}">Display Stock</a>
                                </li>
                               

                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if(Auth::user()->type == "admin")
                        <li>
                            <a href="{{URL::to('dashboard/viewuser')}}"><i class="fa fa-fw"></i> View User Account<span class="fa arrow"></span></a>
                        </li>
                        @endif
                        
                        
                        <li>
                            <a href="{{URL::to('dashboard/viewpayment')}}"><i class="fa fa-fw"></i> View Payments<span class="fa arrow"></span></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            
            @yield('content')
  
           
        </div>
  
    </div>
  
  


	</body>
</html>