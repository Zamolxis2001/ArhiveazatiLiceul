<?php	include"database.php";	session_start();	if(!isset($_SESSION["AID"]))	{		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";			}	?><!DOCTYPE html><html>	<head>		<title>Panel</title>		<link rel="stylesheet" type="text/css" href="css/style.css">		<script language=JavaScript>    document.onkeypress = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {                   return false;        }    }    document.onmousedown = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {              return false;        }    }document.onkeydown = function (event) {        event = (event || window.event);        if (event.keyCode == 123) {                   return false;        }    }</script><script language=JavaScript>function ieClicked() {    if (document.all) {        return false;    }}function firefoxClicked(e) {    if(document.layers||(document.getElementById&&!document.all)) {        if (e.which==2||e.which==3) {            return false;        }    }}if (document.layers){    document.captureEvents(Event.MOUSEDOWN);    document.onmousedown=firefoxClicked;}else{    document.onmouseup=firefoxClicked;    document.oncontextmenu=ieClicked;}document.oncontextmenu=new Function("return false")function disableselect(e){    return false    }    function reEnable(){    return true    }    document.onselectstart=new Function ("return false")    if (window.sidebar){    document.onmousedown=disableselect    document.onclick=reEnable    }</script>	</head>	<body>		<?php include"navbar.php";?><br>		<img src="img/1.jpg" class="poza">			<div id="section">				<?php include"sidebar.php";?><br>								<div class="content">					<h3 class="text">Bine ați venit domnule/doamna <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>						<h2 >Adaugă detalii despre clasă!</h2><br>					<?php						if(isset($_POST["submit"]))							{	$sql="select * from class where CNAME='{$_POST["cname"]}'";$sql1="select * from class where CSEC='{$_POST["sec"]}'";$sql2="select * from class where CPROF='{$_POST["prof"]}'";					            $res=mysqli_query($db,$sql); $res1=mysqli_query($db,$sql1);  $res2=mysqli_query($db,$sql2);					if((mysqli_num_rows($res) > 0)&&(mysqli_num_rows($res1) > 0)&&(mysqli_num_rows($res2) > 0))					{																echo "<div class='error'>Clasa exista deja in baza de date!</div>";					}					else					{ $sq="insert into class(CNAME,CSEC,CPROF) values('{$_POST["cname"]}','{$_POST["sec"]}','{$_POST["prof"]}')";					$db->query($sq);						echo "<div class='success'>Inserare cu succes...</div>";					}							}																																																							?>						<div class="lbox">				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">					<label>Numele Clasei</label><br>				<select name="cname"  required class="input2">						<option value="">Selectează!</option>									<option value="IX">IX</option>						<option value="X">X</option>						<option value="XI">XI</option>						<option value="XII">XII</option>											</select><br><br>					<label>Indicele Clasei </label><br>					<select name="sec"  required class="input2">						<option value="">Selectează!</option>						<option value="-">-</option>						<option value="A">A</option>						<option value="B">B</option>						<option value="C">C</option>						<option value="D">D</option>						<option value="E">E</option>						<option value="F">F</option>					<option value="G">G</option>					<option value="H">H</option>					<option value="I">I</option>					<option value="J">J</option>					<option value="K">K</option>					<option value="L">L</option>					<option value="M">M</option>					<option value="N">N</option>					<option value="O">O</option>					<option value="P">P</option>					<option value="Q">Q</option>					<option value="R">R</option>					<option value="S">S</option>					<option value="T">T</option>					<option value="U">U</option>					<option value="V">V</option>					<option value="X">X</option>					<option value="Y">Y</option>					<option value="Z">Z</option>													</select>	<br><br>	<label>Profil</label>						<select name="prof" required class="input3">						<?php							$s="select * from profilul";							$re=$db->query($s);							if($re->num_rows>0)							{								echo "<option value=''>Selectează!</option>";								while($r=$re->fetch_assoc())								{								echo "<option value='{$r["PROFILUL"]}'>{$r["PROFILUL"]}</option>";								}							}																		?>											</select>					<br>					<button type="submit" class="btn" name="submit">Adaugă detalii despre clasă</button>				</form></div>																						<div class="rbox">					<h2 style="margin-top:30px;">Detalii despre Clase</h2><br>					<?php						if(isset($_GET["mes"]))						{							echo"<div class='error'>{$_GET["mes"]}</div>";							}										?>					<table border="1px" >						<tr>							<th>Număr</th>							<th>Numele Clasei</th>							<th>Indicele Clasei</th>							<th>Profil</th>							<th>Şterge Clasa</th>						</tr>						<?php							$s="select * from class";							$res=$db->query($s);							if($res->num_rows>0)							{								$i=0;								while($r=$res->fetch_assoc())								{									$i++;									echo "										<tr>											<td>{$i}</td>											<td>{$r["CNAME"]}</td>											<td>{$r["CSEC"]}</td>													<td>{$r["CPROF"]}</td>											<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Şterge Clasa!</a></td>										</tr>										";																	}															}						?>										</table>			</div></div></div>				<?php include"footer.php";?>	</body></html>