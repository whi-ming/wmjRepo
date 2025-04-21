<?php include "../../path.php"; ?>
<?php include ROOT_PATH . "/back/includes/dbh.inc.php"; ?>
<?php 
    if(isset($_GET['id'])){
        $current_id = $_GET['id'];

        $res = $pdo->prepare("SELECT * FROM posts WHERE id = $current_id");
        $res->execute();
        $post = $res->fetch(PDO::FETCH_ASSOC);
    }else{
        echo "nah";
    }
    $link_back = BASE_URL . "front";
    if(isset($_GET['admin'])){
        $link_back = BASE_URL . "back";
    }
    if(isset($_GET['update'])){
        $link_back = BASE_URL . "back/post/update.php?id=" . $current_id;
    }
    if(isset($_GET['group_id'])){
        $group_id = $_GET['group_id'];
        $link_back = BASE_URL . "front/pages/group.php?group_id=" . $group_id;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ROOT_PATH . '/front/includes/head.php'; ?>
    <title>post1</title>
</head>
<body>
    <div class="page-wrapper">
        <div class="title-wrapper">
            <h1><?php echo $post['title']?></h1>
            <a href="<?php echo $link_back?>"> < back</a>
        </div>
        <div class="post">
            <div class="details">
                <div class="image">
                    <img 
                        style="width:300px"
                        src="../../back/assets/images/posts/<?php echo $post['title'] .'/'. $post['thumbnail'];?>" 
                        alt="">
                </div>
                <div class="date">
                <?php echo $post['created_at']; ?>
                </div>
                <ul class="topics">
                    <li>
                        <a href="#"><?php echo $post['topic']; ?></a>
                    </li>
                </ul>
            </div>
            <div class="body">
            <?php echo $post['body']; ?> 
            <div class="materials">
                <?php echo $post['material_used']; ?>
            </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>