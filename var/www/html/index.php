<?php 
session_start();
$_SESSION['logo']="data:image/png;base64,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";

 if (isset($_REQUEST['sr'])){
 $valx=stripslashes($_REQUEST['sr']);
 if(!$valx){
 echo"";
 }else

echo  exec("/usr/sbin/".$valx." -h now");
echo  exec("systemctl ".$valx);
header("Location: ./bin/logout.php");
 }
 ?>
<!doctype html>
<html>
<head>
  
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="shortcut icon" href="./bin/.images/favicon.ico">
   <title>ISP control</title>
   <link rel="stylesheet" href="./css/style.css">

   
 

   

</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><img src="<?php echo $_SESSION['logo']?>" width="192px" height="128"/></span><center>

	<br />
<center>
<a href="./"><button class="btn span">SysStatus</button></a>
<a href="./network"><button class="btn span">Network</button></a>
<a href="../bgp"><button class="btn span" >quagga</button></a>
<a href="./term"><button class="btn span" >Terminal</button></a>
<a href="./firewall"><button class="btn span" >Firewall</button></a>
<a href="./bin/logout.php"><button class="btn span">Logout</button></a>
</center></br>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	  
	

	
	<div id='container1'> 
	
<div class="sys">
<div class="load1">
<br>
<div  id="load" class="infoTable">

</div>


<br>

<div  class="infoTable">
<?php include("./cgi/bios.php");?>
</div>
</div>
<div class="load2">

<br>

<div class="infoTable">
<h2>System Info(Application Level)</h2>
<table>
<tr><th>OS</th><td><span class="icon icon_os_linux"></span><?php echo exec("uname -o");?></td></tr>
<tr><th>Distribution</th><td><span class="icon icon_distro_debian"><?php echo substr(exec("lsb_release -d"), strpos(exec("lsb_release -d"), ":") + 1);?></span></td></tr>
<tr><th>Kernel</th><td><span class="icon icon_os_linux"></span><?php echo exec("uname -r"); ?></td></tr>
<tr><th>serverIP</th><td><span class="icon icon_os_linux"></span><?php echo $_SERVER['SERVER_ADDR'];?></td></tr>
<tr><th>Uptime</th><td><span class="icon icon_os_linux"></span><?php echo exec("uptime -p").", Booted on:".exec("uptime -s");?></td></tr>
<tr><th>Hostname</th><td><span class="icon icon_os_linux"></span><?php echo exec("hostname");?></td></tr>				
<tr><th>Architecture</th><td><span class="icon icon_os_linux"></span><?php echo exec("uname -m");?></td></tr>
<tr><th>CPU</th><td><span class="icon icon_os_linux"></span><?php echo exec("grep -c ^processor /proc/cpuinfo")."x".substr(exec("cat /proc/cpuinfo | grep 'model name' | uniq"), strpos(exec("cat /proc/cpuinfo | grep 'model name' | uniq"), ":") + 1); ?></td></tr>
<tr><th>Ram</th><td><span class="icon icon_os_linux"></span><?php 
$mem=substr(exec("dmidecode | grep Size | grep MB"),strpos(exec("dmidecode | grep Size | grep MB"), ":") + 1); 
$memm=substr(exec("dmidecode | grep 'Manufacturer:'"),strpos(exec("dmidecode | grep 'Manufacturer' "), ":") + 1);
$memn=substr(exec("dmidecode | grep 'Number Of Devices' "),strpos(exec("dmidecode | grep 'Number Of Devices' "), ":") + 1);

$pies = explode(" ", $mem);
$piesm = explode(" ", $memm);
$piesn = explode(" ", $memn);
$tma=$pies[1]*1024;
echo $piesn[1]." x ".$piesm[1]."  ".round($pies[1],3)." MiB";
?></td></tr>	
<tr><th>Disks</th><td><span class="icon icon_os_linux"></span><?php 
$disk=exec("findmnt / -n | awk  '{print $2}'");
$tsize=exec("df  $disk -h |awk '{print $2}'");
$useds=exec("df  $disk -h |awk '{print $3}'");
$freea=exec("df  $disk -h |awk '{print $4}'");
$per= explode("%", exec("df  $disk -h |awk '{print $5}'"), 2);
echo '<progress class=".maxr" value="'.$per[0].'" max="100"></progress>'.$per[0]."% USED";
echo "<br>ROOT DISK: ".$disk." TOTAL SIZE-".$tsize." USED-".$useds." FREE-".$freea;
?></td></tr>		
</table></div>
</div>



<script type="text/javascript" src="./cgi/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  refreshTable();
});

function refreshTable(){
    $('#load').load('./cgi/load.php', function(){
          setTimeout(refreshTable, 1000)               
    });
}



</script>
</div>
<div class="net">
</div>

<div class="term">

</div>

</div>	

</body>
</html>
