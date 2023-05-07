
<?php
session_start();
if ($_SESSION['name'] == NULL) 
        {
          header('Location: index.php');
        }
echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>";
include "config.php";
include "header.php";
echo "Just nu är  " . $_SESSION["name"] ."  inloggad <br>";
if($_SESSION['name'] != NULL){
    echo "<a href='logout.php' class='btn btn-dark'>Logga ut</a>";
}
include "footer.php";



?>
    