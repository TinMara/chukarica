<?php
    function formPrint() {
        echo '<div class="container">
        <div class="row">
            <div class="col">
                <div class="form-contact">
                    <div class="form-borders">
                        <h1>Contact us</h1>
                        <form method="POST">
                            <h2>Name:</h2>
                            <input type="text" class="name" name="name" placeholder="Your name" required>
                            <h2>Surname:</h2>
                            <input type="text" class="name" name="surname" placeholder="Your surname" required>
                            <h2>Email</h2>
                            <input type="text" class="email" name="email" placeholder="your@email.com" required>
                            <h2>Phone number:</h2>
                            <input type="text" class="number" name="number" placeholder="+3859/995-6189" required>
                            <h2>Message</h2>
                            <textarea name="message" id="message" cols="20" rows="1" placeholder="Your message"></textarea><br>
                            <input id="submit-contact" type="submit" class="btn btn-dark">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>';
    }
    if($_GET['page'] == "contact") {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_var($_POST["name"], FILTER_UNSAFE_RAW );
        $surname = filter_var($_POST["surname"], FILTER_UNSAFE_RAW );
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $phone_number = filter_var($_POST["number"], FILTER_UNSAFE_RAW );
        $message = filter_var($_POST["message"], FILTER_UNSAFE_RAW );
      
      
        $namePrint = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $surnamePrint = htmlspecialchars($surname, ENT_QUOTES, 'UTF-8');
        $numberPrint = htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8');
        $emailPrint = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $messagePrint = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    
        }
      }
    

        if(!isset($_SESSION["username"])){
            echo '<div class="container">
                <div class="row">
                    <div class="col>
                        <div class="heading-contact" style="display:grid;justify-content:center;align-items:center;margin:20px;">
                            <h1 class="text-danger">Sorry, but you have to be log in!</h1>
                            <img src="./images/nologin.png" style="width:600px;height:600px;">
                        </div>
                    </div>
                </div>
            </div>';
        }if(isset($_SESSION["username"])) {
            formPrint();
        }
        $flag = true;
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(preg_match("/^\+3859\d\/\d{3}-\d{3,4}$/", $phone_number) == false && filter_var($email, FILTER_VALIDATE_EMAIL) == false){
                echo "<div class='text-center text-danger'>Invalid <b>phone number</b> and <b>e-mail</b> address!</div>";
                $flag = false;
            } else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                echo "<div class='text-center text-danger'>Invalid <b>e-mail</b> address!</div>";;
                $flag = false;
            } else if(preg_match("/^\+3859\d\/\d{3}-\d{3,4}$/", $phone_number) == false) {
                echo "<div class='text-center text-danger'>Invalid <b>phone</b> number!</div>";;
                $flag = false;
            }

            if($_GET['page'] == "contact" && $_SERVER["REQUEST_METHOD"] == "POST" && $flag == true) {
                echo 
                "
                <div>
                    <div class='text-success'><h6>Your message has been sent <b>successfuly!</b></h6></div>
                    <div class='text-success'><h6><b>Name:</b> <i>". $namePrint . "</i></h6></div>
                    <div class='text-success'><h6><b>Surname:</b> <i>". $surnamePrint . "</i></h6></div>
                    <div class='text-success'><h6><b>E-mail:</b> <i>". $emailPrint . "</i></h6></div>
                    <div class='text-success'><h6><b>Phone number:</b> <i>". $numberPrint . "</i></h6></div>
                    <div class='text-success'><h6><b>Message:</b> <i>". $messagePrint . "</i></h6></div>
                </div>
                ";

            }
        }

?>