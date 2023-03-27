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
        $listUtilisateur = $query->fetchAll(PDO::FETCH_ASSOC);
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
    foreach ($listUtilisateur as $utilisateur) {
    ?>
    
        <tr>
            <td><?= $utilisateur['id'] ?></td>
            <td><?= $utilisateur['nom'] ?></td>
            <td class="adminDescription"><p><?= $utilisateur['e-mail'] ?></p></td>
            <td><img src="images/imageJeu/<?= $utilisateur['image'] ?>" class="imageListAdmin"></td>
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
            <td><?= $jeu['nom'] ?></td>
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
            
            //Lecture de la BDD (table Genre) WHERE id = id
            
            
            } ?>
            </td>
            <td>Actions</td>
        </tr>
    <?php } ?>
    </tbody>

<?php } 

    if($_GET['tab'] == "salons"){
?>
<thead></thead>
<tbody></tbody>
<?php }
echo "</table>";
} 
require_once('bdd/close.php');
?>