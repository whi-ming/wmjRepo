<?php

$dsn = "mysql:host=localhost;dbname=testin2";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}

$res = $pdo->prepare("SELECT * FROM posts");
$res->execute();
$posts = $res->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM topics");
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM groups");
$stmt->execute();
$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);