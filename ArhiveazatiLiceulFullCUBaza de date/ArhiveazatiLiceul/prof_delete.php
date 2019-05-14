<?php
	include "database.php";
	session_start();
	$s="delete from profilul where TPROF={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('add_prof.php?mes=Data Deleted..','_self');</script>";
?>