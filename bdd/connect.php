<?php

$databaseDNS    	= 'mysql:host=localhost;dbname=projethandigital';
$databaseUsername 	= 'projet_user';//"root";
$databasePassword 	= 'projet_password';//"";



try {
    $db = new PDO($databaseDNS, $databaseUsername, $databasePassword);
} catch (PDOException $exception) {
    echo 'Erreur de connexion : ' . $exception->getMessage();
    die();
}

?>
