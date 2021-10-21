<?php
	$link = mysqli_connect("localhost", "root", "", "classicmodels");

/* comprobar la conexión */
		if (mysqli_connect_errno()) {
			die("Falló la conexión: " . mysqli_connect_error());
		}

		$sql="SELECT * FROM customers WHERE city LIKE '%".$_GET['city']."%'" . " AND country  LIKE  '%".$_GET['country']."%'";
		$resultado = mysqli_query($link, $sql);
		
		die($sql);
	
		if(!$resultado){
			die("Falló la consulta: " . mysqli_error($link));
		}

/*
$row_cnt = mysqli_num_rows($resultado);
echo $row_cnt;
*/
/*
$fila1 = mysqli_fetch_assoc($resultado);
$fila2 = mysqli_fetch_assoc($resultado);
var_dump($fila1);
var_dump($fila2);
*/

/* obtener array asociativo */

		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>customerNumber</th>";
		echo "<th>customerName</th>";
		echo "<th>contactLastName</th>";
		echo "<th>phone</th>";
		echo "<th>city</th>";
		echo "<th>contactFirstName  </th>";
		echo "<th>addressLine1</th>";																					
		echo "<th>addressLine2</th>";							
		echo "<th>state</th>";
		echo "<th>postalCode</th>";
		echo "<th>country</th>";
		echo "<th>salesRepEmployeeNumber</th>";
		echo "<th>creditLimit</th>";
		echo "</tr>";
			while ($fila = mysqli_fetch_assoc($resultado)) {
				echo "<tr>";
				echo "<td>" . $fila["customerNumber"] . "</td>";
				echo "<td>" . $fila["customerName"] . "</td>";
				echo "<td>" . $fila["contactLastName"] . "</td>";
				echo "<td>" . $fila["phone"] . "</td>";
				echo "<td>" . $fila["city"] . "</td>";
				echo "<td>" . $fila["contactFirstName"] . "</td>";
				echo "<td>" . $fila["addressLine1"] . "</td>";
				echo "<td>" . $fila["addressLine2"] . "</td>";
				echo "<td>" . $fila["state"] . "</td>";
				echo "<td>" . $fila["postalCode"] . "</td>";
				echo "<td>" . $fila["country"] . "</td>";
				echo "<td>" . $fila["salesRepEmployeeNumber"] . "</td>";
				echo "<td>" . $fila["creditLimit"] . "</td>";
				echo "</tr>";
			}
		echo "</table>";
/* Cierra la conexión */
		mysqli_close($link);

?>