<?php include("includes/DB.php"); ?>
<?php include("includes/Sessions.php"); ?>
<?php include("includes/functions.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Blog</title>  
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!--Font Awesome Links-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="publicstyle.css" rel="stylesheet">

<style>
.d2{
  padding: 10px;
  border-radius: 5px;
}
.col-sm-8{
    background-color:#f4f4f4;
}
.col-sm-3{
    background-color:#f4f4f4;
}
#heading{
  font-family: Bitter, Georgia, "Times New Roman", Times, serif;
  font-weight: bold;
  color:#0090DB;
}
#heading:hover{
  color: #0090DB;
}
/*.blogpost {
  background-color: #f5f5f5;
  padding-left: 10px;
  padding-right:10px;
  padding-top: 10px;
  overflow:hidden;
}*/
.btn-info{

padding-bottom:10px;
padding-top:10px;
}
</style>
    
  </head>

  <body>

    <div class="container"> 
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
            <li> <form style="padding-top: 10px;" class="form-inline" type="text" placeholder="Search" aria-label="Search"> 
              <input class="form-control mr-sm-2" type="text" name="Search" placeholder="Search" aria-label="Search anything..">
              <button class="btn btn-inline btn-secondary btn-success"  name="Searchbutton" type="submit">Go</button>
            </form> </li>
          </ul>
          </div>
        </div>
      </nav>
    </div> <br>
  
    <div class="Line" style="height: 10px; background: #27aae1;"> `
</div>
         
    <div class="container"> 
        <div class="blog-header"> 
         <h1> The Complete Responsive CMS Blog</h1>   
         <p class="lead">The Complete blog using PHP by matthew idungafa</p>
         <div class="row">
             <div class="col-sm-8"> 
                <?php 
                global $conn;
                $ViewQuery = "";
                // Query when Search Button is active
                if(isset($_GET["Searchbutton"])) {
                  $Search= $_GET["Search"];
                  $ViewQuery="SELECT * FROM admin_panel
                  WHERE date_time LIKE '%$Search%' OR title LIKE '%$Search%' 
                  OR category LIKE '%$Search%' OR post LIKE '%$Search%'";
                }
                //Query when category is active URL Tab
                elseif (isset($_GET["Category"])) {
                 $Category = $_GET["Category"];
                 $ViewQuery="SELECT * FROM admin_panel WHERE category='$Category' ORDER BY date_time desc";
                }
                   //Query when pagination is active i.e for Blog.php?page=1        
                 elseif (isset($_GET["Page"])) {
                  $Page=$_GET["Page"];
                    if($Page==0 || $Page<1){
                        $ShowPostFrom=0;
                    } else{  
                  $ShowPostFrom=($Page*5)-5; 
                  //echo $ShowPostFrom;
                    }
                  $ViewQuery="SELECT * FROM admin_panel ORDER BY date_time desc LIMIT $ShowPostFrom,5";
                 } else {          
                $ViewQuery="SELECT * FROM admin_panel ORDER BY date_time desc LIMIT 0,3";}
                $Execute=mysqli_query($conn, $ViewQuery);
                while($DataRows=mysqli_fetch_array($Execute)) {
                echo mysqli_error($conn);
                  $PostId=$DataRows["id"];
                  $DateTime=$DataRows["date_time"];
                  $Title=$DataRows["title"]; //Declaring the variables
                  $Category=$DataRows["category"];
                  $Admin=$DataRows["author"];
                  $Image=$DataRows["post_image"];
                  $Post=$DataRows["post"];
                ?>
                <div class="blog-post thumbnail"> 
                       <img class="img-responsive img-rounded" src="<?php echo $Image; ?>"> <!--Echo out the Image-->
                </div>
                <div class="caption"> 
                        <h1 id="heading"> <?php echo htmlentities($Title); ?>
                         <p class="description">Category:<?php echo htmlentities($Category); ?> Published on 
                         <?php echo htmlentities($DateTime); ?> </p>
                         <p class="post"><?php 
                         if(strlen($Post) > 150) { $Post=substr($Post,0,150).'...';} // Limits post to 150 characters
                         echo $Post; ?></p> 
                          <?php 
                       $conn;
                       $QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'";
                       $ExecuteApproved=mysqli_query($conn, $QueryApproved);
                       $RowsApproved=mysqli_fetch_array($ExecuteApproved);
                       $TotalApproved=array_shift($RowsApproved);
                       if($TotalApproved>0){           
                       ?>
                       <span class="badge pull-right"> 
                      Comments: <?php echo $TotalApproved; //Displays the total number of comments on the blog pages ?> 
                       </span>
                      
                       <?php } ?>
                </div><br>
                <a href="FullPost.php?id=<?php echo $PostId; ?>"> 
                <span class="btn btn-info" >  Read More  &rsaquo;&rsaquo; </span></a>
              <?php } ?>
               <nav>
               <ul class="pagination pull-left pagination-lg">
               <?php 
               if(isset($Page))
               {
               // Back link
                  if($Page>1) {
                    ?>
                    <li><a href="Blog.php?Page=<?php echo $Page-1; ?>"> &laquo; </a></li>
                  <?php       } //End of Back
               }?>
              <?php
              //Beginning of Pagination Links
              global $conn;                               
              $QueryPagination="SELECT COUNT(*)  FROM admin_panel ORDER BY id";
              $ExecutePagination=mysqli_query($conn, $QueryPagination);
              if (!$ExecutePagination) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
              $RowPagination=mysqli_fetch_array($ExecutePagination, MYSQLI_NUM);
                $TotalPosts=array_shift($RowPagination);
                // echo $TotalPosts;
                $PostPagination=$TotalPosts/5;
                $PostPagination=ceil($PostPagination);
               for($i=1;$i<=$PostPagination;$i++) {
                if(isset($Page)){ 
                if($i==$Page) { 
              ?>     
              <li class="active"><a href="Blog.php?Page=<?php echo $i; ?>"></a></li>
              <?php 
           } else {
             ?>
             <li><a href="Blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
               <?php 
            }
          }
        }
               ?>
<?php 
               if(isset($Page))
               {
                //Forward LInk
                  if($Page+1<=$PostPagination) {
                    ?>
                    <li><a href="Blog.php?Page=<?php echo $Page+1; ?>"> &raquo; </a></li>
                  <?php       } //End of Back
              
               }?>

              </ul>
              </nav>

             </div><!--End of side area -->
             <div class="col-sm-offset-1 col-sm-3"> 
                <h2>About me</h2>
                <img class="img-circle img-responsive imageicon" src="prf.jpg">
             This is an example..<br><br><br>iodnvonnevien vinvinekw voiew vkiw vowd 
                 iewv0iernhF09NHWDV9INOINIONOI OIDNVOD C-OHNAS 0ONFOIew
                  v90 onsqav-0j-f-iu1-FN-0HON-9H 0HNAV0ONS V-0JOD ONPOD 
                  NPININNDIND- NOD NAN
                DMVKDVOK KCKDN  ld vowd
            lkd vdk vkod dlkv dvmk dvkmdk
          <div class="panel panel-primary"> 
             <div class="panel-heading"> 
                 <h2 class="panel-title">Categories</h2>
             </div>
             <div class="panel-body"> 
             <?php 
             global $conn;
             $ViewQuery="SELECT * FROM category";
             $Execute=mysqli_query($conn, $ViewQuery);
             while($DataRows=mysqli_fetch_array($Execute)) {
                $id=$DataRows['id'];
                $Category=$DataRows['category_name'];
             
             ?>
             <a href="Blog.php?Category=<?php echo $Category; ?>">
             <span id="heading"><?php echo $Category. "<br>"; ?></span>
             </a>
             <?php } ?>
             
             </div>
             <div class="panel-footer"> 
             
             </div>
          </div>

           <!--Recent Posts section starts here -->
          <div class="panel panel-primary"> 
             <div class="panel-heading"> 
                 <h2 class="panel-title">Recent Posts</h2>
             </div>
             <div class="panel-body"> 
             <?php 
             $conn;
             $ViewQuery="SELECT * FROM admin_panel ORDER BY date_time desc LIMIT 0,5";
             $Execute=mysqli_query( $conn, $ViewQuery);
             while($DataRows=mysqli_fetch_array($Execute)) {
                  $Id=$DataRows["id"];
                  $Title=$DataRows["title"];
                  $DateTime=$DataRows["date_time"];
                  $Image=$DataRows["post_image"];
                  if(strlen($DateTime)>11) ($DateTime=substr($DateTime,0,11));
             ?>
             <div> 
             <img class="pull-left" style="margin-top: 10px; margin-left: 10px;" src="<?php echo htmlentities($Image); ?>"  height=70; width=70; >
             <a href="FullPost.php?id=<?php echo $Id; ?>">
             <p id="heading" style="margin-left: 90px; ">
             <?php echo htmlentities($Title); ?></p>
             </a>
             <p class="description"><?php echo htmlentities($DateTime); ?></p>
             <br>
             </div>
             <div>
             <?php } ?>
             </div>
             <div class="panel-footer"> 
             
             </div>
          </div>


             </div>
        </div>
        </div>
    </div>

                   
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src ="jquery-3.4.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js" ></script>
  </body>
</html>
