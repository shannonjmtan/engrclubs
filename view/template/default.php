<!DOCTYPE html>

<html>
  <head>
    <title>Student Organizations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/todc-bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  </head>
  
  
<style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .sidebar-nav {
          padding: 9px 0;
    }

    .center {
        text-align: center;
    }

    .hero-unit {
        background-color: #0073CF;
        color: #FFB300;
    }

    .hero-unit > p {
        padding-top: 5px;
        color: white;
    }
</style>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="#">Student Orgs</a>
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
    <?php echo $CONTENT; ?>
      
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
  
</html> 