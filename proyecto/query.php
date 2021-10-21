<?php
	$link = mysqli_connect("localhost", "my_user", "my_password", "world");

/* comprobar la conexión */
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}

/* Crear una tabla que no devuelve un conjunto de resultados */
if (mysqli_query($link, "CREATE TEMPORARY TABLE myCity LIKE City") === TRUE) {
    printf("Se creó con éxtio la tabla myCity.\n");
}

/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = mysqli_query($link, "SELECT Name FROM City LIMIT 10")) {
    printf("La selección devolvió %d filas.\n", mysqli_num_rows($resultado));

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}

/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
if ($resultado = mysqli_query($link, "SELECT * FROM City", MYSQLI_USE_RESULT)) {

    /* Observar que no se puede ejecutar ninguna función que interactue con el
       servidor hasta que el conjunto de resultados se haya cerrado. Todas las llamadas devolverán un
       error 'out of sync' */
    if (!mysqli_query($link, "SET @a:='esto no funcionará'")) {
        printf("Error: %s\n", mysqli_error($link));
    }
    mysqli_free_result($resultado);
}

mysqli_close($link);
?>