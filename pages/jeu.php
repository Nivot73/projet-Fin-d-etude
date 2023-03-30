<?php
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
}
else{
    header("location:index.php");
}
?>

coucou le lien marche
<?= $id ?>