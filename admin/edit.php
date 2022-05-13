<?php

require_once 'admin.check.php';
require_once '../server/db.php';

$subject_name = $_GET['subject'];
$subject_type = $_GET['type'];
$id = $_GET['id'];

function redirect(){

    $subject_name = $_GET['subject'];
    $subject_type = $_GET['type'];
    $id = $_GET['id'];

    if($subject_type == 'module' || $subject_type == 'lecture'){
        header("refresh:0.4;url=/admin/subject.php?type=$subject_type&subject=$subject_name");
    }else if($subject_type){
        header("refresh:0.4;url=/admin/$subject_type.php");
    }
}

// check subject name and id
if(isset($_GET['subject'])){
    $sql = "SELECT * FROM $subject_type WHERE id='$id' AND subject_name='$subject_name'";
    $result = $db->query($sql);
    if($result->num_rows <= 0 ){
        redirect();
    }
}else{redirect();}

// if submitted
if(isset($_POST['save_changes'])){
    $title = htmlentities($_POST['title']);
    $content = $_POST['content'];
    $author = htmlentities($_POST['author']);

    if($title != null && $content != null && $author != null){
        $sql = "UPDATE $subject_type SET title='$title', content='$content', author='$author' WHERE subject_name='$subject_name' AND id='$id'";
        if($db->query($sql) == true){
            echo "<script>alert('Successfully save changes!!!')</script>";
            redirect();
        }
    }else{
        echo "<script>alert('error!!!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module | Edit</title>

    <?php require_once 'layout/style.php'; ?>
</head>
<body>

    <?php
        $sql="SELECT * FROM $subject_type WHERE subject_name='$subject_name' AND id='$id' LIMIT 1";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        if($result->num_rows > 0){ ?>
            <form action="<?php echo "$_SERVER[PHP_SELF]?type=$subject_type&subject=$subject_name&id=$id"?>" method="POST">
                <input type="hidden" name="save_changes" value='<?php echo $subject_name?>'>
                <input type="text" class="w3-input" name="title" value="<?php echo $row['title']?>" placeholder="Add Title...">
                <textarea name="content" cols="30" rows="10"><?php echo $row['content'] ?></textarea>
                <input type="text" class="w3-input w3-margin-top w3-margin-bottom" name="author" value="<?php echo $row['author'] ?>" placeholder="Author...">
                <button class="w3-button w3-blue">Save Changes</button>
            </form>
        <?php }
    ?>
    
    <?php require_once 'layout/script.php'; ?>
    <script>
        CKEDITOR.replace('content',{
            height: '100vh',
        })
    </script>
</body>
</html>
