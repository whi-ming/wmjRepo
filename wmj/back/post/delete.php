<?php 
    include "../includes/dbh.inc.php";
?>
<?php
    $sendOff;
    if(isset($_GET['post_id'])){
        $sendOff =  'post_id='. $_GET['post_id'];
        if (isset($_GET['file_name'])){
            $sendOff = $sendOff . '&file_name='. $_GET['file_name'];
        }

    }elseif (isset($_GET['topic_id'])){
        $sendOff =  'topic_id='. $_GET['topic_id'];
    }else{
        echo "nah";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm delete</title>
    <link rel="stylesheet" href="../assets/css/back.css?version=3">
</head>
<body>
    <div class="page-content">
        <div class="warning">
        <h1>warning</h1>
        <br>
        will be lost forever <br>
        Delete?
        <div class="confirm_buttons">
            <a href="../index.php" class="edit">cancel</a>
            <a 
            href="../includes/delete_form.php?<?php echo $sendOff; ?>" class="trash">delete</a>
        </div>
        </div>

    </div>
</body>
</html>