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
            <h1>create post</h1>
            <a href="../index.php"> < back</a>
        </div>
        <main>
            <form action="../includes/post_form.php" method="post" enctype="multipart/form-data">
                <label for="title">title</label>
                <input type="text" id="title" name="title">

                <label for="topic">topic</label>
                <select name="topic" id="topic">
                    <option value=""></option>
                    <?php foreach ($topics as $row): ?>
                        <option value="<?php echo $row['title'];?>">
                            <?php echo $row['title'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <label for="body">body</label>
                <textarea name="body" id="body" placeholder=" ..."></textarea>

                <label for="material_used">material used</label>
                <input type="text" id="material_used" name="material_used">

                <label for="image">thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
                
                <label for="image">image (please select multiple, including the thumbnail)</label>
                <input type="file" name="images[]" id="image" multiple>

                <label for="group_name">group</label>
                <select name="group_name" id="group_name">
                    <option value=""></option>
                    <?php foreach ($groups as $row): ?>
                        <option value="<?php echo $row['title'];?>">
                            <?php echo $row['title'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <div class="publish-wrapper">
                    <label for="publish">publish</label>
                    <input type="checkbox" name="publish" id="publish multiple" value="1">
                </div>


                <button type="submit">save</button>
            </form>
        </main>
    </div>
</body>
</html>