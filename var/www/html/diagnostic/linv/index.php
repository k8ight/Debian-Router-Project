<center>
<h1 style="COLOR:red;">PAST RECHARGES INVOICES</h1><br>
<?php

if(isset($_REQUEST["inv"])){
      $inv=$_REQUEST["inv"];

foreach (glob("../../admin/users/accounting/*.".$inv) as $file) {
	$file = pathinfo($file);
	$name=$file['filename'];
	$ext=$file['extension'];
	echo '<a href="../../inv/?inv='.$name.'.'.$ext.'">INVOICE:'.$name.'</a><br>';
}
}
?>
</center>
