<?php

require_once('bdd/connect.php');

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])
&& isset($_POST['mdp']) && !empty($_POST['mdp']))
{
    $sql = 'SELECT * FROM `utilisateurs` ';
    $query = $db->prepare($sql);
    $query->execute();
    $listUtilisateur = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($listUtilisateur as $user)
    {
        if ($_POST['pseudo'] == $user['nom'] && $_POST['mdp'] == $user['mdp']) {
            $_SESSION["connecter"] = true;
            $_SESSION["id"] = $user['id'];
        }
    }

    if($_SESSION["connecter"] == true){
        header("location:index.php");
    }
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
    <title>page de connection</title>
</head>
<body>
    <h1>Authentification</h1>
    <form action="" method="post">
        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo">
        <label for="mdp">mdp : </label>
        <input type="text" name="mdp" id="mdp">
        <input type="submit" value="connexion">
    </form>
    <a href="pages/inscription">inscription</a>
</body>
</html>