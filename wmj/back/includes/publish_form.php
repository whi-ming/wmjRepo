<?php 
    include "../post/update.php";
?>
<?php 
    if(isset($_GET['id'])){
        $current_id = $_GET['id'];
        $publish = 0;
        if ($post['publish'] == 0){
            $publish = 1;
        }

        $res = $pdo->prepare("UPDATE posts SET publish = :publish WHERE post_id = $current_id");
        $res->bindParam(":publish", $publish);
        $res->execute();
    
        $pdo = null;
        $stmt = null;
        echo "success";
        
        header("Location: ../index.php");
        die();
    }else{
        echo "nah";
    }
    
?>
