<?php 
	include"database.php";
	
	$sql="SELECT * FROM staff WHERE TNAME LIKE '{$_POST["s"]}%' ";
	$res=$db->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>Nr.
</th>
					<th>Nume</th>
					<th>Prenume</th>
					<th>Calificarea
</th>
			
						<th>Director clasa
</th>
					<th>Detalii!
</th>
					<th>Şterge!</th>
				</tr>
				";
	if($res->num_rows>0)
		
	{
		$i=0;
		while($row=$res->fetch_assoc())
		{
			$i++;
			echo "<tr>
				<td>{$i}</td>
				<td>{$row["TNAME"]}</td>
				<td>{$row["PNAME"]}</td>
				<td>{$row["QUAL"]}</td>
			
					<td>{$row["CLAS"]}</td>
				<td><a href='staff_view.php?id={$row["TID"]}' class='btnb'>Detalii!</a></td>
    				<td><a href='staff_delete.php?id={$row["TID"]}' class='btnr'>Şterge!</a></td>
				</tr>
			";
		}
				echo "</table>";
	}
		
	else
	{
		echo "<p>Nici o înregistrare.
</p>";
	}
	
?>