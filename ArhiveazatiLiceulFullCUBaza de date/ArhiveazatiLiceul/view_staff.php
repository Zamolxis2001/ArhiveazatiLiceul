<?php	include"database.php";	session_start();	if(!isset($_SESSION["AID"]))	{		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";			}	?><!DOCTYPE html><html>	<head>		<title>Vezi profesori</title>		<link rel="stylesheet" type="text/css" href="css/style.css">		<script language=JavaScript>    document.onkeypress = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {                   return false;        }    }    document.onmousedown = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {              return false;        }    }document.onkeydown = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {                   return false;        }    }</script><script language=JavaScript>function ieClicked() {    if (document.all) {        return false;    }}function firefoxClicked(e) {    if(document.layers||(document.getElementById&&!document.all)) {        if (e.which==2||e.which==3) {            return false;        }    }}if (document.layers){    document.captureEvents(Event.MOUSEDOWN);    document.onmousedown=firefoxClicked;}else{    document.onmouseup=firefoxClicked;    document.oncontextmenu=ieClicked;}document.oncontextmenu=new Function("return false")function disableselect(e){    return false    }    function reEnable(){    return true    }    document.onselectstart=new Function ("return false")    if (window.sidebar){    document.onmousedown=disableselect    document.onclick=reEnable    }</script>	</head>		<body>			<?php include"navbar.php";?><br>			<img src="img/1.jpg"  class="poza">								<div id="section">					<?php include"sidebar.php";?><br><br><br>																			<div class="conent">						<h3 class="text">Bine aţi venit domnule/doamna <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>						<h2 > Vezi detalii profesori</h2><br>						<form id="frm" autocomplete="off">							<input type="text" id="txt" class="input">						</form>						<br>						<div id="box"></div>											</div>					</div>											<?php include"footer.php";?>						<script>				$(document).ready(function(){					$("#txt").keyup(function(){						var txt=$("#txt").val();						if(txt!="")						{							$.post("search.php",{s:txt},function(data){								$("#box").html(data);							});						}											});																			});			</script>	</body></html>