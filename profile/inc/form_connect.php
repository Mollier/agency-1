<header>
    <div class="header__logo">
        <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.08 89.53">
            <defs>
            </defs>
            <title>BB-logo-B</title>
            <g id="Calque_1-2" data-name="Calque 1-2">
                <path class="cls-1" d="M0,7.12a7.12,7.12,0,1,1,7.12,7.12A7.12,7.12,0,0,1,0,7.12ZM27.38,31.8V89C15.67,87,6.88,78.83,6.67,65.82h0V21H27.38Zm.2-17.56A7.12,7.12,0,1,1,34.7,7.12a7.12,7.12,0,0,1-7.12,7.12Zm6.87,75.29H33.33V71.81a5.25,5.25,0,0,0,.79.06,6.67,6.67,0,0,0,0-13.31,5.25,5.25,0,0,0-.79.06V41.18h1.12c14.71,0,26.63,8.81,26.63,24.19S49.16,89.53,34.45,89.53Z" transform="translate(0 0)" />
            </g>
        </svg>
    </div>
    <a href="../index.php">retour au site</a>
</header>

<section class="connect">


    <?php
    if(isset($_SESSION['user'])) {
        header("Location: ../connect.php");
    } else {
        if(isset($_POST['send'])) {
            $user->connect($pdo);
        }
    }
    ?>
    <form action="#" method="post">
        <p> <input type="text" name="email" placeholder="email"></p>
        <p><input type="password" name="password" placeholder="mot de passe"></p>
        <p><input type="submit" name="send" value="accéder"></p>
        <?php  $alert->showAlert(); ?>
    </form>

</section>