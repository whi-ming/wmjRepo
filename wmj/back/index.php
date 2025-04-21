<?php include "includes/dbh.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../back/assets/images/smile.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/back.css?version=6">
</head>
<body>
    <a href="../front/index.php">front</a>
    <div class="page-content">
        <h1>dashboard</h1>

        <span class="button-container">
            <a href="post/create.php" class="create-post">create</a>
        </span>
        
        <table class="posts_table">
            
            <thead>
            <tr class="group">
                <th colspan="6">
                    <div>
                        <span class="group_button selected">all</span>
                        <?php foreach($groups as $group):?>
                            <span class="group_button"><?php echo $group['title']?></span>
                        <?php endforeach; ?>
                        <span> <a href="group/create.php"> add </a> </span>
                    </div>
                </th>
            </tr>
                <th>#</th>
                <th>image</th>
                <th>title</th>
                <th>topic</th>
                <th>date</th>
                <th>publish</th>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    foreach ($posts as $row) { 
                ?>
                <tr class="<?php echo $row['group_name']; ?> hide">
                    <td><?php echo $count; $count++;?></td>
                    <td><img src="assets/images/posts/<?php echo $row['title'] .'/'. $row['thumbnail'];?>" alt="oops"></td>
                    <td>
                    <a href="../front/pages/post.php?id=<?php echo $row['id'] . "&admin=1"; ?>"><?php echo $row['title'];?></a>
                        <span class="options">
                        <a class="edit" href="post/update.php?id=<?php echo $row['id']; ?>">edit</a>
                        <a href="post/delete.php?post_id=<?php echo $row['id'] ?>" class="trash">trash</a>
                        </span>
                    </td>
                    <td><?php echo $row['topic'];?></td>
                    <td><?php echo $row['created_at'];?></td>
                    <td>
                        <a href="includes/publish_form.php?id=<?php echo $row['id']; ?>">
                            <?php
                                if($row['publish'] == 1){
                                    echo "unpublish";
                                }else{
                                    echo "publish";
                                }

                            ?>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- ---------------TOPICS TABLE ------------------------ -->
        
        <table class="topics_table">
            <thead>
                <th>#</th>
                <th>topic</th>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    foreach ($topics as $row) { 
                ?>
                <tr>
                    <td><?php echo $count; $count++;?></td>
                    <td><?php echo $row['title'];?></td>
                    <td> <a href="post/delete.php?topic_id=<?php echo $row['id'];?>" class="trash">delete</a> </td>
                </tr>
                <?php } ?>
                <tr class="input-topic hide">
                    <td><?php echo $count ?></td>
                    <td>
                        <form id="topic-form" action="includes/topic_form.php" method="post">
                            <input type="text" id="topic" name="topic">
                            <button 
                                style="display:none;"
                                class="submit-btn"
                                type="submit">
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="create-topic">
                    <td colspan="2">create</td>
                </tr>
                <tr class="confirm hide">
                <td colspan="2">
                    <div class="options">
                        <div class="no">NO</div>
                        <button type="submit" form="topic-form" class="yes">YES</button>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        const createBtn = document.querySelector('.create-topic');
        const confirm = document.querySelector('.confirm');
        const inputTopic = document.querySelector('.input-topic');
        // const yes = document.querySelector('.yes');
        // const submitBtn = document.querySelector('.submit-btn');
        
        function toggleHide(){
            createBtn.classList.toggle('hide');
            confirm.classList.toggle('hide');
            inputTopic.classList.toggle('hide');
        }  

        // yes.addEventListener('click', function(){
        //     submitBtn.click();
        // })
        createBtn.addEventListener('click', toggleHide);
        confirm.addEventListener('click', toggleHide);
        
    
        const groupButtons = document.querySelectorAll('.group_button');
        let selected = document.querySelector('.group_button.selected');

        let class_name = '.all'

        //searching for parent where dropDown originates from
        groupButtons.forEach(groupButton =>{
            new_class_name = '.';
            new_class_name = new_class_name.concat('', groupButton.innerHTML);
            let group = document.querySelectorAll(new_class_name);
            group.forEach(post =>{    
                post.classList.toggle('hide');
            });
            
            groupButton.addEventListener('click', function(){
                groupButton.classList.toggle('selected');
                selected.classList.toggle('selected');
                selected = groupButton;

                new_class_name = '.';
                new_class_name = new_class_name.concat('', groupButton.innerHTML);
                
                if(!(class_name === new_class_name)){
                    if(class_name === '.all'){
                        toggleAllGroups();
                    } 
                    if(new_class_name === '.all'){
                        toggleAllGroups();
                    }
                    for (let i = 0; i < 2; i++) {
                        let group = document.querySelectorAll(class_name);
                        group.forEach(post =>{
                        post.classList.toggle('hide');
                        });
                        new_class_name = '.';
                        new_class_name = new_class_name.concat('', groupButton.innerHTML);
                        class_name = new_class_name;
                    }


                }

                

            });
        });
        function toggleAllGroups(){
            groupButtons.forEach(groupButton =>{
                new_class_name = '.';
                new_class_name = new_class_name.concat('', groupButton.innerHTML);
                console.log(new_class_name);
                let group = document.querySelectorAll(new_class_name);
                group.forEach(post =>{    
                    post.classList.toggle('hide');
                });
            });  
        }

    </script>
</body>
</html>