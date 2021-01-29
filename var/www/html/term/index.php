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
   <link rel="stylesheet" href="../css/style.css">

   
 

   

</head>
<body link="black" vlink="black" >

<div id="container">
	<center><br><span id="log"><img src="<?php echo $_SESSION['logo']?>" width="192px" height="128"/></span><center>

	<br />
<center>
<a href="../"><button class="btn span">SysStatus</button></a>
<a href="../network"><button class="btn span">Network</button></a>
<a href="../bgp"><button class="btn span" >quagga</button></a>
<a href="../term"><button class="btn span" >Terminal</button></a>
<a href="../firewall"><button class="btn span" >Firewall</button></a>
<a href="./bin/logout.php"><button class="btn span">Logout</button></a>
</center></br>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	
	  
	
	<div id='container1'> 
<object data="../ttyd" style="width:100%;height:100%;">
    <embed src="../ttyd" style="width:100%;height:100%;"> </embed>
  
</object>
</div>	

</body>
</html>
