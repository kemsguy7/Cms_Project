

<?php 
include("includes/DB.php"); ?>
<?php include("includes/Sessions.php"); ?>
<?php include("includes/functions.php"); ?>
<?php Confirm_Login(); ?>
<?php 
if(isset ($_POST['submit'])) {
    $Category= trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['Category'])));
    $CurrentTime=time();
// Mysql syntax $DateTime=strftime("%Y-%m-%d %H:%M%S", $CurrentTime);

$DateTime=strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
$DateTime;
$Admin=$_SESSION["username"];


if(empty($Category)) {
        $_SESSION["ErrorMessage"]="All Fields must be filled out";
       Redirect_to("Dashboard.php");

 }elseif(strlen($Category>99)){
     $_SESSION["ErrorMessage"]="Too long Name for Category";
     Redirect_to("Categories.php");

 }else{
   global $conn;
   try {
        $sql = "INSERT INTO category(date_time, category_name,creatorname) VALUES ('$DateTime', '$Category','$Admin')";
        if ($r = mysqli_query($conn, $sql)) {
            $_SESSION["SuccessMessage"]="Category Addded Succesfully";
            Redirect_to("Categories.php");
        }
        else {
            $_SESSION["ErrorMessage"]="Category Failed to Add";
            Redirect_to("Categories.php");
        }
   }    
   catch (Exception $e) {
        echo $e;
   }
    
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

<style>
     .FieldInfo{
         color:rgb(251, 174, 44); 
        font-family: Bitter, Gerogia, "Times New Roman", Times, serif;
        font-size: 1.2em;
        }
</style>


    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-sm-2">
                <h1> Matthew</h1>
                    <ul id="Side_Menu" class="nav-pills nav-stacked">
                         <li class="active"><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
                        <li><a href="AddnewPost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add new post</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-th"></span>&nbsp;Add New User</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                    </ul>
            </div>
        <!--End of col-sm-2-->  
        <!--Beginning of col-sm-10-->
            <div class="col-sm-10 pr-2" id="white">
                <h1>Manage Categories</h1>
                <?php echo message(); 
                echo SuccessMessage();
                ?>
                <form action="Categories.php" method="POST">
                    <fieldset>
                        <div class="form-group">
                        <label for="categoryname"><span class ="FieldInfo"> Name:</span></label>
                        <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name">
                        </div>
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="submit" value="Add New Category">
                    </fieldset>
                    <br>
                </form>
                </div>
                
                <div class="table-responsive"><!-- Display categories table-->
                      <table class="table">
                      <!--<table class="table table-hover table-striped"> -->
                          <tr> 
                               <th>Sr No.</th>
                               <th>Date & Time</th>
                               <th>Category Name</th>
                               <th>Creator Name</th>
                               <th>Action</th>
                          </tr>      
    <?php 
    global $conn;
    $ViewQuery="SELECT * FROM category ORDER BY date_time desc";
    $Execute=mysqli_query($conn, $ViewQuery);
    $SrNo=0; //Initializes the new post id to 1
     while($DataRows=mysqli_fetch_array($Execute)){
          $id=$DataRows["id"];
          $DateTime=$DataRows["date_time"];
          $CategoryName=$DataRows["category_name"];
          $Creatorname=$DataRows["creatorname"];
          $SrNo++;//Increments the post id 

    ?>
    <tr>
    <!--This table displays the record-->
         <td><?php echo $SrNo; ?></td>
         <td><?php echo $DateTime; ?></td>
         <td><?php echo $CategoryName; ?></td>
         <td><?php echo $Creatorname; ?></td>
         <td><a href="DeleteCategory.php?id=<?php echo $id; ?>">
        <span class="btn btn-danger">Delete </span>
         </a></td>
    </tr>
    <?php }?>
                      </table>
                </div>

            </div>
        </div>
        <script>
        </script>
    </body>
</html>