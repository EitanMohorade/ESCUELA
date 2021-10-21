
<?php
$customerNamevalue = (isset($_GET['customerName']))? $_GET['customerName'] : "";
$contactLastNamevalue = (isset($_GET['contactLastName']))? $_GET['contactLastName'] :"";

?>
<style>
.button {
  border: none;
  color: white;
  padding: 5px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #4CAF50;} 
.button2 {background-color: #008CBA;} 
.button3 {background-color: #ff0000;}
</style>
<form action="" method="GET">

Nombre: <input name="customerName" value='<?php echo $customerNamevalue; ?>'> /// apellido: <input name="contactLastName" value='<?php echo $contactLastNamevalue; ?>'> /// <input type="submit">

</form>

<?php
define("SERVER","localhost");
define("NAME","root");
define("PASS","");
define("DB","classicmodels");

$link = mysqli_connect(SERVER,NAME,PASS,DB);


if(!$link){
	exit("no se pudo conecatar Error". mysqli_connect_error());
}

$sql = "
		SELECT * 
		FROM Customers
		WHERE customerName
		LIKE '%".$_GET['customerName']."%'" . "
		AND contactLastName  
		LIKE  '%".$_GET['contactLastName']."%'	
	";

$Res = mysqli_query($link,$sql);

if(!$Res){
	exit("no se pudo conecatar Error". mysqli_error($link));
}
?><button class="button button3">AAAAAAAAAA</button><?php
	echo "<table border='1'>";
		echo "<tr>";
			echo "<th>customerNumber</th>";
			echo "<th>contactLastName</th>";
			echo "<th>phone</th>";
			echo "<th>opcion</th>";
		echo "</tr>";
		
		while ($fila = mysqli_fetch_assoc($Res)){ 
			echo "<tr>";
				echo "<td>" . $fila["customerName"] . "</td>";
				echo "<td>" . $fila["contactLastName"] . "</td>";
				echo "<td>" . $fila["phone"] . "</td>";
				echo "<td>" ?>  <button class="button button1">eliminar</button> <?php  "</td>";
			echo "</tr>";
		}
	echo "</table>";
	?>

