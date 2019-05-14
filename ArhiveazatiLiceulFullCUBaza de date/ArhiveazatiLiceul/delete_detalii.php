<?php
	include"database.php";
	session_start();
	
	$s="delete from detalii where DID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('add_detalii.php?mes=Data Deleted.','_self');</script>"
?>