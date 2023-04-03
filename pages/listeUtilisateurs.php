<?php
require_once('bdd/connect.php');

    $id = strip_tags($_SESSION["id"]);

    $sql = 'SELECT * FROM `utilisateurs` WHERE id <> :id ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $listUtilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<p>Liste d'Utilisateurs</p>

<?php
foreach ($listUtilisateurs as $utilisateur) {
?>

<div class="listUtilisateurBlock">
    <div class="boiteID">
        <img src="images/avatar/<?= $utilisateur['image'] ?>" alt="">
        <p><?= $utilisateur['nom'] ?></p>
        <p>inscrit depuis le : <?= $utilisateur['information'] ?></p>
        <?php
        if($utilisateur['connexion'] == 0){
            $connecter = "Deconnecter";
        } 
        elseif($utilisateur['connexion'] == 1) {
            $connecter = "Connecter";
        }
        else {$connecter = "Etat inconnu";}
        ?>
        <p><?= $connecter ?></p>
    </div>
    <div class="boiteListJeu">
    <?php

    $id = $utilisateur['id'];

    $sql = 'SELECT * FROM `jeujouer` WHERE `id_utilisateurs`=:id LIMIT 4';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $listJeux = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($listJeux as $jeu){

        $id = $jeu['id'];

        $sql = 'SELECT * FROM `jeux` WHERE `id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $donnees = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <a href="?page=jeu&id=<?= $donnees['id'] ?>" class="boiteJeu">
            <img src="images/imageJeu/<?= $donnees['image'] ?>" alt="">
            <p><?= $donnees['nom']; ?></p>
        </a>
    <?php } ?>
    </div>
    <div class="boiteListSalon">
    <?php

    $id = $utilisateur['id'];

    $sql = 'SELECT * FROM `salonrejoind` WHERE `id_utilisateurs`=:id LIMIT 4';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $listSalon = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($listSalon as $salon){

        $id = $salon['id'];

        $sql = 'SELECT * FROM `salons` WHERE `id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $donnees = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="boiteSalon">
            <img src="images/imageJeu/<?= $donnees['image'] ?>" alt="">
            <p><?= $donnees['nom']; ?></p>
        </div>
    <?php } ?>
    </div>
</div>

<?php } 

require_once('bdd/close.php');
?>