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
		<title>Schimbă-ţi parola
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
			
			<img src="img/1.jpg" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" class="poza">

				<div id="section">
				
					<?php include"sidebar.php";?><br><br><br>
					
				
					
				<div class="content1">
					
						<h3 >Schimbă-ţi parola
</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sql="select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
								$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$s="update admin SET APASS='{$_POST["npass"]}' where AID='{$_SESSION["AID"]}'";
										$db->query($s);
										echo "<div class='success'>Parolă schimbată!
</div>";
									}
									else
									{
										echo "<div class='error'>Parolă greşită!
</div>";
									}
								}
								else
								{
									echo "<div class='error'>Parolă invalidă!

</div>";
								}
							}
						
						
						?>
						
							
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Parolă veche
</label><br>
						<input type="password" class="input3" name="opass"><br><br>
						<label>Parola nouă
</label><br>
						<input type="password" class="input3" name="npass"><br><br>
						<label>Confirmă parola
</label><br>
						<input type="password" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="float:left" name="submit"> Schimbă Parola
</button>	
					</form>
<div id="link"><a href="change_name.php">Schimbă numele
</a></div>
				</div>	
			</div>
			<?php include"footer.php";?>
		
	</body>
</html>