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
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <br>
    <label for="userN"><b>Username</b></label>
    <input type="string" placeholder="Enter username" name="userN" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     <br>
     <input type="submit" value="submit" name="submit">
</form>
</body>
</html>
    <?php
    require_once "config.php";
    if(isset($_POST["submit"])) {
        $username = $_POST["userN"];
        $password = $_POST["psw"];
        if($username == "" || $password == ""){
            die("could not save data, please try again later");
        }
        else{
            $stmt = $conn->prepare("SELECT * FROM inloggning WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $results = $stmt->get_result();
            if($results -> num_rows === 0){
                $sql = "INSERT INTO inloggning (username, passwrd)
                VALUES ('$username', '$password')";
    
                $result = $conn->query($sql);
                if ($result == TRUE) {
                    echo "New recrod created successfully.";
                }
                else {
                    echo "Error:". $sql . "<br>". $conn->error;
                }
                header('Location: MainPage.php');
            }
           else{
                die("username already exists");
           }
        }
        $conn->close();
       
    }
    echo "<br><a href='index.php'>Click here to loggin-->Loggin here<--</a>";
?>

   