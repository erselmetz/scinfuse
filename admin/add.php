<?php

require_once './admin.check.php';
require_once '../server/db.php';

$subject_name = $_GET['subject'];
$subject_type = $_GET['type'];

function redirect(){

    $subject_name = $_GET['subject'];
    $subject_type = $_GET['type'];

    if($subject_type == 'module' || $subject_type == 'lecture'){
        header("refresh:0.4;url=/admin/subject.php?type=$subject_type&subject=$subject_name");
    }else if($subject_type){
        header("refresh:0.4;url=/admin/$subject_type.php");
    }
}

// if submitted
if(isset($_POST['add_module'])){
    $title = htmlentities($_POST['title']);
    $content = $_POST['content'];
    $author = htmlentities($_POST['author']);

    if($title != null && $content != null && $author != null){
        $sql = "INSERT INTO $subject_type(subject_name,title,content,author) VALUES('$subject_name','$title','$content','$author')";
        if($db->query($sql) == true){
            echo "<script>alert('Successfully added new modules!!')</scrip>";
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
    <title>Module | Add</title>

    <?php require_once './layout/style.php'; ?>
</head>
<body>

    <form action="<?php echo "$_SERVER[PHP_SELF]?subject=$subject_name&type=$subject_type"?>" method="POST">
        <input type="hidden" name="add_module" value='<?php echo $_GET['subject']?>'>
        <input type="text" class="w3-input" name="title" placeholder="<?php echo ucwords($subject_type)." Title..."?>">
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <input type="text" class="w3-input w3-margin-top w3-margin-bottom" name="author" placeholder="Author...">
        <button class="w3-button w3-blue"><?php echo "Add ".ucwords($subject_type); ?></button>
    </form>
    
    <?php require_once './layout/script.php'; ?>
    <script>
        CKEDITOR.replace('content',{
            height: '100vh',
        })

        
    </script>
</body>
</html>
