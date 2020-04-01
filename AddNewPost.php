
<?php include("includes/DB.php"); ?>
<?php include("includes/Sessions.php"); ?>
<?php include("includes/functions.php"); ?>
<?php Confirm_Login(); ?>
<?php 
if(isset ($_POST['submit'])) {
    $Title =  trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['Title'])));
    $Category= trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['Category'])));
    $Post= trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['Post'])));
    $CurrentTime=time();
// Mysql syntax $DateTime=strftime("%Y-%m-%d %H:%M%S", $CurrentTime);

$DateTime=strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
$DateTime;
$Admin=$_SESSION["username"];
$Image=$_FILES["Image"]["name"];
$Target="Uploads/".basename($_FILES["Image"]["name"]);

if(empty($Title)) {
        $_SESSION["ErrorMessage"]="Title Can't be empty";
       Redirect_to("AddNewPost.php");

 }elseif(strlen($Title)<2){
     $_SESSION["ErrorMessage"]="Title should be at least 2 Characters";
     Redirect_to("AddNewPost.php");

 }else{
   global $conn;
   
        $sql = "INSERT INTO admin_panel (date_time, title, category,author,post_image,post)
         VALUES ('$DateTime','$Title', '$Category','$Admin', '$Target', '$Post')";
         $Execute = mysqli_query($conn, $sql);
         move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"]="Post Addded Succesfully";
            Redirect_to("AddNewPost.php");
        }
        else {
            $_SESSION["ErrorMessage"]="Something went wrong";
            Redirect_to("AddNewPost.php");
        }
   }       
 }
?>
<html>
    <head>
<title> Add New Post</title>
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
                         <li><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
                        <li class="active"><a href="AddnewPost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add new post</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-th"></span>&nbsp;Add New User</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                    </ul>
            </div>
        <!--End of col-sm-2-->  
        <div class="row">
            <div class="col-sm-10 pr-2" id="white">
                <h1>Add New Post</h1>
                <?php echo message(); 
                echo SuccessMessage();
                ?>
                <form action="AddNewPost.php" method="POST" enctype="multipart/form-data" >
                    <fieldset>
                        <div class="form-group">
                        <label for="title"><span class ="FieldInfo">Title:</span></label>
                        <input class="form-control" type="text" name="Title" id="title" placeholder="Name">
                        </div>
                        <div class="form-group">
                        <label for="categoryselect"><span class ="FieldInfo">Category:</span></label>
                        <select class="form-control" type="text" name="Category" id="categoryname" placeholder="Name">
                       <?php 
    global $conn;
    $ViewQuery="SELECT * FROM category ORDER BY date_time desc";
    $Execute=mysqli_query($conn, $ViewQuery);
     while($DataRows=mysqli_fetch_array($Execute)){
          $id=$DataRows["id"];
          $CategoryName=$DataRows["category_name"];
    ?>
    <option><?php echo $CategoryName; ?> </option>
    <?php } ?>
                       </select>
                        </div>
                        <div class="form-group">
                        <label for="imageselect"><span class="Fieldinfo">Select Image:</span></label>
                        <input type ="File" class="form-control" name="Image" id="imageselect">
                        </div>
                        <div class="form-group">
                        <label for="postarea"><span class="FieldInfo">Post:</span></label>
                        <textarea class="form-control" name="Post" id="postarea" ></textarea>
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="submit" value="Add New Post">
                    </fieldset>
                    <br>
                </form>
                </div>
                      </table>
                </div>

            </div>
        </div>
        <script>
        </script>
    </body>
</html>