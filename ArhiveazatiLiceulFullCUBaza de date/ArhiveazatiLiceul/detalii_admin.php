<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM admin WHERE AID={$_SESSION["AID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Detalii Admin
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
		<h3 class="text">Bine aţi venit domnule/doamna
 <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
			<div id="section">
				<?php include"sidebar.php";?><br>
				
				<div class="content">
				
					<h3>Adaugă detalii
</h3><br>
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							$target="staff/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="update admin set APNO='{$_POST["pno"]}',APNUME='{$_POST["prel"]}',AQUAL='{$_POST["cal"]}',ACLAS='{$_POST["clas"]}',AMAIL='{$_POST["mail"]}',APADDR='{$_POST["addr"]}',IMG='{$target_file}'where AID={$_SESSION["AID"]}";
								$db->query($sql);
								echo "<div class='success'>Inserare cu succes..
</div>";
							}
							
						}
					
					
					?>
					
					
					
					
						
								
					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					    	<label> Prenume</label><br>
							<input type="text" maxlength="10" required class="input3" name="prel"><br><br>
							<label>  Număr de telefon
</label><br>
							<input type="text" maxlength="10" required class="input3" name="pno"><br><br>
							<label>  E-mail
</label><br>
							<input type="email"  class="input3" required name="mail"><br><br>
							<label>  Adresă</label><br>
							<textarea rows="5" name="addr"></textarea><br><br>
							 
					     <br><br>
					      <label>Calificare</label><br>
					     <input type="text" name="cal" required class="input">
					     <br><br>
					      <label>Direiginte clasă</label><br>
					    <select name="clas" required class="input3">
						<?php
							$s="select * from class";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Selectează!</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["CNAME"]}-{$r["CSEC"]}-{$r["CPROF"]}'>{$r["CNAME"]}-{$r["CSEC"]}-{$r["CPROF"]}</option>";
								}
							}
						?>
							<label> Imagine</label><br>
							<input type="file"  class="input3" required name="img"><br><br>
						<button type="submit" class="btn" name="submit">Adaugă detalii!
</button>
						</form>
					</div>
					
					
					
					
					
					
					<div class="rbox1">
					<h3> Profil</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
							<tr><th>Nume </th> <td><?php echo $row["ANAME"] ?> </td></tr>
										<tr><th>Prenume </th> <td><?php echo $row["APNUME"] ?> </td></tr>
							<tr><th>Calificare</th> <td><?php echo $row["AQUAL"] ?>  </td></tr>
						
							<tr><th>Număr de telefon
</th> <td> <?php echo $row["APNO"] ?> </td></tr>
							<tr><th>E - Mail </th> <td> <?php echo $row["AMAIL"] ?> </td></tr>
							<tr><th>Adresă </th> <td> <?php echo $row["APADDR"] ?> </td></tr>
							<tr><th>Diriginte clasă
 </th> <td> <?php echo $row["ACLAS"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>