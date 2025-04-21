<?php include "../includes/dbh.inc.php"; ?>

<?php 
    if(isset($_GET['id'])){
        $current_id = $_GET['id'];

        $result = $pdo->prepare("SELECT * FROM posts WHERE id = $current_id");
        $result-> execute();
        $post = $result->fetch(PDO::FETCH_ASSOC);
    }else{
        echo "nah";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../../back/assets/images/smile.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="../assets/css/back.css?version=2">
</head>
<body>
    <div class="page-content">
        <div class="title-wrapper">
            <h1>update: <?php echo $post['title']?></h1>
            <a href="../index.php"> < back</a>
        </div>
        <main>
            <img src="../assets/images/posts/<?php echo $post['title'] .'/'. $post['thumbnail'];?>" alt="" style="width:400px; height:400px; margin-left: 30px;">

            <form action="../includes/update_form.php?id=<?php echo $post['id']; ?>" method="post" enctype="multipart/form-data">
                
                <label for="title">title</label>
                <input type="text" id="title" name="title" value="<?php echo $post['title'] ; ?>">


                <label for="topic">topic</label>
                <select name="topic" id="topic">
                    <option></option>
                    <?php
                        foreach ($topics as $topic):  
                    ?>
                        <?php if ($post['topic'] == $topic['title']):?>
                            <option selected value="<?php echo $topic['title'];?>"><?php echo $topic['title'];?></option>
                        <?php else: ?>
                                <option value="<?php echo $topic['title'];?>"><?php echo $topic['title'];?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                

                <label for="body">body</label>
                <textarea name="body" id="body" placeholder=" ..."><?php echo $post['body'] ; ?></textarea>


                <label for="material_used">material used</label>
                <input type="text" id="material_used" name="material_used" value="<?php echo $post['material_used'] ; ?>">
                

                <img src="../assets/images/posts/<?php echo $post['title'] .'/'. $post['thumbnail'];?>" alt="thumbnail" style="width:100px;">
                <label for="thumbnail">thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
                

                <div class="images_container">
                    <?php 
                    $files = scandir('../assets/images/posts/' . $post['title']);
                    $array = array();
                    foreach($files as $file){
                        $array[] = $file;
                    }
                    for ($i=2; $i < count($array); $i++):
                    ?>
                    <a href="delete.php?post_id=<?php echo $post['id']?>&file_name=<?php echo $array[$i]?>" class="change">
                        <span>remove</span>
                        <img src="../assets/images/posts/<?php echo $post['title'] .'/'. $array[$i];?>" alt="oops" style="width:100px;">
                    </a>
                    <?php endfor; ?>
                </div>
                <label for="images">images</label>
                <input type="file" name="images[]" id="images" multiple>
                

                <label for="group_name">group</label>
                <select name="group_name" id="group_name">
                    <option></option>
                    <?php
                        foreach ($groups as $row):  
                    ?>
                        <?php if ($post['group_name'] == $row['title']):?>
                            <option selected value="<?php echo $row['title'];?>"><?php echo $row['title'];?></option>
                        <?php else: ?>
                                <option value="<?php echo $row['title'];?>"><?php echo $row['title'];?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <div class="publish-wrapper">
                    <label for="publish">publish</label>
                    <?php if ($post['publish'] == 0):?>
                        <input type="checkbox" name="publish" id="publish" value="1">
                    <?php else: ?>
                        <input type="checkbox" name="publish" id="publish" value="1" checked>
                    <?php endif; ?>
                </div>


                <button type="submit">save</button>
                <a class="trash" href="delete.php?post_id=<?php echo $post['id'] ?>">delete</a>
            </form>           
            <a 
            href="../../front/pages/post.php?id=<?php echo $post['id'] . "&update=1";?>"
            >view</a>
            <!-- <a 
            href="/front/pages/post.php?id="<?php echo $post['id']?>
            >view</a> -->
        </main>
    </div>
</body>
</html>