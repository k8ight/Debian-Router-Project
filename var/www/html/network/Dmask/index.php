<?php 
session_start();
 ?>
<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="../bin/.images/favicon.ico">
   <title>ISP control</title>
   <link rel="stylesheet" href="../../css/style.css">
</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><img src="<?php echo $_SESSION['logo']?>" width="192px" height="128"/></span><center>

	<br />
<center>
<a href="./DHCP"><button class="btn span">ISC DHCP Server</button></a>
<a href="./DNS"><button class="btn span">DNS Forwarding</button></a>
<a href="../"><button class="btn span">Back</button></a>
</center></br>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	


	<div id='container2'> 
<center><h2><u>DHCP leases</u></h2>
<?php

require_once("class.DhcpdLeases.php");

$isc_dhcpd_leases = "/var/lib/dhcp/dhcpd.leases";
$dl = new DhcpdLeases($isc_dhcpd_leases);
?>

<?php
if ($dl->process() < 1) {
  echo "No one values in our $isc_dhcpd_leases";
} else {
  $leases = $dl->GetResultArray();
  // echo "DEBUG: <pre>"; print_r($leases); echo "</pre>";
?>
<table>
  <tr align="center">
    <td><b>IPv4</b></td>
    <td><b>MAC Address</b></td>
   <td><b>Manufacturer</b></td>
   <td><b>DHCP client</b></td>
    <td><b>client-hostname</b></td>
    
  </tr>
<?php
  foreach ($leases as $k => $v) {
    $ip = $k;
    if ($v["binding"] != "state active")
      continue;
?>
  <tr>
    <td><?php printf("<a href=\"http://%s\">%s</a>", $ip, $ip); ?></td>
    <td><?php echo @$v["hardware-ethernet"]; ?></td>
     <td><?php 
$string =@$v["hardware-ethernet"];
$arr = explode(":", $string);
$stm=$arr[0].":".$arr[1].":".$arr[2];


 ?></td>
    <td><?php echo @$v["vendor-class-identifier"]; ?></td>
    <td><?php echo @$v["client-hostname"]; ?></td>
    </tr>
<?php
  }
?>
</table>
<?php
} 
?>

</center>
</div>
</body>
</html>
