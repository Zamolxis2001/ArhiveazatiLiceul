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
		<title>Vizualizează elev</title>
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
		<h3 style="text-align:center;" >Vizualizează detalii elev</h3><br>	<hr><br>	
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					?>
			<div id="section">
			
			
				
					
					
				
				
					<table border="1px" >
						<tr>
							<th>Număr Subiect</th>
							<th>Număr de înmatriculare</th>
							<th>Nume</th>
							<th>Numele Tatălui</th>
							<th>Data naşterii</th>
							<th>Sex</th>
							<th>Telefon</th>
							<th>E-Mail</th>
							<th>Adresa</th>
							<th>Clasa</th>
							<th>Indicele</th>
								<th>Profilul</th>
							<th>Imaginea</th>
							<th>Şterge</th>
						</tr>
						<?php
							$s="select * from student where TID={$_SESSION["TID"]}";
	
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
										<tr>
											<td>{$i}</td>
											<td>{$r["RNO"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["FNAME"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td>{$r["SCLASS"]}</td>
										<td>{$r["SSEC"]}</td>
											<td>{$r["PROFILUL"]}</td>
											<td><img src='{$r["SIMG"]}' height='70' width='70'></td>
											<td><a href='stud_delete.php?id={$r["ID"]}' class='btnr'>Delete</a><td>
										</tr>
									
									
									
									";
								}
							}
							else
							{
								echo "Nu a fost nici o înregistrare găsită.";
							}
						
						?>
						
					</table>
				
			
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>