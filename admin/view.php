<?php

require_once 'admin.check.php';
require_once '../server/db.php';

$subject_name = $_GET['subject'];
$subject_type = $_GET['type'];
$id = $_GET['id'];

// check subject name and id
if(isset($_GET['subject'])){
    $sql = "SELECT * FROM $subject_type WHERE id='$id' AND subject_name='$subject_name'";
    $result = $db->query($sql);
    if($result->num_rows <= 0 ){
        header("location: /admin/subject.php?type=$subject_type");
    }
}else{header("location: /admin/subject.php?type=$subject_type");}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $subject_type ?> | View</title>

    <?php require_once 'layout/style.php'; ?>
</head>
<body>

    <?php
        $sql="SELECT * FROM $subject_type WHERE subject_name='$subject_name' AND id='$id' LIMIT 1";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        if($result->num_rows > 0){ ?>
            <div class="w3-container w3-padding-64">
                <h1 class="w3-center"><?php echo $row['title'] ?></h1>
                <div class="w3-container">
                    <?php echo $row['content'] ?>
                </div>
                <p><b>Author</b> : <?php echo $row['author'] ?></p>
            </div>
        <?php }
    ?>
    
    <?php require_once 'layout/script.php'; ?>
</body>
</html>
