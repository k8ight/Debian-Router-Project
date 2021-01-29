<?php 
session_start();

if (isset($_REQUEST['dfph'])){
$dfph = stripslashes($_REQUEST['dfph']);

$filex=fopen("/usr/bin/fwalld.sh","w");
fwrite($filex,$dfph);
fclose($filex);
exec("systemctl restart firewalld.service");
header("Location: ../firewall");
}
 ?>
<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="../bin/.images/favicon.ico">
   <title>ISP control</title>
   <link rel="stylesheet" href="../css/style.css">
</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><img src="<?php echo $_SESSION['logo']?>" width="192px" height="128"/></span><center>

	<br />
<center>

<a href="../"><button class="btn span">Back</button></a>
</center></br>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	


	<div id='container2'> 
	
<form action="" method="post"><center>
<table><tr></tr>
<tr><td style="width:200px;color:red;">Manual Iptable firewall<br>
LAN Interfaces has internet access<br>
OPT need to add in FORWARD chain. 
</td><td><textarea name="dfph" style="font-weight:900;height:400px;width:100%;resize:none;"><?php
$dfp=fopen("/usr/bin/fwalld.sh","r");
while(! feof($dfp))
  {
  echo fgets($dfp);
  }

fclose($dfp);
?>
</textarea></td></tr>
<tr><td colspan="2"><center><input type="submit" value="SAVE & APPLY" /></center></td></th>


</tr></table>
</form><br><sup style="color:red;">use nameserver before ip. Demo:-nameserver 8.8.8.8</sup></center>

</div>
</body>
</html>
