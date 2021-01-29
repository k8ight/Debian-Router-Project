<center><h1 style="COLOR:red;">PING</h1>
<form action="" name="ping" method="POST">
<input type="text" id="a"  value="<?php echo $_SERVER['REMOTE_ADDR'];?>" placeholder="Ip or Host name" name="url" required />
<input type="number" id="a"  value="4" placeholder="Ip or Host name" min="4" name="hop" />
<input type="submit" value="PING"/> 
</form>
<a href="../"><button>BACK</button></a><br>

<?php
if(isset($_REQUEST["url"])){
$ip =stripslashes($_REQUEST['url']);
$max=stripslashes($_REQUEST['hop']);
for($i = 1; $i<=$max; $i++) {
    exec("ping -D -O -c 1 $ip", $output);
    echo  $output[1].$output[4]."<br>";
}
unset($_REQUEST["url"]);
}

?>
</center>

