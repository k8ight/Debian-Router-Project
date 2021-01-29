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

<a href="../"><button class="btn span">Back</button></a>
</center></br>
<br><center>
	<h5>&copy 2020 <a href="https://github.com/sounakkar">sounak kar</a>;</h5></center>
</div>	


	<div id='container2'> 
	
	<?php include("./netdev.php");?>

</div>
<script type="text/javascript" src="../jquery.min223.js"></script>
       <script>
  $('input[type="checkbox"]').change(function() {
    this.checked ? $("." + this.className).not(this).prop("checked", false) : $("." + this.className).not(this).prop("checked", false);
});
  
      </script>	

</body>
</html>
