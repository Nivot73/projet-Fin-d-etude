<aside>
    <div class="logo"></div>
    <ul class="menu">
        <li><a href="?page=accueil"><button class="accueil"><img src="images/icone/accueil.svg">Accueil</button></a></li>
        <li><a href="?page=listeUtilisateur"><button class="amis"><img src="images/icone/amis.svg">Utilisateurs</button></a></li>
        <li><a href="?page=listeJeux"><button class="jeux"><img src="images/icone/jeux.svg">Jeux</button></a></li>
        <li><a href="?page=listeSalons"><button class="salons"><img src="images/icone/salons.svg">Salons</button></a></li>
        <?php
        if ($_SESSION['role'] == 1){ ?>
        <li><a href="?page=admin"><button class="admin"><img src="images/icone/settings.svg"> Page d'amninistration</button></a></li>
        <?php } ?>  
    </ul>
    <p>mesure: width = 1440 px  height = 1024 px</p>
    <p>votre id est <?= $_SESSION['id'] ?></p>
    <p>votre role est <?= $_SESSION['role'] ?></p>
    <a href="?page=deconnexion"><button class="deconnexion"><img src="images/icone/deconnexion.svg" alt="bouton de deconnexion"></button></a>
</aside>