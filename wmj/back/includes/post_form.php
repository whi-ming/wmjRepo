<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $topic = $_POST["topic"];
    $body = $_POST["body"];
    $material_used = $_POST["material_used"];
    $thumbnail = $_FILES['thumbnail']['name'];
    $group_name = $_POST['group_name'];
    $publish = 0;
    $publish = $_POST["publish"];

    $image_dir = '../assets/images/posts/'.$title;
    mkdir($image_dir, 0777, true);

    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO posts (title, topic, body, material_used, thumbnail, publish, group_name) VALUES (?,?,?,?,?,?,?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$title, $topic, $body, $material_used, $thumbnail, $publish, $group_name]);

        $folder  = $image_dir . '/';

        $names = $_FILES['images']['name'];
        $tmp_names = $_FILES['images']['tmp_name'];


        $files_array = array_combine($tmp_names, $names);

        foreach ($files_array as $tmp_folder => $image_name) {
            move_uploaded_file($tmp_folder, $folder . $image_name);
        }

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