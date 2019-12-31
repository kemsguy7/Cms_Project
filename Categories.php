<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(isset ($_POST['submit'])) {
    $Category=($_POST["Category"]);
    $CurrentTime=time();
// Mysql syntax $DateTime=strftime("%Y-%m-%d %H:%M%S", $CurrentTime);

$DateTime=strftime("%B-%d-%y %H:%M:%S", $CurrentTime);
$DateTime;
$Admin="Matthew Idungafa";
crea
if(empty($Category)) {
        $_SESSION["ErrorMessage"]="All Fields must be filled out";
       Redirect_to("Dashboard.php");

 }elseif(strlen($Category>99)){
     $_SESSION["ErrorMessage"]="Too long Name for Category";
     Redirect_to("Categories.php");

 }else{
   
    $sql = "INSERT INTO category(datetime,name,creatorname)VALUES($Datetime,$Category,'$Admin')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION["SuccessMessage"]="Category Addded Succesfully";
        Redirect_to("Categories.php");
    } else {
        $_SESSION["ErrorMessage"]="Category Failed to Add";
        Redirect_to("Categories.php");
    }
    
    mysqli_close($conn);
 }
}




?>
<html>
    <head>
<title> Blog Categories</title>
<script src="jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet"  href="adminstyles.css">
<script src="bootstrap.min.js"></script>




    </head>
    <body>
        <div class="container-fluid">
            <div class="row">


            <div class="col- sm-2">
                <h1> Matthew</h1>
                    <ul id="Side_Menu" class="nav-pills nav-stacked">
                        <li class="active"><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add new post</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-th"></span>&nbsp;Add New User</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                    </ul>

            </div> <!--End of col-sm-2-->  
            <div class="col-sm-10" id="white">
                <h1>Manage Categories</h1>
                <?php echo message(); 
                echo SuccessMessage();
                ?>
                <form action="Categories.php" method="POST">
                    <fieldset>
                        <div class="form-group"
                        <label for="categoryname">Name:</label>
                        <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name">
                        </div>
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="submit" value="Add New Category">
                    </fieldset>
                    <br>
                </form>
                </div>
                
            </div>
        </div>
        <script>
        </script>
    </body>
</html>