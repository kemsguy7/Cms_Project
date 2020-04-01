<?php include("includes/DB.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php require_once("includes/functions.php"); ?>
<html>
    <head>
<title> Admin Dashboard</title>

<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="adminstyles.css">

<style> 
body{
    background-color:white;
}
</style>
    </head>
    <body>
         
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="logo3.jpg" style="width:100%;  height:100%;"> </img></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="Dashboard.html">Admin Dashboard</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="sign-in.html">Sign in</a></li>
                    <li><a href="forum.html">Forum</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Logout</a></li> 
                    <li> <form style="padding-top: 10px;" class="form-inline" type="text" placeholder="Search" aria-label="Search" > 
                    <input class="form-control mr-sm-2" type="text" name="Search" placeholder="Search" aria-label="Search anything..">
                    <button class="btn btn-inline btn-secondary btn-success"  name="Searchbutton" type="submit">Go</button>
                    </form> </li>
                </ul>
                </div>
                </div>
            </nav>
       <br>
        <div class="Line" style="height: 10px; background: #27aae1;"> 
    </div>

            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-2">
                    <h1> Matthew</h1>
                        <ul id="Side_Menu" class="nav-pills nav-stacked">
                            <li class="active"><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add new post</a></li>
                            <li><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-th"></span>&nbsp;Add New User</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                        </ul>
                </div> <!--End of col-sm-2-->  
                <div class="col-sm-10" id="white">  <!--Main Area-->  
                <div> <?php echo message(); 
                    echo SuccessMessage();
                    ?></div>
                    <h1> Manage Comments</h1>
                </div>
                
                   </div>
            <script src="jquery-3.4.1.min.js"></script>
            <script src="bootstrap.min.js"></script>   
    </body>
</html>