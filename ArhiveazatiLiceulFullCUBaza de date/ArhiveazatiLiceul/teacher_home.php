<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Acasă Profesor</title>
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
				<?php include"sidebar.php";?><br>
				
				<div class="content">
				
					<h3>Adaugă detalii profil</h3><br>
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							$target="staff/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$target_file}'where TID={$_SESSION["TID"]}";
								$db->query($sql);
								echo "<div class='success'>Inserare cu succes...</div>";
							}
							
						}
					
					
					?>
					
					
					
					
						
								
					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
							<label> Număr de telefon</label><br>
							<input type="text" maxlength="10" required class="input3" name="pno"><br><br>
							<label> Adresă e-mail</label><br>
							<input type="email"  class="input3" required name="mail"><br><br>
							<label> Adresă</label><br>
							<textarea rows="5" name="addr"></textarea><br><br>
							<label> Imagine</label><br>
							<input type="file"  class="input3" required name="img"><br><br>
						<button type="submit" class="btn" name="submit">Adaugă detalii profil!</button>
						</form>
					</div>
					
					
					
					
					
					
					<div class="rbox1">
					<h3> Profil</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
							<tr><th>Nume </th> <td><?php echo $row["TNAME"] ?> </td></tr>
										<tr><th>Prenume </th> <td><?php echo $row["PNAME"] ?> </td></tr>
							<tr><th>Calificarea</th> <td><?php echo $row["QUAL"] ?>  </td></tr>
						
							<tr><th>Număr de telefon</th> <td> <?php echo $row["PNO"] ?> </td></tr>
							<tr><th>E - Mail </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>Adresă</th> <td> <?php echo $row["PADDR"] ?> </td></tr>
							<tr><th>Diriginte clasă </th> <td> <?php echo $row["CLAS"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>