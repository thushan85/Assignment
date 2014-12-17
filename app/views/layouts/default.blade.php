<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Hotel System - Laravel PHP</title>
        
        <link rel="stylesheet" href="assets/css/ui/smoothness/jquery-ui-1.10.4.custom.min.css"/>
        <!-- Bootstrap Core CSS -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="assets/css/layout.css" rel="stylesheet">
        
        <link href="assets/bootstrap/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        
    </head>

    <body>
    
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Hotel System - Laravel PHP</a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/search">Search</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
        
    </body>
</html>
