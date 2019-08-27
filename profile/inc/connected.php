<?php include('header.php') ?>


<section class="connected">
    <div class="options">
        <?php
        $user->checkingRank();
        ?>
    </div>

    <span class="need_help--paragraph">Les Baï-Bao qui
      s’occupent de vous</span>
    <div class="round"></div>
    <div class="need_help">
        <div class="need_help_item">
            <img src="../assets/profile/yves.png" alt="yves">
            <span class="bold">Yves</span>
            <p> <span>yves.milon@bai-bao.fr</span></p>
        </div>
        <div class="need_help_item">
            <img src="../assets/profile/zeo.png" alt="zoe">
            <p> <span class="bold">Zoé</span></p>
            <p> <span>zoe.franch@bai-bao.fr</span></p>
        </div>
    </div>
</section>