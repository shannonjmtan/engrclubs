<!DOCTYPE html>

<html>
  <head>
    <title>Student Organizations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/todc-bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    
<style type="text/css">
    body {
        min-width: 500px;
        font-family: "Courier New", Courier, monospace;
    }
    
    .content {
        padding-top: 11%;
        padding-bottom: 11%;
        min-width: 500px;
    }
    
    .btn {
        font-family: "Courier New", Courier, monospace; 
    }
    
    .navbar-inner {
        height: 100px;
    }
    
    /* menu items */

    /* set the background of the menu items to pink and default color to white */

    /*.navbar .nav > li > a {
        font-size: 20px;
    }*/
    
    .nav-collapse .nav>li>a {
        color: #0073CF;
    }
    
    .navbar .nav {
        padding-top: 3%;
        padding-right: 0px;
        font-size: 1.5em;
    }

    .navbar .brand {
        
        padding-top: 3%;
        padding-right: 5%;
        padding-bottom: 3%;
        padding-left: 4%;
        font-size: 30px;
        max-width: 40%;
        line-height: 100%;
        height: 100%;
        
        color: #0073CF;
    }
    
    .navbar .btn-navbar {
        margin-top: 5%;
        margin-bottom: 5%;
    }
    
    .navbar .btn-navbar .icon-bar {
        background-color: #000;
    }

    .center {
        text-align: center;
    }
    
    @media (max-width: 979px) { 
        .nav-collapse .nav>li>a {
            padding-top: 1%;
            background-color: #0073CF;
            color: white;
        }
        
        .navbar .nav {
            padding-top: 0px;
        }
        
        .content {
            padding-top: 1%;
        }
        
        .navbar .nav > li > a:focus,
        .navbar .nav > li > a:hover {
            background-color: #FFB300;
            color: white;
        }
    }
    
    @media (max-width: 881px) {
        .content {
            padding-top: 1%;
        }
    }
    
</style>
</head>
 
    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
              <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?php echo URL::mvc('home', 'home'); ?>">Engineering Organizations</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                      <li><a href="<?php echo URL::mvc('home', 'home'); ?>">Home</a></li>
                      <li><a href="<?php echo URL::mvc('home', 'about'); ?>">About</a></li>
                      <li><a href="<?php echo URL::mvc('club', 'club_list'); ?>">List of Groups</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  

  <body>
      <div class="container-fluid content">
            <?php echo $CONTENT; ?>
      </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
  
    <div class="footer center">
        Club on!
    </div>
  
</html> 