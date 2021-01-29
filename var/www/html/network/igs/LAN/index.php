<?php 
session_start();
if (isset($_REQUEST['method'])){
$mthd = stripslashes($_REQUEST['method']);
$stp = stripslashes($_REQUEST['stp']);
$igmp = stripslashes($_REQUEST['igmp']);
$ipa = stripslashes($_REQUEST['ipa']);
$ipg = stripslashes($_REQUEST['ipg']);
$ipd = stripslashes($_REQUEST['ipd']);
$ipm = stripslashes($_REQUEST['ipm']);


$handel=fopen("./method","w");
fwrite($handel,$mthd);
fclose($handel);
$handel="";
$handel=fopen("./stp","w");
fwrite($handel,$stp.PHP_EOL);
fclose($handel);
$handel="";
$handel=fopen("./igmp","w");
fwrite($handel,$igmp.PHP_EOL);
fclose($handel);
$handel="";
$handel=fopen("./ip","w");
fwrite($handel,$ipa);
fclose($handel);
$handel="";
$handel=fopen("./gateway","w");
fwrite($handel,$ipg);
fclose($handel);
$handel="";
$handel=fopen("./dns","w");
fwrite($handel,$ipd);
fclose($handel);
$handel="";
$handel=fopen("./mtu","w");
fwrite($handel,$ipm);
fclose($handel);
$handel="";

exec("systemctl restart firewalld");
header("LOCATION: ./");
}
else{}

 ?>
<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="../bin/.images/favicon.ico">
   <title>ISP control</title>
   <link rel="stylesheet" href="../../../css/style.css">
</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><b><u>Network</u></b></span><center>

	<br />
<center>
<a href="../WAN"><button class="btn span">WAN</button></a>
<a href="../LAN"><button class="btn span">LAN</button></a>
<a href="../OPT"><button class="btn span" >OPT</button></a>
<a href="../../"><button class="btn span">Back</button></a>
</center></br>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	
	<div id='container2'> <center>
    <h1><u><b>Edit Lan Interface</b></u></h1>
	<form name="nmweb" id="nmweb" action="" method="post"><br>

<table>
        <tbody>
  <tr><td>Interface IPv4.Method:<sup style='color:red;'><br>(Set IP Connection Method)</sup></td><td><select name="method" required>
	<option value="manual" selected>Manual</option>
	</select></td></tr>
<tr>
 <td>&nbsp;STP:
<select name="stp" required>
<?php $stp = file("./stp", FILE_IGNORE_NEW_LINES);
    
$stpf=$stp[0];
   if($stpf=="yes"){
   echo '<option value="yes" selected>Enabled</option>';
}else{echo '<option value="no" selected>Disabled</option>';}
?>
<option value="yes">Enable</option>
<option value="no">Disable</option>
<select>
 </td><td>
IGMP:<select name="igmp" required>
<?php $igmp = file("./igmp", FILE_IGNORE_NEW_LINES);
    
$igmpf=$igmp[0];
   if($igmpf=="yes"){
   echo '<option value="yes" selected>Enabled</option>';
}else{echo '<option value="no" selected>Disabled</option>';}
?>
<option value="yes">Enable</option>
<option value="no">Disable</option>
<select></td></tr>



<tr><td>Interface IPv4.Address:<sup style='color:red;'><br>(IP Addr Format 192.168.0.1/24 <br>Add Multiple Ip on each line)</sup></td><td><textarea class="textarea" name="ipa" id="ipa"><?php
$handle = fopen("./ip", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo $line;
    }

    fclose($handle);
}
?>
</textarea><br><sup style='color:red;'>Subnet mask 255.255.255.0=/24 255.255.255.128=/25....etc</sup></td></tr>

<!--<tr><td></td><td></td></tr>-->
<tr><td>Interface IPv4.Gateway:<sup style='color:red;'><br>(gateway Format 192.168.0.1)</sup></td><td><input type="text" name="ipg" id="ipg" value="
<?php
$file = fopen("./gateway","r");
echo fgets($file);
fclose($file);
?> "/><sup style='color:red;'><br>(Blank For Lan)</sup></td></tr>
<tr><td>Interface IPv4.DNS:<br><sup style='color:red;'>(use , between servers)</sup></td><td><input type="text" name="ipd" id="ipd" value="
<?php
$file = fopen("./dns","r");
echo fgets($file);
fclose($file);
?> "/></td></tr>


<tr><td>Interface IPv4.MTU:<br><sup style='color:red;'>(Default 1500) Not Editable</sup></td><td><input type="text" name="ipm" id="ipm" value="
<?php
$file = fopen("./mtu","r");
echo fgets($file);
fclose($file);
?> " readonly style="Color:gray;" /></td></tr>

<tr><td>Interface MAC Addr:<br><sup style='color:red;'>(Format 00:00:00:00:00:00)</sup></td><td> <input type="text" name="maca" id="maca" value="
<?php echo exec('cat /sys/class/net/LAN/address');?>" disabled/><br><sup style='color:red;'>Assigned Mac </sup></td></tr>

  </tbody>
</table>

<input type="submit" value="Save & Apply" />
</form>
</center>
</div>
</body>
</html>
