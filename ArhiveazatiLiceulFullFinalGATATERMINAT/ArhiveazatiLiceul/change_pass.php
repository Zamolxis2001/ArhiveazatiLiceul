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
								$sql="select * from admin where APASS=MD5('".$_POST["opass"]."') and AID='{$_SESSION["AID"]}'";
								$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["psw"]==$_POST["cpass"])
									{
										$s="update admin SET APASS=MD5('".$_POST["psw"]."') where AID='{$_SESSION["AID"]}'";
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
						<input type="password" maxlenght="4" class="input3" name="opass"  pattern="[^()/><\][\\\x22,;|]+"><br><br>
						<label>Parola nouă
</label><br>
						<input type="password" class="input3" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br><br>
						<label>Confirmă parola
</label><br>
						<input type="password" class="input3" name="cpass"  pattern="[^()/><\][\\\x22,;|]+"><br><br>
				
						<button type="submit" class="btn" style="float:left" name="submit"> Schimbă Parola
</button>	<div id="link"><a href="change_name.php">Schimbă numele
</a></div>
					</form>
<div id="message">
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
			<?php include"footer.php";?>
		
	</body>
</html>