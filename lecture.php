<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

$subject_name = '';

if(isset($_GET['subject'])){
    $subject_name = htmlentities($_GET['subject']);
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Lectures</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php' ?>

    <?php if(isset($_GET['subject'])){ ?>
    
        <div class="welcome-text1">
            <h1><?php echo divide_words($_GET['subject']) ?> Lectures</h1>
        </div>

        <?php $sql="SELECT * FROM lecture WHERE subject_name='$subject_name' AND `status`='active'";
        $result = $db->query($sql);
        if($result->num_rows > 0 ){
            while ($row = $result->fetch_assoc()) { ?>
            
                <div class="modules-row">
                    <div class="modules">
                            <h3>
                                <b>
                                    <?php echo $row['title'] ?>
                                </b>
                            </h3>
                            <a href="<?php echo "./read.php?type=lecture&subject=$row[subject_name]&id=$row[id]" ?>" class="button button13">Read</a>
                        </div>
                        <div class="credits">
                            By: <?php echo $row['author'] ?>
                        </div>
                    </div>
                </div>

            <?php }
        }else{ ?>

            <div class="w3-display-middle w3-modile w3-col s5">
                <div class="w3-panel w3-yellow">
                    <div class="w3-container">
                        <span class="w3-xlarge">No Records!!</span>
                    </div>
                </div>
            </div>

        <?php }?>

    <?php }else{ ?>

        <div class="welcome-text1">
            <h1>Welcome to Lectures!</h1>
        </div>

        <?php require_once 'layout/subject.php' ?>

    <?php } ?>

    <button class="button button10 w3-block" id="btn" onclick='recognition.start()'>
        <img src="/image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="./dist/js/Voice Command.js"></script>

    <?php require_once 'layout/chat_button.php' ?>
    <?php require_once 'layout/footer.php' ?>
    <?php require_once 'layout/script.php' ?>

</body>

</html>