<?php include "../path.php"; ?>
<?php include ROOT_PATH . "/back/includes/dbh.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ROOT_PATH . '/front/includes/head.php'; ?>
    <title>works</title>
    <link rel="stylesheet" href="assets/css/works.css?version=10">
</head>
<body>
    <div class="loader"></div>
    <div class="page_wrapper">
        <a class="back" href="index.php">back</a>
        <div class="content">
            <div class="title_container">
                <img class="title" src="assets/images/titles/works.png" alt="oops">
            </div>
            <div class="thumbnail_containers">
                <div class="column_1">
                    <?php 
                        $count = 0;
                        foreach ($groups as $group):
                            if($count < 3):
                    ?>
                        <div class="overlay">
                            <a href="pages/group.php?group_id=<?php echo $group['id']?>">
                            <span class="group_title"><?php echo $group['title'] ?></span>
                                <img src="<?php echo BASE_URL . 'back/assets/images/groups/' . $group['title'] . '/' . $group['image'] ?>" alt="">
                            </a>
                        </div>
                    <?php 
                            endif;
                            $count++;
                        endforeach;
                    ?>                
                </div>
                <div class="column_2">
                <?php 
                        $count = 0;
                        foreach ($groups as $group):
                            if($count > 2):
                    ?>
                        <div class="overlay">
                            <a href="pages/group.php?group_id=<?php echo $group['id']?>">
                            <span class="group_title"><?php echo $group['title'] ?></span>
                                <img src="<?php echo BASE_URL . 'back/assets/images/groups/' . $group['title'] . '/' . $group['image'] ?>" alt="">
                            </a>
                        </div>
                    <?php 
                            endif;
                            $count++;
                        endforeach;
                    ?>           
                </div>
            </div>
        </div>
        <?php include ROOT_PATH . "/front/includes/footer.php"; ?>

        
    </div>
    

</body>
</html>