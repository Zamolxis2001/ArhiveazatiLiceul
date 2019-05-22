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
		<title>Vezi examen
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
						<h2 >Vezi detalii Examen/Concurs/Simulare
</h2><br>
						
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						
						<table border="1px">
							<tr>
								<th>Nr.
</th>
								<th>Clasa</th>
								<th>Subiect</th>
								<th>Nume E / S / C
</th>
								<th>Sala</th>
								<th>Data de desfăşurare
</th>
								<th>Tipul E / S / C
</th>
								<th>Şterge!</th>
							</tr>
							<?php
								$s="select * from exam";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($r=$res->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["CLASS"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["ENAME"]}</td>
												<td>{$r["ETYPE"]}</td>
												<td>{$r["EDATE"]}</td>
												<td>{$r["SESSION"]}</td>
												<td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Şterge!</a></td>
											</tr>
										
										
										
										";
										
									}
								}
								else
								{
									echo "Nici o înregistrare găsită!
";
								}
							
							
							
							?>
						
						
						
						
						
						
						
						
						
						</table>
				<p class="para">* E / S / C-examen sau simulare sau concurs
</p>
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>