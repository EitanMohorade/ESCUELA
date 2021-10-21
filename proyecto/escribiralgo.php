

<html>
		<?php
		
		
		
			
			$contcol = 9;
			$contfila = 9;
			$color1 = "red";
			$color2 = "blue";
			$cont = cont
		?>
	<head>
 
    </head>
 
		<body>
 
			<table border = "1">
				<?php for($fila = 1; $fila <= $contfila; $fila++){
					echo "<tr>";
 
					for($col = 1; $col <= $contcol; $col++){
						if($col == $fila){
							echo"<td bgcolor='" . $color1 . "'>" . $fila . "//" . $col . "</td>";
							
						}else{
							
							echo"<td bgcolor='" . $color2 . "'>". $fila . "//" . $col . "</td>";
 
						}
					}
 
					echo"</tr>";
				}
				?>
 
			</table>
 </html>
