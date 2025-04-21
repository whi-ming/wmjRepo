<?php include "../includes/dbh.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../../back/assets/images/smile.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link rel="stylesheet" href="../assets/css/back.css">
</head>
<body>
    <div class="page-content">
        <div class="title-wrapper">
            <h1>create group</h1>
            <a href="../index.php"> < back</a>
        </div>
        <main>
            <form action="form.php" method="post" enctype="multipart/form-data">
                <label for="title">group title</label>
                <input type="text" id="title" name="title">
                
                <label for="image">image</label>
                <input type="file" name="image" id="image">

                <button type="submit">save</button>
            </form>
        </main>
    </div>
</body>
</html>