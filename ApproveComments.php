<?php include("includes/DB.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php Confirm_Login(); ?>
<?php  
if(isset($_GET['id'])) {
    $idFromUrl=$_GET["id"];
    $conn;
    $Admin=$_SESSION["username"];
    $Query="UPDATE comments SET status='ON', approvedby='$Admin' WHERE id='$idFromUrl' ";
    $Execute=mysqli_query($conn, $Query);
    if($Execute) {
        $_SESSION["SuccessMessage"]="Comment Approved Succesfully";
        Redirect_to("Comments.php");
    }else{
        $_SESSION["ErrorMessage"]="Something Went wrong. Try Again !";
        Redirect_to("Comments.php"); 
    }
}
?>