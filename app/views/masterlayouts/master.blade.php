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

                 
        </nav>

        
    </div>
    <div class="container-fluid">
          
            @yield('content')
  
           
    </div>
  
  
		
		
	</body>
</html>