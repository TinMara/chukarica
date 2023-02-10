<?php require_once("./php/pages/visit-counter.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="logo-footer">
                <a href="index.php?page?=starting"><img src="./images/sat.png" alt="logo"></a>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="heading-list">Links</h1>
            <ul class="links">
                <a href="index.php?page=shop"><li>Shop</li></a>
                <a href="index.php?page=contact"><li>Contact us</li></a>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php
            echo'<div class="footer-botton">Broj posjeta:'.getVisitCounter().' | © Tin Marković, 2023 |</div>';
        ?>
    </div>
</div>