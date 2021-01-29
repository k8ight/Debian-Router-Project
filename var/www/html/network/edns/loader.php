<?php
if (isset($_REQUEST['dpo'])){
$dpo = stripslashes($_REQUEST['dpo']);
$rslc = stripslashes($_REQUEST['rslc']);
$sto = stripslashes($_REQUEST['sto']);
$rslcf=fopen("/etc/resolv.conf","w");
fwrite($rslcf,$rslc);
fclose($rslcf);

$stof=fopen("/etc/dnsmasq.d/dns.conf","w");
fwrite($stof,"port=".$dpo.PHP_EOL);
fwrite($stof,"resolv-file=/etc/resolv.conf".PHP_EOL);
fwrite($stof,$sto.PHP_EOL);
fclose($stof);

header('Location: ../');
}

?>
<form action="" method="post"><table><tr></tr>

<tr><td>DNS Servers:</td><td><textarea name="rslc" class="textarea"><?php 
$rsl=fopen("/etc/resolv.conf","r");
while(! feof($rsl))
  {
  echo fgets($rsl);
  }
fclose($rsl);
 ?></textarea></td></tr>


</table>
</form>
