<header class="header__connected">
    <div class="disconnect">
        <a href="connect.php?disconnect"> <svg id="Calque_2" data-name="Calque 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.15 12"><defs><style>.cls-3{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;}  .cls-4{fill:#fff;fill-rule:evenodd;}</style></defs><title>Sans titre - 1</title><line class="cls-3" x1="5.12" y1="0.5" x2="5.12" y2="6.88"/><path class="cls-4" d="M13.61,370.78a5.07,5.07,0,1,0,3,.07v1.07a4.08,4.08,0,1,1-3-.09Z" transform="translate(-9.92 -368.74)"/></svg>
        </a>
    </div>
    <div class="header__logo">
        <a href="../index.php">
            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.08 89.53">
                <defs>
                </defs>
                <title>Logo</title>
                <g id="Calque_1-2" data-name="Calque 1-2">
                    <path class="cls-1" d="M0,7.12a7.12,7.12,0,1,1,7.12,7.12A7.12,7.12,0,0,1,0,7.12ZM27.38,31.8V89C15.67,87,6.88,78.83,6.67,65.82h0V21H27.38Zm.2-17.56A7.12,7.12,0,1,1,34.7,7.12a7.12,7.12,0,0,1-7.12,7.12Zm6.87,75.29H33.33V71.81a5.25,5.25,0,0,0,.79.06,6.67,6.67,0,0,0,0-13.31,5.25,5.25,0,0,0-.79.06V41.18h1.12c14.71,0,26.63,8.81,26.63,24.19S49.16,89.53,34.45,89.53Z" transform="translate(0 0)" />
                </g>
            </svg></a>
    </div>
    <p class="bold">Bienvenue</p>
    <div class="line"></div>
    <p class="username"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] . " (" . $_SESSION['user']['customer_name'] . ")";?></p>

</header>
<?php
if(isset($_GET['disconnect'])) {
    $user->disconnect();
}
?>
<section class="connected">
    <div class="options">
        <?php
        $user->checkingRank();
        ?>
    </div>

    <a href="">
        <div class="button">accéder à mes identifiants</div>
    </a>

    <a href="">
        <div class="button">accéder à mon Google Analytics</div>
    </a>

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