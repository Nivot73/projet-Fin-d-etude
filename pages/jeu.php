<?php
require_once('bdd/connect.php');

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];

    $sql = 'SELECT * FROM `jeux` WHERE `id`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $jeu = $query->fetch(PDO::FETCH_ASSOC);

    if (empty($jeu)){
        header("location:index.php");
    }
}
else{
    header("location:index.php");
}

require_once('bdd/close.php');
?>

<div class="infoJeu">
    <img src="images/imageJeu/<?= $jeu['image'] ?>" alt="">
    <div>
        <p>TITRE : <?= $jeu['nom'] ?></p>
        <div>
            <button>favori</button>
            <button>demande ami</button>
        </div>
    </div>
    <div class="tagJeu"></div>
    <p>Description : <?= $jeu['description'] ?></p>
</div>
<div class="listDansJeu"></div>