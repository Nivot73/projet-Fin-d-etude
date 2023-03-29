<?php
require_once('bdd/connect.php');

    $id = strip_tags($_SESSION["id"]);

    $sql = 'SELECT * FROM `utilisateurs` WHERE `id`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $info = $query->fetch(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM `amis` WHERE `id`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $listAmis = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<img class="imageProfil" src="images/imageJeu/<?= $info['image'] ?>" alt="">
<p class="pseudoProfil" ><?= $info['nom'] ?></p>
<div class="blockListGroup">
    <div class="blockList">
        <p>Amis</p>

        <?php
            foreach ($listAmis as $amis) {

            $id = $amis['id_utilisateurs'];

            $sql = 'SELECT * FROM `utilisateurs` WHERE `id`=:id';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $donnees = $query->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="blockAmis">
            <img src="images/avatar/<?= $donnees['image'] ?>" alt="">
            <div>
                <p class="blockAmisNom"><?= $donnees['nom'] ?></p>

                <?php if($donnees['connexion'] == 1)  

                { ?><p>status: connecté <br> <?php } 

                else {?>
                    <p>status: déconnecté <br>
                    <?php } 
                    echo $donnees['information']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="blockList"></div>
    <div class="blockList"></div>
</div>

<?php
require_once('bdd/close.php');
?>