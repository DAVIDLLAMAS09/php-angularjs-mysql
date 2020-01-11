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
$id = $users2->id;
$fname = $users2->fname;
$lname = $users2->lname;
$username = $users2->username;

mysqli_query($con, " UPDATE `users` SET `fname` = '$fname', `lname` = '$lname', `username` = '$username' WHERE `users`.`id` = $id ");



/*
	Ojo aquí: no hacer return, sino echo
*/
# Si nos mandaron los datos con JSON, respondamos con JSON ;)
// echo json_encode($mensaje);
?>