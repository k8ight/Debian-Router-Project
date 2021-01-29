function I(id){return document.getElementById(id);}
var meterBk="#E0E0E0";
var dlColor="#FF0000",
	ulColor="#00FF2B",
	pingColor="#FF902E",
	jitColor="#0000FF";
var progColor="#EEEEEE";

//CODE FOR GAUGES
function drawMeter(c,amount,bk,fg,progress,prog){
	var ctx=c.getContext("2d");
	var dp=window.devicePixelRatio||1;
	var cw=c.clientWidth*dp, ch=c.clientHeight*dp;
	var sizScale=ch*0.0055;
	if(c.width==cw&&c.height==ch){
		ctx.clearRect(0,0,cw,ch);
	}else{
		c.width=cw;
		c.height=ch;
	}
	ctx.beginPath();
	ctx.strokeStyle=bk;
	ctx.lineWidth=16*sizScale;
	ctx.arc(c.width/2,c.height-58*sizScale,c.height/1.8-ctx.lineWidth,-Math.PI*1.1,Math.PI*0.1);
	ctx.stroke();
	ctx.beginPath();
	ctx.strokeStyle=fg;
	ctx.lineWidth=16*sizScale;
	ctx.arc(c.width/2,c.height-58*sizScale,c.height/1.8-ctx.lineWidth,-Math.PI*1.1,amount*Math.PI*1.2-Math.PI*1.1);
	ctx.stroke();
	if(typeof progress !== "undefined"){
		ctx.fillStyle=prog;
		ctx.fillRect(c.width*0.3,c.height-16*sizScale,c.width*0.4*progress,4*sizScale);
	}
}
function mbpsToAmount(s){
	return 1-(1/(Math.pow(1.3,Math.sqrt(s))));
}
function msToAmount(s){
	return 1-(1/(Math.pow(1.08,Math.sqrt(s))));
}

//SPEEDTEST AND UI CODE
var w=null; //speedtest worker
var data=null; //data from worker
function startStop(){
	if(w!=null){
		//speedtest is running, abort
		w.postMessage('abort');
		w=null;
		data=null;
		I("startStopBtn").className="";
		initUI();
	}else{
		//test is not running, begin
		w=new Worker('speedtest_worker.min.js');
		w.postMessage('start'); //Add optional parameters as a JSON object to this command
		I("startStopBtn").className="running";
		w.onmessage=function(e){
			data=e.data.split(';');
			var status=Number(data[0]);
			if(status>=4){
				//test completed
				I("startStopBtn").className="";
				w=null;
				updateUI(true);
			}
		};
	}
}
//this function reads the data sent back by the worker and updates the UI
function updateUI(forced){
	if(!forced&&(!data||!w)) return;
	var status=Number(data[0]);
	I("ip").textContent=data[4];
	I("dlText").textContent=(status==1&&data[1]==0)?"...":data[1];
	drawMeter(I("dlMeter"),mbpsToAmount(Number(data[1]*(status==1?oscillate():1))),meterBk,dlColor,Number(data[6]),progColor);
	I("ulText").textContent=(status==3&&data[2]==0)?"...":data[2];
	drawMeter(I("ulMeter"),mbpsToAmount(Number(data[2]*(status==3?oscillate():1))),meterBk,ulColor,Number(data[7]),progColor);
	I("pingText").textContent=data[3];
	drawMeter(I("pingMeter"),msToAmount(Number(data[3]*(status==2?oscillate():1))),meterBk,pingColor,Number(data[8]),progColor);
	I("jitText").textContent=data[5];
	drawMeter(I("jitMeter"),msToAmount(Number(data[5]*(status==2?oscillate():1))),meterBk,jitColor,Number(data[8]),progColor);
}
function oscillate(){
	return 1+0.02*Math.sin(Date.now()/100);
}
//poll the status from the worker (this will call updateUI)
setInterval(function(){
	if(w) w.postMessage('status');
},200);
//update the UI every frame
window.requestAnimationFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.msRequestAnimationFrame||(function(callback,element){setTimeout(callback,1000/60);});
function frame(){
	requestAnimationFrame(frame);
	updateUI();
}
frame(); //start frame loop
//function to (re)initialize UI
function initUI(){
	drawMeter(I("dlMeter"),0,meterBk,dlColor,0);
	drawMeter(I("ulMeter"),0,meterBk,ulColor,0);
	drawMeter(I("pingMeter"),0,meterBk,pingColor,0);
	drawMeter(I("jitMeter"),0,meterBk,jitColor,0);
	I("dlText").textContent="";
	I("ulText").textContent="";
	I("pingText").textContent="";
	I("jitText").textContent="";
	I("ip").textContent="";
}
function getOS() {
  var userAgent = window.navigator.userAgent,
      platform = window.navigator.platform,
      macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
      windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
      iosPlatforms = ['iPhone', 'iPad', 'iPod'],
      os = null;

  if (macosPlatforms.indexOf(platform) !== -1) {
    document.getElementById("getos").innerHTML  = 'Mac OS';
  } else if (iosPlatforms.indexOf(platform) !== -1) {
   document.getElementById("getos").innerHTML = 'iOS';
  } else if (windowsPlatforms.indexOf(platform) !== -1) {
   document.getElementById("getos").innerHTML = 'Microsoft Windows';
  } else if (/Android/.test(userAgent)) {
    document.getElementById("getos").innerHTML = 'Android';
  } else if (!os && /Linux/.test(platform)) {
    document.getElementById("getos").innerHTML = 'Linux';
  }
 /* return os;*/
  
  
}	 function bd() { 
	var browser=null;
     if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) 
    {
        document.getElementById("bd").innerHTML ='Opera';
    }
    else if(navigator.userAgent.indexOf("Chrome") != -1 )
    {
       document.getElementById("bd").innerHTML ='Google Chrome';
    }
    else if(navigator.userAgent.indexOf("Safari") != -1)
    {
        document.getElementById("bd").innerHTML ='Safari';
    }
    else if(navigator.userAgent.indexOf("Firefox") != -1 ) 
    {
        document.getElementById("bd").innerHTML ='Mozzila Firefox';
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
    {
      document.getElementById("bd").innerHTML ='Internet Explorer';
    }  
    else 
    {
       document.getElementById("bd").innerHTML ='Not Detected';
    }
	  /*return browser;*/
    }
	function date(){
	document.getElementById("date").innerHTML = Date();
	}
	function runapp(){
    getOS();
    bd();
	date();
    }