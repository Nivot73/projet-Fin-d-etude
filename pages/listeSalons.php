<?php
require_once('bdd/connect.php');

$sql = 'SELECT * FROM `salons` ';
$query = $db->prepare($sql);
$query->execute();
$listSalons = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Liste des Salons</h2>
<?php
foreach ($listSalons as $salon) {

    $id = $salon['id'] ;

    $sql = 'SELECT `id` FROM `genrejeu` WHERE `id`=:id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $inscrit = $query->fetchAll(PDO::FETCH_ASSOC);

    $nbInscrit = count($inscrit);
?>
<a href="?page=salon&id=<?= $salon['id'] ?>" class="lienVersSalon">
    <img src="images/imageSalon/<?= $salon['image'] ?>" alt="">
    <div>
        <div class="listSalonBlockNom">
            <p><?= $salon['nom'] ?></p>
            <p>Nb inscrit : <?= $nbInscrit ?></p>
            <p><?= $salon['date_creation'] ?></p>
        </div>
        <p><?= $salon['description'] ?></p>
    </div>
</a>
<?php } 
require_once('bdd/close.php');
?>