<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_home.php?mes=Access Denied...','_self');</script>";
		
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
		<title>Schimbă parola</title>
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
	
			<div id="section">
				<?php include"sidebar.php";?><br>
				
				<div class="content">
				
					<h3>Schimbă parola</h3><br>
			
					 
				
					<div class="lbox1">	
							<?php
						if(isset($_POST["submit"]))
						{
							$sql="select * from staff where TPASS='{$_POST["opass"]}' and TID='{$_SESSION["TID"]}'";
							$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$sql="UPDATE staff SET  TPASS='{$_POST["npass"]}' where  TID='{$_SESSION["TID"]}'";
										$db->query($sql);
										echo"<div class='success'>Schimbă parola</div>";
									}
									else
									{
										echo"<div class='error'>Parolă incorectă!</div>";
									}
								}
								else
								{
									echo"<div class='error'>Parolă invalidă</div>";
								}
						}
					
					
					
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Parolă veche</label><br>
						<input type="password" class="input3" name="opass"><br><br>
						<label>Parolă nouă</label><br>
						<input type="password" class="input3" name="npass"><br><br>
						<label>Confirmă parola</label><br>
						<input type="password" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="float:left" name="submit">Schimbă parola</button></button>
				
					</form>
			<div id="link"><a href="teacher_change_name.php">Schimbă numele!</a></div>
					</div>
			
					
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>