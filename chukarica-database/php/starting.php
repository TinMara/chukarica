<div class="container-fluid">
<div class="row">
        <div class="col">
            <div class="text-part">
                <h1>About us</h1>
                <p>Chukarica is a Croatian watch shop, established in 2022.<br>
        If your are looking for expensive and luxury watches, this is a right place for you.<br>
        Currently we only have three watch brands: Richard Mille, Rolex and AP.<br>
        We have a store in Zagreb and Split, soon we will have it in many other countries<br>
        If you ever come, you will have the best customer service in the world.</p>
            </div>
        </div>
        <div class="col">
            <div class="champions-image-div">
                <img src="./images/lik.jpg" alt="champions" class="champions">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="heading-top-picks">
            <h1>Our TOP watches</h1>
            <h3>Best sellers on our site</h3>
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
