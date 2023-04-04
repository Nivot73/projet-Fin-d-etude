<?php
if(isset($_GET['id']) && !empty($_GET['id']))
{
    require_once('bdd/connect.php');

    $id = strip_tags($_GET["id"]);

    $sql = 'SELECT * FROM `salons` WHERE `id`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $info = $query->fetch(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM `salons` WHERE `id_salons`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $commentaire = $query->fetchAll(PDO::FETCH_ASSOC);

    require_once('bdd/close.php');
}
else{header("location:index.php");}
?>