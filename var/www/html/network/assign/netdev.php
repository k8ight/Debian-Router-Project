<?php
if (isset($_REQUEST["sbt"])){
$lanasd = $_REQUEST['LANassign'];
$wanasd = $_REQUEST['WANassign'];
$optasd = $_REQUEST['OPTassign'];

$fpl=fopen("/var/www/html/network/igs/LAN/assign","w");
for ($li = 0; $li < count($lanasd); $li++) {
 fwrite($fpl,$lanasd[$li].PHP_EOL);
}
fclose($fpl);

$fpw=fopen("/var/www/html/network/igs/WAN/assign","w");
for ($wi = 0; $wi < count($wanasd); $wi++) {
 fwrite($fpw,$wanasd[$wi].PHP_EOL);
}
fclose($fpw);

$fpo=fopen("/var/www/html/network/igs/OPT/assign","w");
for ($oi = 0; $oi < count($optasd); $oi++) {
 fwrite($fpo,$optasd[$oi].PHP_EOL);
}
fclose($fpo);


header("LOCATION: ../assin");
}

?>


<form name="nmassign" id="nmassign" action="" method="post"><tr>
<?php
exec("ls /sys/class/net",$idevs);
$dnum=count($idevs) -1;
echo "<table border='1'><tr><th>WAN</th><th>LAN</th><th>OPT</th><th>Interface</th><th>Status</th><th>Duplex</th><th>MTU</th><th>PortSpeed</th><th>MAC</th><th>Tx Bytes</th>
<th>Tx Packets</th><th>Tx Dropped</th><th>Rx Bytes</th><th>Rx Packets</th><th>Rx Dropped</th><th>Collitions</th></tr><tr>";
for ($i=0; $i<=$dnum; $i++)
	
{  	
$edev=$idevs[$i];
$est=exec('cat /sys/class/net/'.$edev.'/operstate');
$edp=exec('cat /sys/class/net/'.$edev.'/duplex');
$mtu=exec('cat /sys/class/net/'.$edev.'/mtu');
$ps=exec('cat /sys/class/net/'.$edev.'/speed');
$mac=exec('cat /sys/class/net/'.$edev.'/address');
$txb=exec('cat /sys/class/net/'.$edev.'/statistics/tx_bytes');
$txp=exec('cat /sys/class/net/'.$edev.'/statistics/tx_packets');
$txd=exec('cat /sys/class/net/'.$edev.'/statistics/tx_dropped');
$rxb=exec('cat /sys/class/net/'.$edev.'/statistics/rx_bytes');
$rxp=exec('cat /sys/class/net/'.$edev.'/statistics/rx_packets');
$rxd=exec('cat /sys/class/net/'.$edev.'/statistics/rx_dropped');
$coll=exec('cat /sys/class/net/'.$edev.'/statistics/collisions');
$opt="<a href='./igs/?dev=".$edev."'><button class='span'>EDIT</button></a>";
if ($edev=="lo"||$edev=="ifb0"){}
elseif($edev=="WAN"||$edev=="LAN"||$edev=="OPT"){}
else{ 
//WAN BRIDGE ASSIGN
$wanfile = '/var/www/html/network/igs/WAN/assign';
$wsearchfor = $edev;
header('Content-Type: text/plain');
$wancontents = file_get_contents($wanfile);
$wanpattern = preg_quote($wsearchfor, '/');
$wanpattern = "/^.*$wanpattern.*\$/m";
if(preg_match_all($wanpattern, $wancontents, $wanmatches)){
      echo "<td><input type='checkbox' class='".$edev."' name='WANassign[]' value='".$edev."' checked /></td>";
}
else{
     echo "<td><input type='checkbox' class='".$edev."' name='WANassign[]' value='".$edev."' /></td>";
}

//LAN BRIDGE ASSIGN
$lanfile = '/var/www/html/network/igs/LAN/assign';
$searchfor = $edev;
header('Content-Type: text/plain');
$lancontents = file_get_contents($lanfile);
$lanpattern = preg_quote($searchfor, '/');
$lanpattern = "/^.*$lanpattern.*\$/m";
if(preg_match_all($lanpattern, $lancontents, $lanmatches)){
      echo "<td><input type='checkbox'  class='".$edev."' name='LANassign[]' value='".$edev."' checked /></td>";
}
else{
     echo "<td><input type='checkbox' class='".$edev."' name='LANassign[]' value='".$edev."' /></td>";
}

//OPT BRIDGE ASSIGN

$optfile = '/var/www/html/network/igs/OPT/assign';
$osearchfor = $edev;
header('Content-Type: text/plain');
$optcontents = file_get_contents($optfile);
$optpattern = preg_quote($osearchfor, '/');
$optpattern = "/^.*$optpattern.*\$/m";
if(preg_match_all($optpattern, $optcontents, $optmatches)){
      echo "<td><input type='checkbox' class='".$edev."' name='OPTassign[]' value='".$edev."' checked /></td>";
}
else{
     echo "<td><input type='checkbox' class='".$edev."' name='OPTassign[]' value='".$edev."' /></td>";
}

echo"
<td>".$edev."</td><td>".$est."</td><td>".$edp."</td><td>".$mtu."</td><td>".$ps." Mb/s</td><td>".$mac."</td><td>".$txb."</td><td>".$txp."</td><td>".$txd."</td><td>".$rxb."</td><td>".$rxp."</td><td>".$rxd."</td><td>".$coll."</td></tr>";
}

} 

echo"</table>";

?> 
<input type='hidden' name='sbt' />
<center>
<input type="submit" class="span" value="Assign" />
</form></center>

