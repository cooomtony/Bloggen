<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
        <br>
        <label for="mainText">Main Text</label>
        <input type="text" id="mainText" name="mainText">
        <br>
        <input type="file" name="bild" id="bild">
        <input type="submit" value="Visa" name="visa">
    </form>


    <?php

        if(isset($_POST['visa'])){
            $title = $_POST['title'];
            $mainText = $_POST['mainText'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["bild"]["name"]);
            move_uploaded_file($_FILES["bild"]["tmp_name"], $target_file);
            echo "<br> $title <br> $mainText <br>";
            echo "<img src='$target_file' alt='text'";
        }
    ?>
    </body>
</html>