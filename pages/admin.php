<?php
require_once('bdd/connect.php');
    if($_SESSION['role'] != 1)
    {
        header("location:index.php");
    }
?>
<ul class="boutonAdmin">
    <li><a href="?page=admin&tab=utilisateurs"><button><img src="images/icone/amis.svg"><p>Liste des Utilisateurs</p></button></a></li>
    <li><a href="?page=admin&tab=jeux"><button><img src="images/icone/jeux.svg"><p>Liste des Jeux</p></button></a></li>
    <li><a href="?page=admin&tab=salons"><button><img src="images/icone/salons.svg"><p>Liste des Salons</p></button></a></li>
</ul>
<?php
if(isset($_GET['tab'])){
    echo "<table class='tabAdmin'>";
    if($_GET['tab'] == "utilisateurs"){

        $sql = 'SELECT * FROM `utilisateurs` ';
        $query = $db->prepare($sql);
        $query->execute();
        $listUtilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>E-mail</td>
        <td>Image</td>
        <td>Information</td>
        <td>Role</td>
        <td>Actions</td>
    </tr>
</thead>
<tbody>
<?php
    foreach ($listUtilisateurs as $utilisateur) {
    ?>    
        <tr>
            <td><?= $utilisateur['id'] ?></td>
            <td><a href="?page=utilisateur&id=<?= $utilisateur['id'] ?>"><?= $utilisateur['nom'] ?></a></td>
            <td ><?= $utilisateur['e-mail'] ?></td>
            <td><img src="images/avatar/<?= $utilisateur['image'] ?>" class="imageListAdmin"></td>
            <td><?= $utilisateur['information'] ?></td>
            <?php if($utilisateur['role'] == 1){
                $role = "admin";
            }
            else {
                $role = "utilisateur";
            } ?>
            <td><?= $role ?></td>
            <td>Actions</td>
        </tr>
    <?php } ?>
</tbody>
<?php }
    if($_GET['tab'] == "jeux"){        
        $sql = 'SELECT * FROM `jeux` ';
        $query = $db->prepare($sql);
        $query->execute();
        $listJeux = $query->fetchAll(PDO::FETCH_ASSOC);       
?>
    <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Image</td>
            <td>Date de Sortie</td>
            <td>Genres</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($listJeux as $jeu) {
    ?>    
        <tr>
            <td><?= $jeu['id'] ?></td>
            <td><a href="?page=jeu&id=<?= $jeu['id'] ?>"><?= $jeu['nom'] ?></a></td>
            <td class="adminDescription"><p><?= $jeu['description'] ?></p></td>
            <td><img src="images/imageJeu/<?= $jeu['image'] ?>" class="imageListAdmin"></td>
            <td><?= $jeu['date_de_sortie'] ?></td>
            <td>
            <?php           
            $id = strip_tags($jeu['id']);
            $sql = 'SELECT * FROM `genrejeu` WHERE `id_jeux`=:id';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $listGenre = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($listGenre as $genre) {
            
            $id = strip_tags($genre["id"]);
            $sql = 'SELECT nom FROM `genres` WHERE `id`=:id';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $nomGenre = $query->fetch(PDO::FETCH_ASSOC);    
            ?>
            <p class="genreJeux"><?= $nomGenre["nom"] ?></p>
            <?php } ?>            
            </td>
            <td>Actions</td>
        </tr>
    <?php } ?>
    </tbody>
<?php } 

    if($_GET['tab'] == "salons"){

        $sql = 'SELECT * FROM `salons` ';
        $query = $db->prepare($sql);
        $query->execute();
        $listSalons = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Description</td>
        <td>Id du Jeux sujet</td>
        <td>Actions</td>
    </tr>
</thead>
<tbody>
<?php
    foreach ($listSalons as $salon) {
    ?>
    
        <tr>
            <td><?= $salon['id'] ?></td>
            <td><a href="?page=salon&id=<?= $salon['id'] ?>"><?= $salon['nom'] ?></a></td>
            <td ><?= $salon['description'] ?></td>
            <td><?= $salon['id_jeux'] ?></td>
            <td>Actions</td>
        </tr>
    <?php } ?>
</tbody>
<?php }
echo "</table>";
} 
require_once('bdd/close.php');
?>