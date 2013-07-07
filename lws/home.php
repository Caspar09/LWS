<!DOCTYPE html>
<?php

session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:lmana/login.html");
    exit();
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Learning Workflow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Supported by toyhouse China">
    <meta name="author" content="LMANA">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
   
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>          </a>
          <a class="brand" href="#">Koo's Town</a>
          <!--/.nav-collapse -->
</div>
      </div>
    </div>
    <div class="row-fluid-left">
       <div class="span3">
         <div class="well sidebar-nav">
           <ul class="nav nav-list">
             <li class="nav-header">
               <div class="nav-collapse collapse">
                 <ul class="nav">
                   <li class="home.php"><a href="../lws/home.php">Home</a></li>
                 </ul>
               </div>
			 <li class="nav-header">Resources</li>
             <li><a href="../LWS/lmana/AddRes.html" target="iframe_a">Add resource</a></li>
			 			 <li><a href="../LWS/lmana/show_all.php" target="iframe_a">Show all resources</a></li>
             <li><a href="../LWS/lmana/Gold.php" target="iframe_a">Gold</a></li>
             <li><a href="../LWS/lmana/Experience.php" target="iframe_a">Experience</a></li>
             <li><a href="../LWS/lmana/LP.php" target="iframe_a">Learning Point</a></li>
            
       <li class="nav-header">Calendar</li>  
       			 <li><a href="../LWS/lmana/Addtodo.html" target="iframe_a">Add Task</a></li>    
       			 <li><a href="../LWS/lmana/Todolist.php" target="iframe_a">Show Task</a></li> 
       			  <li><a href="../LWS/lmana/deletetask.php" target="iframe_a">Delete Task</a></li>              
       <li class="nav-header"><a href="../LWS/lmana/logout.php">Logout</a></li>
        <li class="nav-header"> <a href="../LWS/lmana/Goldshop.php"  target="iframe_a" class="btn btn-large btn-primary">Gold shop</a></li>
                  <br></br>
    </ul>
         </div><!--/.well -->
       </div><!--/span-->
     </div>
     <div class="row-fluid-right">
       <div class="span3">
         <div class="well sidebar-nav">
           <ul class="nav nav-list">
             <li class="nav-header">Toyhouse</li>
             <li><a href="#">Q&A</a></li>
             <li><a href="#">MEM</a></li>
             <li class="active"><a href="home.php">GGU</a></li>
             <li><a href="#">Wiki</a></li>
             <li><a href="#">SNS</a></li>
           </ul>
         </div><!--/.well -->
       </div><!--/span-->
    </div>
	
    <div class="container-middle">
      <iframe src="../LWS/lmana/show_all.php" frameborder="0" name="iframe_a" height = "1000px" width = "750px"> >
      	</iframe>

    </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
