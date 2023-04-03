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

    $sql = 'SELECT * FROM `jeujouer` WHERE `id_utilisateurs`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $listJeux = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM `salonrejoind` WHERE `id_utilisateurs`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $listSalons = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<img class="imageProfil" src="images/avatar/<?= $info['image'] ?>" alt="">
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
                    <p>status: déconnecté <br> inscript depuis le 
                    <?php } 
                    echo $donnees['information']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="blockList">
        <p>Jeux</p>

        <?php
            foreach ($listJeux as $jeu) {

            $id = $jeu['id'];

            $sql = 'SELECT * FROM `jeux` WHERE `id`=:id';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $donnees = $query->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="blockAmis">
            <img src="images/avatar/<?= $donnees['image'] ?>" alt="">
            <div>
                <p class="blockAmisNom"><?= $donnees['nom'] ?></p>

                <p>sortie le : <?= $donnees['date_de_sortie']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="blockList">
        <p>Salons</p>

    <?php
        foreach ($listSalons as $salon) {

        $id = $salon['id'];

        $sql = 'SELECT * FROM `salons` WHERE `id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $donnees = $query->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="blockAmis">
        <img src="images/avatar/<?= $donnees['image'] ?>" alt="">
        <div>
            <p class="blockAmisNom"><?= $donnees['nom'] ?></p>

            <p><?= $donnees['description']; ?></p>
        </div>
    </div>
    <?php } ?>
    </div>
</div>

<?php
require_once('bdd/close.php');
?>