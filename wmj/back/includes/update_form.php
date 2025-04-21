<?php include "../includes/dbh.inc.php"; ?>

<?php 
    if(isset($_GET['id'])){
        $current_id = $_GET['id'];

        $res = $pdo->prepare("SELECT * FROM posts WHERE id = $current_id");
        $res->execute();
        $post = $res->fetch(PDO::FETCH_ASSOC);
    }else{
        echo "nah";
    }
    
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $topic = $_POST["topic"];
    $body = $_POST["body"];
    $material_used = $_POST["material_used"];
    $thumbnail = $_FILES['thumbnail']['name'];
    $publish = $_POST["publish"];
    $images = $_FILES['images'];
    $group_name = $_POST["group_name"];

    if(empty($thumbnail)){
        $thumbnail = $post['thumbnail'];
    }

    $image_dir = '../assets/images/posts/';

    rename($image_dir . $post['title'], $image_dir . $title);
    
    try {
        $query = "UPDATE posts SET 
        title = :title, 
        topic = :topic, 
        body = :body, 
        material_used = :material_used, 
        thumbnail = :thumbnail, 
        publish = :publish,
        group_name = :group_name
        WHERE id = $current_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":topic", $topic);
        $stmt->bindParam(":body", $body);
        $stmt->bindParam(":material_used", $material_used);
        $stmt->bindParam(":thumbnail", $thumbnail);
        $stmt->bindParam(":publish", $publish);
        $stmt->bindParam(":group_name", $group_name);



        $stmt->execute();    
    } catch (PDOException $e) {
        die("query failed: " . $e->getMessage());
    }

    if (!empty($images)){
        try {
            $image_dir = '../assets/images/'.$title;
    
            $folder  = $image_dir . '/';

            $names = $_FILES['images']['name'];
            $tmp_names = $_FILES['images']['tmp_name'];


            $files_array = array_combine($tmp_names, $names);

            foreach ($files_array as $tmp_folder => $image_name) {
                move_uploaded_file($tmp_folder, $folder . $image_name);
            }      

        } catch (PDOException $e) {
            die("query failed: " . $e->getMessage());
        }
    }
    $pdo = null;
    $stmt = null;    
    header("Location: ../post/update.php?id=".$post['id']);
    die();

} else {
header("Location: ../post/update.php?id=".$post['id']);
    die();
}