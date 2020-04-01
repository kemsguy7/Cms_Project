

<?php 
include("includes/DB.php"); ?>
<?php include("includes/Sessions.php"); ?>
<?php include("includes/functions.php"); ?>
<?php 
if(isset ($_POST['submit'])) {
    $Username=trim(mysqli_real_escape_string($conn, $_POST['username']));
    $Password= trim(mysqli_real_escape_string($conn, $_POST['Password']));

    $CurrentTime=time();
// Mysql syntax $DateTime=strftime("%Y-%m-%d %H:%M%S", $CurrentTime);

$DateTime=strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
$DateTime;
$Admin=$_SESSION["username"];;


if(empty($Username) || empty($Password)) {
        $_SESSION["ErrorMessage"]="All Fields must be filled out";
       Redirect_to("Admin.php");

 }elseif(strlen($Password)<4){
     $_SESSION["ErrorMessage"]="Password must be at least four characters";
     Redirect_to("Admin.php");
          
/*}elseif($Password!==$ConfirmPassword){
        $_SESSION["ErrorMessage"]="Password /Confirm Passsword does not match";
        Redirect_to("Admin.php");*/

 }else{
   global $conn;
        $sql ="INSERT INTO registration(date_time, username,conpassword,addedby) VALUES ('$DateTime','$Username','$Password','$Admin')";
        $Execute=mysqli_query($conn, $sql);
         if ($Execute) {
            $_SESSION["SuccessMessage"]="Admin Addded Succesfully";
            Redirect_to("Admin.php");
        }
        else {
            $_SESSION["ErrorMessage"]="Admin Failed to Add";
            Redirect_to("Admin.php");
        }
   }    
  
    
 }





?>
<html>
    <head>
<title> Manage Admins</title>
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
                <h1> Manage Admin Access</h1>
                    <ul id="Side_Menu" class="nav-pills nav-stacked">
                         <li ><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
                        <li><a href="AddnewPost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add new post</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-th"></span>&nbsp;Add New User</a></li>
                        <li class="active"><a href="Admin.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                    </ul>
            </div>
        <!--End of col-sm-2-->  
        <!--Beginning of col-sm-10-->
            <div class="col-sm-10 pr-2" id="white">
                <h1>Manage Admins</h1>
                <?php echo message(); 
                echo SuccessMessage();
                ?>
                <form action="Admin.php" method="POST">
                    <fieldset>
                        <div class="form-group">
                        <label for="username"><span class ="FieldInfo"> UserName:</span></label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                        <label for="categoryname"><span class ="FieldInfo"> Password</span></label>
                        <input class="form-control" type="password" name="Password" id=" Password" placeholder=" Password">
                        </div>
                        <div class="form-group">
                        <label for="categoryname"><span class ="FieldInfo"> Confirm Password:</span></label>
                        <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Retype Password">
                        </div>
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="submit" value="Add New Admin">
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
                               <th>Admin Name</th>
                               <th>Added By</th>
                               <th>Action</th>
                          </tr>      
    <?php 
    global $conn;
    $ViewQuery="SELECT * FROM registration ORDER BY date_time desc";
    $Execute=mysqli_query($conn, $ViewQuery);
    $SrNo=0; //Initializes the new post id to 1
     while($DataRows=mysqli_fetch_array($Execute)){
          $id=$DataRows["id"];
          $DateTime=$DataRows["date_time"];
          $Username=$DataRows["username"];
          $Admin=$DataRows["addedby"];
          $SrNo++;//Increments the post id 

    ?>
    <tr>
    <!--This table displays the record-->
         <td><?php echo $SrNo; ?></td>
         <td><?php echo $DateTime; ?></td>
         <td><?php echo $Username; ?></td>
         <td><?php echo $Admin; ?></td>
         <td><a href="DeleteAdmin.php?id=<?php echo $id; ?>">
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