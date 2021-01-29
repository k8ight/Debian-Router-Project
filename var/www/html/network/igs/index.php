<?php 
session_start();
if(isset ($_REQUEST['dev'])){
$mdev=urldecode($_REQUEST['dev']);

header("LOCATION: ./".$mdev);
}

?>
