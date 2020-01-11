<?php

include 'config.php';
/*
	Leemos el flujo que hay en php://input
	Como codificamos los datos con JSON al enviarlos,
	al recibirlos tenemos que decodificarlos de la misma manera.
	Para ello, PHP provee el método json_decode: http://php.net/manual/es/function.json-decode.php
*/
$users2 = json_decode(file_get_contents("php://input"));
# Ahora users2 sigue siendo un objeto, con propiedades. 
# Podemos acceder a ellas dependiendo de cómo las hayamos nombrado en el lado del cliente
$fname = $users2->fname;
$lname = $users2->lname;
$username = $users2->username;
// $mensaje = "Nombre: $fname. apellido: $lname. username: $username" . PHP_EOL; //Concatenar y poner salto de línea 
# Poner el mensaje en archivo. Utilizamos
# FILE_APPEND para que si ya hay datos, no se sobrescriban.
# Más información: http://php.net/manual/es/function.file-put-contents.php
// file_put_contents("usuarios.txt", $mensaje, FILE_APPEND);
mysqli_query($con, "INSERT INTO users(fname, lname, username) VALUES ('$fname', '$lname', '$username')");
mysqli_close($con); 

/*
	Ojo aquí: no hacer return, sino echo
*/
# Si nos mandaron los datos con JSON, respondamos con JSON ;)
// echo json_encode($mensaje);
?>