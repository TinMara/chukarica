<div class="container-fluid">
    <div class="row">
        <div class="heading-top-picks">
            <h1>Our items</h1>
        </div>
        <?php $pdo=require_once("./php/connect/connect.php");
            $sql="SELECT * FROM store";
            $statement=$pdo->query($sql);
            $result=$statement->fetchAll();
            if($result){
                foreach($result as $key){
                    echo' <div class="col">
                    <section class="items-section">
                        <div class="items">
                            <img src="'. $key["image_url"] .'"><br>
                            <span><b>'. $key["name"].'</b></span> <br>
                            <span>'. $key["price"] .'</span> <br><br>
                            <form method="post">
                                <input type="submit" name="addtocart" value="Add to card">
                            </form>
                        </div>
                    </section>
                </div>';
                }
            }
        ?>
    </div>
</div>