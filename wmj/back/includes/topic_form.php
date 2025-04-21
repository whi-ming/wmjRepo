<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $topic = $_POST["topic"];
    
    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO topics (title) VALUES (?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$topic]);      

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        echo "succes";
        die();

    } catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    echo "fail";
}