<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method ="post">
    <h1>Loggin</h1>
    <p>Please fill in the slots to loggin.</p>
    <br>
    <label for="userN"><b>Username</b></label>
    <input type="string" placeholder="Enter username" name="userN" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     <br>
     <input type="submit" value="submit" name="submit">
     <br>
     <a href="signup.php">Register here</a>
</form>
</body>
</html>
    <?php
    include "config.php";
    if(isset($_POST["submit"])) {
        $username = $_POST["userN"];
        $password = $_POST["psw"];
        if($username == "" || $password == ""){
            
            die("your form is empty please fill it in");
        }
        else{
            $stmt = $conn->prepare("SELECT * FROM inloggning WHERE username = ? AND passwrd = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result -> num_rows === 1){
                $_SESSION["name"] = $username;
                header('Location: MainPage.php');
            }
            else{
                die('sorry but either the password or username were wrong');
                
            }
           
        }
        $conn->close();
       
    
    }