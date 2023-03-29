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
    <div>
        <img src="images/imageJeu/<?= $utilisateur['image'] ?>" alt="">
        <p><?= $utilisateur['nom'] ?></p>
        <p><?= $utilisateur['information'] ?></p>
    </div>
    <div></div>
    <div></div>
</div>

<?php } 

require_once('bdd/close.php');
?>