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
<style>

input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}


input[type=submit] {
  background-color: #4CAF50;

}


.container {
  background-color: #f1f1f1;
  padding: 20px;
}


#message {
  display:none;
 
  color: #000;
  position: relative;
  
  margin-top: 20px;
  padding-top:65px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}


.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}


.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
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
							$sql="select * from staff where TPASS=MD5('".$_POST["opass"]."') and TID='{$_SESSION["TID"]}'";
							$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["psw"]==$_POST["cpass"])
									{
										$sql="UPDATE staff SET  TPASS=MD5('".$_POST["psw"]."') where  TID='{$_SESSION["TID"]}'";
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
						<input type="password" class="input3" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br><br>
						<label>Confirmă parola</label><br>
						<input type="password" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="float:left" name="submit">Schimbă parola</button></button>
					<div id="link"><a href="teacher_change_name.php">Schimbă numele!</a></div>
			<div id="message">
					</form>
		
<p>Parola trebuie sa contina urmatoarele:</p>
  <p id="letter" class="invalid">Un <b>caracter</b> mic</p>
  <p id="capital" class="invalid">Un <b>caracter</b> mare</p>
  <p id="number" class="invalid">Un <b>numar</b></p>
  <p id="length" class="invalid">Cel putin <b>8 caractere</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}


myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}


myInput.onkeyup = function() {

  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  

  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }


  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  

  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
					</div>
			
					
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>