<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}

		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Setează examen
</title>
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
			<img src="img/1.jpg" class="poza">
			
			<div id="section">
			
					<?php include"sidebar.php";?><br><br><br>
				
					
				
				<div class="content">
					<h3 class="text">Bine aţi venit domnule/doamna
 <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
						<h2>Detalii Examen/Concurs/Simulare
</h2><br>
					<?php
					
						if((isset($_POST['ename']))&&(isset($_POST['etype']))&&isset($_POST['ses'])&&(isset($_POST['cla']))&&(isset($_POST['sub']))){
						$ename=$_POST['ename'];
						$esala=$_POST['etype'];
					$tip=$_POST['ses'];
					$clasa=$_POST['cla'];
					$subiectul=$_POST['sub'];
	
			
					
						if(isset($_POST["submit"]))
						{	
						    
						    	$edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
						   
		$sql="select * from exam where EDATE='$edate'";
					            
					            $res=mysqli_query($db,$sql);



					if(mysqli_num_rows($res) > 0)

					{echo "<div class='error'>Exista deja in baza de date!
</div>";

					}

					else

					{
							
							$sq="insert into exam(ENAME,ETYPE,EDATE,SESSION,CLASS,SUB) values ('{$_POST["ename"]}','{$_POST["etype"]}','{$edate}','{$_POST["ses"]}','{$_POST["cla"]}','{$_POST["sub"]}')";
					$db->query($sq);

						echo "<div class='success'>Inserare cu succes...</div>";	
							 $subject="Examene/Simulări/Concursuri
";
						    $message=$tip." numit ".$ename." va avea loc pe data de
 ".$edate." şi se va ţine în sala
 ".$esala."\n"."Este destinat elevilor din clasa a-
".$clasa."-a având ca materie domniantă
 ".$subiectul;	
						    $sql="SELECT MAIL FROM `staff`";
				$result=mysqli_query($db,$sql);
		
						    while($row=mysqli_fetch_assoc($result)){
						       
						    
						    if(mail($row['MAIL'],$subject,$message)){
						        echo "";
						        
						    }		else
						    {echo "";}
						    }
							
						

					}
						    
						    
					
							
						
						}	
							
					
					
							}
						   
					
						
					?>
			
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<div class="lbox">
						<label>Numele Examenului/Concursului/Simulării
</label><br>
							<input type="text" class="input3" name="ename"  pattern="[^()/><\][\\\x22,;|]+"><br><br>
						<label>Sala
</label><br>
							<select name="etype" required class="input3">
						       <option value="">Selectează!</option>
						       <option value="1">1</option>
						       <option value="4">4</option>
						       <option value="3">3</option>
						       <option value="7">7</option>
						        <option value="18">18</option>
							</select>
					<br><br>
					
					<label>Data desfăşurării
</label><br>
					
					<select name="da" class="input5">
						<option value="">Ziua</option>
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
						<option value="09">Septemprie</option>
						<option value="10">Octombrie</option>
						<option value="11">Noiembrie</option>
						<option value="12">Decembrie</option>
					</select>
					<select name="ye" class="input5">
						<option value=""> Anul
</option>
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
					</select>
				</div>
				
				<div class="rbox">
					<label>Tipul Examen/Concurs/Simulare
</label>
						<select name="ses" required class="input3">
							<option value="">Selectează!</option>
							<option value="Examen">Examen</option>
							<option value="Simulare">Simulare</option>
								<option value="Concurs">Concurs</option>
						</select>
					<br><br>
					
					
					<label>Clasa</label>
					<select name="cla" required class="input3">
						<?php
							$sl="select DISTINCT(CNAME) from class";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Selectează!</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
								}
								
							}
						?>	
						
					</select>
					
					<br><br>
					
					
					<label>Materie</label><br>
					<select name="sub" required class="input3">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Selectează!</option>";
								while($r=$re->fetch_assoc())
								{
									echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						?>
						
					</select>
					<br><br>
				</div>
					<button type="submit" class="btn" name="submit">Adaugă Examele
</button>
				</form>
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>