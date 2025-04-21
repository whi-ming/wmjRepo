<?php 
    include "dbh.inc.php";
?>
<?php
    $updating = "";
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];

        $res = $pdo->prepare("SELECT * FROM posts WHERE id = $post_id");
        $res->execute();
        $post = $res->fetch(PDO::FETCH_ASSOC);

        if(isset($_GET['file_name'])){
            $file_name = $_GET['file_name'];
            unlink("../assets/images/posts/". $post['title']."/". $file_name);
        }else{
            $res = $pdo->prepare("DELETE FROM posts WHERE id = $post_id");
            $res->execute();
            $dir = "../assets/images/posts/". $post['title'];
            var_dump(scandir($dir));
            if(empty(scandir($dir))){
                rmdir($dir);
            }else{
                foreach(scandir($dir) as $item){
                    if($item == '.' || $item == '..'){
                        continue;
                    }else{
                        unlink($dir . "/" . $item);
                    }
                }
                rmdir($dir);
            }
 
        }
    }elseif(isset($_GET['topic_id'])){
        $topic_id = $_GET['topic_id'];
        $res = $pdo->prepare("DELETE FROM topics WHERE id = $topic_id;");
        $res->execute();
    }

    $pdo = null;
    $stmt = null;
    if(isset($_GET['file_name'])){
        header("Location: ../post/update.php?id=" . $post_id);
    }else{
        header("Location: ../index.php");
    }    

    die();
?>
