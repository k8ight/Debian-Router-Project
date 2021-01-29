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

header('Location: ../DNS');
header('Location: ../DNS');
header('Location: ../DNS');
}

?>
<form action="" method="post"><table><tr></tr>


<tr><td>DNS PORT:<br><sup style='color:red;'>Default port do not chnage</sup></td><td><input type="text" name="dpo" value="<?php $pso=fopen("/etc/dnsmasq.d/dns.conf","r"); echo explode("=",fgets($pso))[1];
fclose($pso);
 ?>" /></td></tr>
<tr><td>DNS Servers:</td><td><textarea name="rslc" class="textarea"><?php 
$rsl=fopen("/etc/resolv.conf","r");
while(! feof($rsl))
  {
  echo fgets($rsl);
  }
fclose($rsl);
 ?></textarea></td></tr>
<tr><td>Query Strict Order:</td><td><select name="sto">
<?php 
$optfile = '/etc/dnsmasq.d/dns.conf';
$osearchfor = "strict-order";
header('Content-Type: text/plain');
$optcontents = file_get_contents($optfile);
$optpattern = preg_quote($osearchfor, '/');
$optpattern = "/^.*$optpattern.*\$/m";
if(preg_match_all($optpattern, $optcontents, $optmatches)){
      echo '<option value="strict-order" selected>YES</option>';
}
?>
<option value="">NO</option>
<option value="strict-order">YES</option>
</select></td></tr>
<tr><td colspan="2"><center><input type="submit" value="SAVE & APPLY" /></center></td></tr>

</table>
</form>
