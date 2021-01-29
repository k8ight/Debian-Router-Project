<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" />
<title>Speedtest</title>
<link rel="stylesheet" href="./Sstyle.css">
<script src="./speedtest.js"></script>
</head>
<body onload="runapp()">
<h1>Speedtest</h1>
<div id="startStopBtn" onclick="startStop()"></div><a href="../"><button id="btn">Back</button></a><br>
<div id="test">
	<div class="testGroup">
		<div class="testArea">
			<div class="testName">Download</div>
			<canvas id="dlMeter" class="meter"></canvas>
			<div id="dlText" class="meterText"></div>
			<div class="unit">Mbps</div>
		</div>
		<div class="testArea">
			<div class="testName">Upload</div>
			<canvas id="ulMeter" class="meter"></canvas>
			<div id="ulText" class="meterText"></div>
			<div class="unit">Mbps</div>
		</div>
	</div>
	<div class="testGroup">
		<div class="testArea">
			<div class="testName">Ping</div>
			<canvas id="pingMeter" class="meter"></canvas>
			<div id="pingText" class="meterText"></div>
			<div class="unit">ms</div>
		</div>
		<div class="testArea">
			<div class="testName">Jitter</div>
			<canvas id="jitMeter" class="meter"></canvas>
			<div id="jitText" class="meterText"></div>
			<div class="unit">ms</div>
		</div>
	</div>
	<div id="ipArea" >
		IP Address: <b><span id="ip"></span></b><br>Opareting System: <b><span id="getos"></span></b>
		,Browser: <b><span id="bd"></span></b><br>Running On:<b><span id="date"></span></b>
	</div>
</div>
<center><h3>&copy;Sounak Kar</center>
<script type="text/javascript">setTimeout(initUI,10);</script>
</body>
</html>
