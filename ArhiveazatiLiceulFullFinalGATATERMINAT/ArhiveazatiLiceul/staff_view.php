<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}
	$sql="SELECT * FROM staff WHERE TID={$_GET["id"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Detalii profesor
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
		<img src="img/1.jpg"  class="poza">
			<div id="section">
				<?php include"sidebar.php";?><br><br><br>
			
				<div class="content">
						<h3 class="text">Bine aţi venit domnule/doamna
<?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
						<h3 >Vezi detalii profesori
</h3><br>
						<div class="ibox">
							<img src="<?php echo $row["IMG"]; ?>" height="230" width="230">
							
						</div>
						<div class="tsbox">
						<table border="1px">
						
							<tr><th>Numele
 </th> <td> <?php echo $row["TNAME"]; ?></td></tr>
								<tr><th>Prenumele
 </th> <td> <?php echo $row["PNAME"]; ?></td></tr>
							<tr><th>Calificare </th> <td> <?php echo $row["QUAL"]; ?></td></tr>
						
							<tr><th>Număr de telefon
 </th> <td> <?php echo $row["PNO"]; ?></td></tr>
							<tr><th>E-mail
 </th> <td> <?php echo $row["MAIL"]; ?></td></tr>
							<tr><th>Adresă </th> <td> <?php echo $row["PADDR"]; ?></td></tr>
							
						</table>
						</div>
				</div>	
			</div>
			<?php include"footer.php";?>
			
	</body>
</html>