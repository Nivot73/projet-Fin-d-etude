<?php

require_once('bdd/connect.php');

$erreur = "";

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])
&& isset($_POST['mdp']) && !empty($_POST['mdp']))
{
    $nom = strip_tags($_POST['pseudo']);
    $mdp = strip_tags($_POST['mdp']);

    $sql = 'SELECT * FROM `utilisateurs` WHERE `nom`=:nom AND `mdp`=:mdp';
    $query = $db->prepare($sql);
    $query->bindValue(':nom', $nom);
    $query->bindValue(':mdp', $mdp);
    $query->execute();
    $infoUtilisateur = $query->fetch(PDO::FETCH_ASSOC);

    if(!empty($infoUtilisateur))
    {
        $_SESSION["connecter"] = true;
        $_SESSION["id"] = $infoUtilisateur['id'];
        $_SESSION['role'] = $infoUtilisateur['role'];

        $id = strip_tags($infoUtilisateur['id']);

        $sql = "UPDATE `utilisateurs` SET `connexion` = '1' WHERE `id`=:id";
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();

        header("location:index.php");
    }
    else {  $erreur = "IDENTIFIANT ou MOT DE PASSE erroné"; }
}
else {
    session_destroy();
}

require_once('bdd/close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connexion.css">
    <title>page de connection</title>
</head>
<body>
    <?php
    if(!empty($erreur)){?>
    <p class="erreur">
        <?= $erreur ?>
    </p>
    <?php } ?>
    <div class="logo"></div>
    <form action="" method="post">
        <div class="pseudo">
        <label for="pseudo">IDENTIFIANT : </label><br>
        <input type="text" name="pseudo" id="pseudo" class="input">
        </div>
        <div class="mdp">
        <label for="mdp">MOT DE PASSE : </label><br>
        <input type="password" name="mdp" id="mdp" class="input">
        </div>
        <input type="submit" value="Connexion" class="connexion">
    </form>
    <a href="?page=inscription"><button class="inscription">Inscription</button></a>
</body>
</html>