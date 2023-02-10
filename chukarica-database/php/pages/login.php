<?php
    function printForm(){
        echo '
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="login-form">
                        <div class="color-div">
                            <h1>Log in</h1>
                            <div class="form-div">
                                <form method="POST">
                                    <h2>Username:</h2>
                                    <input type="text" class="username" placeholder="username" name="username-login"><br>
                                    <h2>Password:</h2> 
                                    <input type="password" class="password" placeholder="*******" name="password-login"><br>
                                    <input name="submit-login"class="btn btn-warning" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    

    if($_GET["page"]=="login"){
        if(!isset($_SESSION["username"])) {printForm();}
        if(isset($_SESSION["username"])){
                echo'<div class="login-successful" style="height:70vh;"><div class="text-center text-success"><h1>You logged in succesful!</h1></div> 
                    <div class="logout">
                        <button class="btn btn-danger" style="margin-bottom:15px;" onclick="logout()">LOGOUT</button>
                        <form method="post">
                            <button class="btn btn-dark" style="margin-bottom:15px;" name="delete-acc">Delete</button>
                            <div>
                                <label for="new_username">New username</label>
                                <input type="text" name="new_username">
                            </div>

                            <div>
                                <label for="new_password">New password</label>
                                <input type="password" name="new_password">
                            </div>
                            <div>
                                <label for="new_email">New email</label>
                                <input type="email" name="new_email">
                            </div>
                            <div>
                                <label for="new_name">New name</label>
                                <input type="text" name="new_name">
                            </div>
                            <div>
                                <label for="new_surname">New surname</label>
                                <input type="text" name="new_surname">
                            </div>
                            <div>
                                <label for="new_address">New address</label>
                                <input type="text" name="new_address">
                            </div>
                            <button type="submit" name="change" class="btn btn-primary">Change</button>
                        </form>
                    </div></div>
                ';
            }
    }
    if($_SERVER["REQUEST_METHOD"]=="POST" && $_GET["page"]=="login"){
        $pdo=require_once("./php/connect/connect.php");
        if(isset($_POST["submit-login"])){
            $username=$_POST["username-login"];
            $pass=$_POST["password-login"];
            $statement=$pdo->query("SELECT * FROM users");
            $result=$statement->fetchAll();
            if($result){
                foreach($result as $row){
                    if($username==$row["username"] && password_verify($pass, $row["password"])){
                        $_SESSION["username"]=$row["username"];
                        echo "Prijavljeni ste kao".$username;
                        die(header("Location:index.php?page=login"));
                    }
                }
            }
        }
        $data=$_SESSION["username"];
        if(isset($_POST["delete-acc"])){
            unset($_SESSION["username"]);
            $sql="DELETE FROM users WHERE username=?";
            $statement=$pdo->prepare($sql);
            $statement->execute(["$data"]);
            die(header("Location:index.php?page=starting"));
        }

        if(isset($_POST["change"])){
            $username=$_POST["new_username"];
            $password=$_POST["new_password"];
            $email=$_POST["new_email"];
            $name=$_POST["new_name"];
            $surname=$_POST["new_surname"];
            $address=$_POST["new_address"];

            $sql="UPDATE users SET username=?, password=?, email=?, name=?, surename=?, address=? WHERE username=?";
            $statement=$pdo->prepare($sql);
            $statement->execute(["$username","$password","$email","$name","$surname","$address","$data"]);

            $_SESSION["username"]=$username;
        }

    }

    if(isset($_GET["action"])){
        if($_GET["action"]=="logout"){
            unset($_SESSION["username"]);
        }
    }
?>

