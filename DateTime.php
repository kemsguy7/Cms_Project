<?php 
date_default_timezone_get();
$CurrentTime=time();
$DateTime=strftime("%Y-%m-%d %H:%M%S", $CurrentTime);
echo $DateTime;
?>