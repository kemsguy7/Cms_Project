 <?php 
 session_start();
 function Message(){
     if(isset($_SESSION["ErrorMessage"])){
         $Output="<div class=\"alert alert-danger\">";
         $Output.=htmlentities($_SESSION["ErrorMessage"]);
         $Output.="</div>";
         $_SESSION["ErrorMessage"]=null; //This line clears sessions if the site has been reloaded
         return $Output;
     }
 }

 
 //Success message
 function SuccessMessage(){
    if(isset($_SESSION["SuccessMessage"])){
        $Output="<div class=\"alert alert-success\">";
        $Output.=htmlentities($_SESSION["SuccessMessage"]);
        $Output.="</div>";
        //$_SESSION["SuccessMessage"]=null; //This line clears sessions if the site has been reloaded
        return $Output;
    }
}
 ?>