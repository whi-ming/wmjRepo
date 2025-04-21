<?php include "../../path.php"; ?>
<?php include ROOT_PATH . "/back/includes/dbh.inc.php"; ?>
<?php 
    if(isset($_GET['group_id'])){
        $current_id = $_GET['group_id'];

        $res = $pdo->prepare("SELECT * FROM groups WHERE id = $current_id");
        $res->execute();
        $group = $res->fetch(PDO::FETCH_ASSOC);
    }else{
        echo "nah";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ROOT_PATH . '/front/includes/head.php'; ?>
    <title><?php echo $group['title']?></title>
    <link rel="stylesheet" href="../assets/css/group.css?version=1">
</head>
<body>
    <div class="page-wrapper">
        <a class="back" href="../2_works.php">back</a>
        <div class="grid-container">
            <?php 
                foreach ($posts as $post):
                    if($post['group_name'] === $group['title']):
            ?>
                <a class="post" href="post.php?id=<?php echo $post['id'] . "&group_id=" . $group['id'] ?>">
                    <img src="<?php echo BASE_URL . '/back/assets/images/posts/' . $post['title'] . '/' . $post['thumbnail']; ?>" alt="">
                </a>
            <?php 
                endif;
                endforeach; 
            ?>
        </div>
    </div>
</body>
</html>