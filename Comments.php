<?php include("includes/DB.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php Confirm_Login(); ?>
<html>
    <head>
<title> Manage Comments</title>

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
                   <li> <input class="form-control mr-sm-2" type="text" name="Search" placeholder="Search" aria-label="Search anything.."></li>
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
                            <li><a href="#"><span class="glyphicon glyphicon-comment active"></span>&nbsp;Comments</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                        </ul>
                </div> <!--End of col-sm-2-->  
                </div>
                </div>
                <div class="col-sm-10" id="white">  <!--Main Area-->  
                <div> <?php echo message(); 
                    echo SuccessMessage();
                    ?></div>
                    <h1> Un-Approved Comments</h1>
                </div>
                <table class="table table-responsive table-striped table-hover"> 
                          <tr> 
                          <th>No. </th>
                          <th>Name </th>
                          <th>Date</th>
                          <th>Comment </th>
                          <th>Approve </th>
                          <th>Delete Comment</th>
                          <th>Details</th>
                          </tr>
                          <?php 
                          $conn;
                          $Query="SELECT * FROM comments WHERE status='OFF'";
                          $Execute=mysqli_query($conn, $Query);
                          $SrNo=0;
                          while($DataRows=mysqli_fetch_array($Execute)) {
                              $CommentId=$DataRows['id'];
                              $DateTimeofComment=$DataRows['datetime'];
                              $PersonName=$DataRows['name'];
                              $PersonComment=$DataRows['comment'];
                              $ApprovedBy=$DataRows['approvedby'];
                              $CommentedPostId=$DataRows['admin_panel_id'];
                              $SrNo++;
                              if(strlen($PersonComment) >18) { $PersonComment = substr($PersonComment, 0, 18).'...';}
                              if(strlen($PersonName) >10) {$PersonName = substr($PersonName, 0, 10).'...';}
                          ?>  
                                <tr> 
                                  <td><?php echo htmlentities($SrNo); ?> </td>
                                  <td style="color:#5e5eff"><?php echo htmlentities($PersonName);?> </td>
                                  <td><?php echo htmlentities($DateTimeofComment);?> </td>
                                  <td><?php echo htmlentities($PersonComment);?> </td>
                                  <td><?php echo htmlentities($ApprovedBy); ?> </td>
                                  <td><a href="ApproveComments.php?id=<?php echo $CommentId;?>">
                                  <span class="btn btn-success">Approve</span></a> </td>
                                  <td><a href="Deletecomment.php?id=<?php echo $CommentId; ?>"><span class="btn btn-danger">Delete</span></a></td>
                                  <td><a href="FullPost.php?id=<?php echo  $CommentedPostId ?>"target="_blank">
                                  <span class="btn btn-primary">Live Preview</span></a>
                                </tr> 
                        <?php }?>                  
                      </table>
                   </div>

                   <h1> Approved Comments</h1>
                </div>
                <table class="table table-responsive table-striped table-hover"> 
                          <tr> 
                          <th>No. </th>
                          <th>Name </th>
                          <th>Date</th>
                          <th>Comment </th>
                          <th>Approved by </th>
                          <th>Revert Approved Comments </th>
                          <th>Delete Comment</th>
                          <th>Details</th>
                          </tr>
                          <?php 
                          $conn;
                          $Query="SELECT * FROM comments WHERE status='ON' ORDER BY datetime desc";
                          $Execute=mysqli_query($conn, $Query);
                          $SrNo=0;
                          while($DataRows=mysqli_fetch_array($Execute)) {
                              $Admin="Matthew Idungafa";
                              $CommentId=$DataRows['id'];
                              $DateTimeofComment=$DataRows['datetime'];
                              $PersonName=$DataRows['name'];
                              $PersonComment=$DataRows['comment'];
                              $CommentedPostId=$DataRows['admin_panel_id'];
                              $SrNo++;
                              if(strlen($PersonComment) >18) { $PersonComment = substr($PersonComment, 0, 18).'...';}
                               if(strlen($PersonName) >10) {$PersonName = substr($PersonName, 0, 10).'...';}
                          ?>  
                                <tr> 
                                  <td><?php echo htmlentities($SrNo); ?> </td>
                                  <td style="color:#5e5eff"><?php echo htmlentities($PersonName);?> </td>
                                  <td><?php echo htmlentities($DateTimeofComment); ?> </td>
                                  <td><?php echo htmlentities($PersonComment); ?> </td>
                                  <td><?php echo $Admin; ?> </td>
                                  <td><a href="DisApproveComments.php?id=<?php echo $CommentId;?>">
                                  <span class="btn btn-warning">Dis-Approve</span></a></td>
                                  <td><a href="Deletecomment.php?id=<?php echo $CommentId; ?>"><span class="btn btn-danger">Delete</span></a></td>
                                  <td><a href="FullPost.php?id=<?php echo  $CommentedPostId ?>"target="_blank"><span class="btn btn-primary">Live Preview</span></a> </td>
                                </tr> 
                        <?php }?>                  
                      </table>
                   </div>
            <script src="jquery-3.4.1.min.js"></script>
            <script src="bootstrap.min.js"></script>   
    </body>
</html>