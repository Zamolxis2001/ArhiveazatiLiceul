<?php	include "database.php";	session_start();?><!DOCTYPE html><html>	<head>	     <meta charset="UTF-8">		<title>Logare Director/Directoare</title>		<link rel="stylesheet" type="text/css" href="css/style.css">		<script language=JavaScript>    document.onkeypress = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {                   return false;        }    }    document.onmousedown = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {              return false;        }    }document.onkeydown = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {                   return false;        }    }</script><script language=JavaScript>function ieClicked() {    if (document.all) {        return false;    }}function firefoxClicked(e) {    if(document.layers||(document.getElementById&&!document.all)) {        if (e.which==2||e.which==3) {            return false;        }    }}if (document.layers){    document.captureEvents(Event.MOUSEDOWN);    document.onmousedown=firefoxClicked;}else{    document.onmouseup=firefoxClicked;    document.oncontextmenu=ieClicked;}document.oncontextmenu=new Function("return false")function disableselect(e){    return false    }    function reEnable(){    return true    }    document.onselectstart=new Function ("return false")    if (window.sidebar){    document.onmousedown=disableselect    document.onclick=reEnable    }</script>		</head>	<body class="back">		<?php include"navbar.php";?>		<img src="img/1.jpg" width="800">				<div class="login">			<h1 class="heading">Logare Director/Directoare</h1>			<div class="log">			<?php				if(isset($_POST["login"]))				{					$sql="select * from admin where ANAME='{$_POST["aname"]}' and APASS=MD5('".$_POST["apass"]."')";					$res=$db->query($sql); 					if($res->num_rows>0)					{						$ro=$res->fetch_assoc();						$_SESSION["AID"]=$ro["AID"];						$_SESSION["ANAME"]=$ro["ANAME"];						echo "<script>window.open('admin_home.php','_self');</script>";					}					else					{						echo "<div class='error'>Parola sau Nume invalide</div>";					}									}				if(isset($_GET["mes"]))				{					echo "<div class='error'>{$_GET["mes"]}</div>";				}							?>						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">					<label>Nume de utilizator</label><br>					<input type="text" name="aname" required class="input"><br><br>					<label>Parola </label><br>					<input type="password" name="apass" required class="input"><br>					<button type="submit" class="btn" name="login">Logaţi-vă!</button><a href="admin_forgotpass.php" class="btnr">Am uitat parola!</a>				</div>				</form>			</div>		</div>		<div class="footer">			<footer><p>Autor: Stanciu Ştefan Alexandru</p></footer>		</div>		<script src="js/jquery.js"></script>		 <script>		$(document).ready(function(){			$(".error").fadeTo(1000, 100).slideUp(1000, function(){					$(".error").slideUp(1000);			});						$(".success").fadeTo(1000, 100).slideUp(1000, function(){					$(".success").slideUp(1000);			});		});	</script>						</body></html>