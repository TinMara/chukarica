<?php
    session_start();
?>
<html>
    <head>
        <title>Chukarica</title>
        <link rel="icon" href="./images/sat.png">

        <!-- CSS -->
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/starting.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="./css/cart.css">
        <link rel="stylesheet" href="./css/contact.css">

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
        <header><?php require_once("./php/header.php");?></header>
        <main>
            <?php
                $page=$_GET['page'];
                if(!isset($page)) {
                    die(header("Location: index.php?page=starting"));
                }else if($page === "starting"){
                    require_once("./php/starting.php");
                }else if($page === "shop"){
                    require_once("./php/pages/shop.php");
                }else if($page === "players"){
                    require_once("./php/pages/players.php");
                }else if($page === "contact"){
                    require_once("./php/pages/contact.php");
                }else if($page === "login"){
                    require_once("./php/pages/login.php");
                }else if($page === "cart"){
                    require_once("./php/pages/cart.php");
                }
                else if($page === "registration"){
                    require_once("./php/pages/registration.php");
                }
                else if($page === "account"){
                    require_once("./php/pages/account.php");
                }
            ?>
        </main>
        <footer><?php require_once("php/footer.php");?></footer>
    
        <!-- JavaScript-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="./js/script.js"></script>
    </body>
</html>