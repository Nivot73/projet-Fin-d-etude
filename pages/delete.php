<?php
require_once('bdd/connect.php');

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{
    $id = strip_tags($_SESSION['id']);

    $sql = "DELETE FROM utilisateurs WHERE id=:id";

    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();

    session_destroy();
    header("location:index.php");
}

require_once('bdd/close.php');
?>