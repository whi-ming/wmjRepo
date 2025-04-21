<?php
include "../includes/dbh.inc.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $image = $_FILES['image']['name'];

    $image_dir = '../assets/images/groups/'.$title;
    mkdir($image_dir, 0777, true);

    try {
        $query = "INSERT INTO groups (title, image) VALUES (?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$title, $image]);

        $folder  = $image_dir . '/';
        $temp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($temp_name, $folder . $image);
        


        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        die();

    } catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}