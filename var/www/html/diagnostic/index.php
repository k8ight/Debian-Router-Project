<?php 
session_start();

$uip=$_SERVER['REMOTE_ADDR'];
$host=shell_exec('arp -n '.$uip.'');
 
preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $host, $matches);
/*$mac=$matches[0]; */
$mac=md5('00:25:22:f4:3a:fd');
    
?>
<html>
<head>
<style>
a{
  text-decoration: none;
}
button {
	  color: #fff;
  background-color: green;
  border-color: #6c757d;
	  padding: 0.5rem 1rem;
  font-size: 1.25rem;
  font-weight:999;
  line-height: 1.5;
  border-radius: 0.3rem;
  display: block;
  width: 80%;
}

</style>
</head>
<body>
<center>
<a href="./speed"><button>Speedtest</button></a><br>
<a href="./ping"><button>Ping check</button></a><br>
</center>
</body></html>
