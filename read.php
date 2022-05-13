<?php

require_once './server/auth.php';
require_once './server/db.php';
require_once './server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title><?php echo strtoupper($_GET['subject']) ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">
    <style>
        /* Body */

        body {
            background: rgb(255, 255, 204);
        }

        .welcome-text {
            color: black;
            padding-top: 100px;
        }

        .text {
            padding-top: 50px;
            padding-bottom: 50px;
            margin: 0 20px;
            font-size: 20px;
        }

        .text img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <?php
        if(isset($_GET['type']) && isset($_GET['subject']) && isset($_GET['id'])){
            $type = htmlentities($_GET['type']);
            $subject = htmlentities($_GET['subject']);
            $id = htmlentities($_GET['id']);
            $sql = "SELECT * FROM $type WHERE subject_name='$subject' AND id='$id' AND `status`='active' LIMIT 1";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc(); ?>
                <div class="welcome-text">
                    <h1 style="font-size: 40px"><b><?php echo $row['title'] ?></b></h1>
                </div>
                <div class='text'>
                    <?php echo $row['content'] ?>
                </div>
            <?php }else{
                header("location: /$type.php");
            }
        }
    ?>

</body>

</html>