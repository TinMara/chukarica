<div class="container">
  <div class="row">
    <div class="col">
        <div class="login-form">
            <div class="color-div">
                <h1>registration</h1>
                <div class="form-div">
                  <form method="POST">
                  <div>
                    <label for="registration-username">Username:</label>
                    <input type="text" placeholder="username" name="registration-username">
                  </div>
                  
                  <div>
                    <label for="registration-password">Password:</label>
                    <input type="password" placeholder="**********" name="registration-password">
                  </div>
                  
                  <div>
                    <label for="registration-email">Email:</label>
                    <input type="email" placeholder="email@gmail.com" name="registration-email">
                  </div>
                  
                  <div>
                    <label for="registration-name">Name:</label>
                    <input type="text" placeholder="name" name="registration-name">
                  </div>
                  
                  <div>
                    <label for="registration-surname">Surname:</label>
                    <input type="text" placeholder="surname" name="registration-surname">
                  </div>
                  
                  <div>
                    <label for="registration-address">Address:</label>
                    <input type="text" placeholder="address" name="registration-address">
                  </div>
                  <button name="submit-registration" class="btn btn-warning" type="submit">Pošalji</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<?php
  $pdo=require_once("./php/connect/connect.php");
  if(isset($_POST["submit-registration"])){
    $username=$_POST["registration-username"];
    $password=password_hash($_POST["registration-password"], PASSWORD_BCRYPT);
    $email=$_POST["registration-email"];
    $name=$_POST["registration-name"];
    $surname=$_POST["registration-surname"];
    $address=$_POST["registration-address"];
    $sql="INSERT INTO users(username,password,email,name,surename,address,timestamp) VALUE (:username, :password, :email, :name, :surename, :address, NOW())";
    $statement=$pdo->prepare($sql);
    $statement->execute(["username"=> "$username", "password"=>"$password", "email"=> "$email", "name"=> "$name", "surename"=> "$surname", "address"=> "$address", ]);
  }
  //ISPIS SVIH USERA
  // $sql="SELECT * FROM users";
  // $statement=$pdo->query($sql);
  // $result=$statement->fetchAll();
  // if($result){
  //   foreach($result as $row){
  //     echo $row["username"]." | ".$row["password"]." | ".$row["email"]." | ".$row["name"]." | ".$row["surname"]. " | ".$row["address"]."<br>";
  //   }
  // }
?>
