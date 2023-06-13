<?php
require_once('bdd/connect.php');

$sql = 'SELECT * FROM `jeux` ';
$query = $db->prepare($sql);
$query->execute();
$listJeux = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Liste de Jeu</h2>
<?php
foreach ($listJeux as $jeu) {
?>
    <a class="lienVersJeu" href="?page=jeu&id=<?= $jeu['id'] ?>">
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
                    <?php
                        $id = $jeu['id'];
                        $sql = 'SELECT `id` FROM `genrejeu` WHERE `id_jeux`=:id';
                        $query = $db->prepare($sql);
                        $query->bindValue(':id', $id);
                        $query->execute();
                        $genreJeu = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach($genreJeu as $genre)
                        {
                            $idGenre = $genre['id'];
                            $sql = 'SELECT * FROM `genres` WHERE `id`=:id';
                            $query = $db->prepare($sql);
                            $query->bindValue(':id', $idGenre);
                            $query->execute();
                            $nomGenre = $query->fetch(PDO::FETCH_ASSOC);
                            echo '<p class="tagJeuUn">'.$nomGenre["nom"].'</p>';
                        }
                    ?>
                    </div>
                    <p class="description">
                        <?= $jeu['description'] ?>
                    </p>
                </div>
            </div>
        </div>
    </a>    
<?php } 
require_once('bdd/close.php');
?>