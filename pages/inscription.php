<?php
require_once('bdd/connect.php');

$erreur = "";

if (isset($_POST)){
    if(isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['mail']) && !empty($_POST['mail'])
    && isset($_POST['mdp']) && !empty($_POST['nom'])
    && isset($_POST['date']) && !empty($_POST['date'])){

        $nom = strip_tags($_POST['nom']);
        $mail = strip_tags($_POST['mail']);

        $sql = 'SELECT * FROM `utilisateurs` WHERE `nom`=:nom OR `e-mail`=:mail';
        $query = $db->prepare($sql);
        $query->bindValue(':nom', $nom);
        $query->bindValue(':mail', $mail);
        $query->execute();
        $info = $query->fetch(PDO::FETCH_ASSOC);

        if(empty($info))
        {
            $nom = strip_tags($_POST['nom']);
            $mail = strip_tags($_POST['mail']);
            $mdp = strip_tags($_POST['mdp']);
            $date = strip_tags($_POST['date']);

            $sql = "INSERT INTO `utilisateurs`(`nom`, `e-mail`, `image`, `information`, `connexion`, `mdp`, `role`) VALUES (:nom,:mail,'',:date,'1',:mdp,'0')";

            $query = $db->prepare($sql);
            $query->bindValue(':nom', $nom);
            $query->bindValue(':mail', $mail);
            $query->bindValue(':mdp', $mdp);
            $query->bindValue(':date', $date);
            $query->execute();

            $id = $db->lastInsertId();

            $_SESSION['id'] = $id;
            $_SESSION['connecter'] = true;
            $_SESSION['role'] = 0;

            header('Location: index.php');
        }
        else 
        {
          $erreur = "Cet identifiant ou/et cet e-mail sont déjà utilisé !";
        }    
    }
}

require_once('bdd/close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inscription.css">
    <title>page d'Inscription</title>
</head>
<body>
<h1>Inscription</h1>
<?php
    if(!empty($erreur)){?>
    <p class="erreur">
        <?= $erreur ?>
    </p>
<?php } ?>
<form action="" method="post" class="inscription">
    <div class="nom">
        <label for="nom"> Pseudo : </label>
        <input type="text" name="nom" id="nom" required><br>
    </div>
    <div class="mail">
        <label for="mail"> e-mail : </label>
        <input type="email" name="mail" id="mail" required><br>
    </div>
    <div class="mdp">
        <label for="mdp"> Mot de Passe : </label>
        <input type="password" name="mdp" id="mdp" required><br>
    </div>
    <div class="date">
        <label for="date"> Date de naissance : </label>
        <input type="date" name="date" id="date" required><br>
    </div>
    <div class="CGU">
        <input type="checkbox" name="CGU" id="CGU" required>
        <label for="CGU"> J'ai lu et je consent au CGU</label>
    </div>
    <input type="submit" value="S'inscrire">
</form>
<a href="index.php"><button class="retour">Retour</button></a>
</body>
</html>
