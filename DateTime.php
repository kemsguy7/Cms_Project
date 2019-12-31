<?php 
date_default_timezone_get();
$CurrentTime=time();
// Mysql syntax $DateTime=strftime("%Y-%m-%d %H:%M%S", $CurrentTime);

$DateTime=strftime("%B-%d-%y %H:%M:%S", $CurrentTime);

echo $DateTime;
?>