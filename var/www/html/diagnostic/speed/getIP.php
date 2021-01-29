<?php
    $ip="";
    header('Content-Type: text/plain; charset=utf-8');
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['X-Real-IP'])) {
        $ip=$_SERVER['X-Real-IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        
    }
    $isp="";
    if(isset($_GET["isp"])){
        $json = file_get_contents("https://ipinfo.io/".$ip."/json");
        $details = json_decode($json,true);
        if(array_key_exists("org",$details)){
			$isp.=$details["org"];
		}			
		elseif($ip=$_SERVER['REMOTE_ADDR']){
			$isp.=$_SERVER['SERVER_NAME'];
		}
		else 
		{	
		$isp.="Unknown ISP";}
        if(array_key_exists("country",$details)) $isp.=" (".$details["country"].")";
        echo $ip." - ".$isp;
    } else echo $ip;
?>
