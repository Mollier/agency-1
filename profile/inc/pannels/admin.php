<?php
if($_SESSION['user']['rights'] != 10) {
    header('Location: index.php');
}
?>
<div class="connected__item">
    <a href="write.php"><img src="../assets/profile/factures.svg" alt="factures"></a>
    <h4>AJOUT D'UN ARTICLE</h4>
    <p>écrire un nouvel article au site</p>
</div>

<div class="connected__item">
    <a href="real.php"><img src="../assets/profile/factures.svg" alt="factures"></a>
    <h4>AJOUT D'UNE RÉALISATION</h4>
    <p>ajouter une réalisation au site</p>
</div>

<div class="connected__item">
    <a href="clients.php"><img src="../assets/profile/factures.svg" alt="factures"></a>
    <h4>PANNEL DE LISTE DES CLIENTS</h4>
    <p>gérer la liste des clients (infos, mot de passe etc...)</p>
</div>
