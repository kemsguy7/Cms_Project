<?php require_once("includes/Sessions.php"); ?>
<?php require_once("includes/functions.php"); ?>
<html>
    <head>
<title> Admin Dashboard</title>
<script src="jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet"  href="adminstyles.css">
<script src="bootstrap.min.js"></script>




    </head>
    <body>
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
            <div class="col-sm-10" id="white">
                
                <h1>Admin Dashboard</h1>

                <div> <?php echo message(); 
                echo SuccessMessage();
                ?></div>
                <p> I am Matthew Idungafa a passionate tech enthuiast, lover of gym and Music.</p>
                <h1>About</h1>
                <p> I am Matthew Idungafa a passionate tech enthuiast, lover of gym and Music.</p>

                <h1>About</h1>
                <p> I am Matthew Idungafa a passionate tech enthuiast, lover of gym and Music.</p>
                <h1>About</h1>
                <p> I am Matthew Idungafa a passionate tech enthuiast, lover of gym and Music.</p>
                </div>
            </div>
        </div>
        <script>
        </script>
    </body>
</html>