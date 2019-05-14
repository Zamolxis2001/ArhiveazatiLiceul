<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Adaugă detalii elev</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script language=JavaScript>


    document.onkeypress = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
       
            return false;
        }
    }
    document.onmousedown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
  
            return false;
        }
    }
document.onkeydown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
       
            return false;
        }
    }

</script>

<script language=JavaScript>
function ieClicked() {
    if (document.all) {
        return false;
    }
}
function firefoxClicked(e) {
    if(document.layers||(document.getElementById&&!document.all)) {
        if (e.which==2||e.which==3) {
            return false;
        }
    }
}
if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=firefoxClicked;
}else{
    document.onmouseup=firefoxClicked;
    document.oncontextmenu=ieClicked;
}
document.oncontextmenu=new Function("return false")
function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    document.onselectstart=new Function ("return false")
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
</script>
	</head>
	<body>
		<?php include"navbar.php";?><br>
			<h3 class="text">Bine aţi venit domnule/doamna <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
			<div id="section">
				<?php include"sidebar.php";?><br><br><br>
			
				<div class="content">
					
						<h3 >Adaugă detalii elev!</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
							$target="student/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sq="insert into student(RNO,NAME,FNAME,DOB,GEN,PHO,MAIL,ADDR,SCLASS,SSEC,SIMG,TID,PROFILUL) values('{$_POST["rno"]}','{$_POST["name"]}','{$_POST["fname"]}','{$edate}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["addr"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$target_file}','{$_SESSION["TID"]}','{$_POST["profilul"]}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Inserare cu succes...</div>";
								}
								else
								{
									echo "<div class='error'>Eroare de inserare...</div>";
								}
							}
							
						}
					
					
					
					
					
					
					?>
			
				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox">
					<label> ID</label><br>
						<?php
							$no="S101";
							$sql="select * from student order by ID desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["RNO"],1,strlen($row1["RNO"]));
								$no++;
								$no="S".$no;
							}
						
						
						
						?>
					<input type="text" class="input3" name="rno" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label>Numele elevului</label><br>
					<input type="text" class="input3" name="name"><br><br>
					<label>Numele tatălui</label><br>
					<input type="text" class="input3" name="fname"><br><br>
				
						
					<label>  Data de naştere</label><br>
					<select name="da" class="input5">
						<option value="">Data</option>
						<option value="1">1 </option>
						<option value="2">2 </option>
						<option value="3">3 </option>
						<option value="4">4 </option>
						<option value="5">5 </option>
						<option value="6">6 </option>
						<option value="7">7 </option>
						<option value="8">8 </option>
						<option value="9">9 </option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					<select name="mo" class="input5">
						<option> Luna</option>
						<option value="01">Ianuarie</option>
						<option value="02">Februarie</option>
						<option value="03">Martie</option>
						<option value="04">Aprilie</option>
						<option value="05">Mai</option>
						<option value="06">Iunie</option>
						<option value="07">Iulie</option>
						<option value="08">August</option>
						<option value="09">Septembrie</option>
						<option value="10">Octobrie</option>
						<option value="11">Noiembrie</option>
						<option value="12">Decembrie</option>
					</select>
					<select name="ye" class="input5">
						<option value="">Anul</option>
							<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
					</select><br><br>
					<label>Sex</label>
					<select name="gen" required class="input3">
							<option value="">Selectează!</option>
							<option value="Male">Bărbat</option>
							<option value="Female">Femeie</option>
							<option value="Prefer să nu spun">Prefer să nu spun</option>
					</select><br><br>
					
					<label> Număr de telefon</label><br>
					<input type="text" class="input3" maxlength="10" name="pho"><br><br>
				</div>
				
				<div class="rbox">
				
				<label> E-mail părinte</label><br>
					<input type="email" class="input3" name="email"><br><br>
					
					<label>  Adresă</label><br>
					<textarea rows="5" name="addr"></textarea><br><br>
				
					<label>Clasa</label><br>
					<select name="cla" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(CNAME) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Selectează!</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						<label>Index</label><br>
						<select name="sec" required class="input3">
						<?php 
							 $sl="SELECT DISTINCT(CSEC) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Selectează!</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
										}
									}
						?>
					
					</select><br></br>
					
						<label>Profil</label><br>
						<select name="profilul" required class="input3">
						<?php 
							 $sl="SELECT DISTINCT(PROFILUL) FROM profilul";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Selectează!</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["PROFILUL"]}'>{$ro["PROFILUL"]}</option>";
										}
									}
						?>
					
					</select><br></br>
					
					
					
					<label>Imagine</label><br>
					<input type="file"  class="input3" required name="img"><br><br>
			
			<button type="submit" style="float:right;" class="btn" name="submit">Adaugă detalii elev!</button>
				</div>
					
				</form>
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>