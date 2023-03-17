<?php

   require_once('bdd/connect.php');

   $id = strip_tags($_SESSION['id']);

   $sql = "UPDATE `utilisateurs` SET `connexion` = '0' WHERE `id`=:id";
   $query = $db->prepare($sql);
   $query->bindValue(':id', $id);
   $query->execute();

   session_destroy();
   header("location:index.php");
?>