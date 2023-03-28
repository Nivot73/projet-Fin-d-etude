<?php
require_once('bdd/connect.php');

    $id = strip_tags($_SESSION["id"]);

    $sql = 'SELECT * FROM `utilisateurs` WHERE `id`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $info = $query->fetch(PDO::FETCH_ASSOC);

require_once('bdd/close.php');
?>

<img class="imageProfil" src="images/imageJeu/<?= $info['image'] ?>" alt="">
<p class="pseudoProfil" ><?= $info['nom'] ?></p>
<div class="blockListGroup">
    <div class="blockList"></div>
    <div class="blockList"></div>
    <div class="blockList"></div>
</div>