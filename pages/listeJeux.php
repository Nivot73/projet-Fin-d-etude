<?php
require_once('bdd/connect.php');

$sql = 'SELECT * FROM `jeux` ';
$query = $db->prepare($sql);
$query->execute();
$listJeux = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('bdd/close.php');
?>

<h2>Liste de Jeu</h2>

<?php
foreach ($listJeux as $jeu) {
?>
    <a href="?page=jeu&id=<?= $jeu['id'] ?>">
        <div class="jeu">
            <div class="image">
                <img src="images/imageJeu/<?= $jeu['image'] ?>">
            </div>    
            <div class="descriptionJeu">
                <div class="titreJeu">
                    <p class="titre"> <?= $jeu['nom'] ?> </p>
                    <p class="dateSortie"><?= $jeu['date_de_sortie'] ?></p>
                </div>
                <div class="boiteInfo">
                    <div class="tags">
                        <p>des tags à foison</p>
                    </div>
                    <p class="description">
                        <?= $jeu['description'] ?>
                    </p>
                </div>
            </div>
        </div>
    </a>    
<?php } ?>