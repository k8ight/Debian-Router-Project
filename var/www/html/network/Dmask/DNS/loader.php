<?php
if (isset($_REQUEST['rslc'])){
$rslc = stripslashes($_REQUEST['rslc']);

$rslcf=fopen("/etc/bind/named.conf.options","w");
fwrite($rslcf,$rslc);
fclose($rslcf);
exec("service bind9 restart");
header('Location: ../DNS');

}

?>
<form action="" method="post"><table><tr></tr>

<tr><td style="color:red;">Manual DNS<br> forwarding settings</td><td><b><textarea name="rslc" style="font-weight:900;resize:none;height:300px;width:400px"><?php 
$rsl=fopen("/etc/bind/named.conf.options","r");
while(! feof($rsl))
  {
  echo fgets($rsl);
  }
fclose($rsl);
 ?></textarea></b></td></tr>
</tr>
<tr><td colspan="2"><center><input type="submit" value="SAVE & APPLY" /></center></td></tr>

</table>
</form>
