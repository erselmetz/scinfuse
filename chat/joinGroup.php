<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../globalFunction.php';


// if joinCode is set
if(isset($_POST['joinCode'])){

    // htmlentities
    $code = htmlentities($_POST['joinCode']);
    $ui = $_SESSION['user_id'];
    $position = 'member';

    // get group chat id
    $sql = "SELECT * FROM chat_group WHERE code='$code' LIMIT 1";
    $result = $db->query($sql);
    $groupInfo = $result->fetch_assoc();
    $gi = $groupInfo['id'];

    // should not joined if its the group is owned by the user
    $sql = "SELECT * FROM chat_group WHERE leader=$_SESSION[user_id]";
    $result = $db->query($sql);
    if( $result->num_rows > 0 ){
        $message_error = "you know that you can not joined your group";
    }else{
        // check if the user is already joined the group
        $sql = "SELECT * FROM chat_group_member WHERE chat_group_id=$gi AND member_id=$ui LIMIT 1";
        $result = $db->query($sql);
        if( $result->num_rows > 0 ){
            $message_error = "you know that you have already joined this group";
        }else{
            // INSERT TO DATABASE
            $sql = "INSERT INTO chat_group_member (chat_group_id,member_id,position) VALUES ('$gi','$ui','$position')";
            if( $db->query($sql) === TRUE ){
                $message_success = "successfuly join the group";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat | join group</title>
    <!-- css -->
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
    <?php if(isset($_GET['code'])){

        //entities
        $code = htmlentities($_GET['code'],ENT_QUOTES);

        // sql for chat group
        $findCode = $db->query("SELECT * FROM chat_group WHERE code='$code' LIMIT 1");
        $groupInfo = $findCode->fetch_assoc();
    
        // check the if the group code is exist 
        if(!$findCode->num_rows > 0){
            $message_error = 'something is wrong with your code';

        ?>
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card col-12 col-md-8">
                    <div class="card-header">
                        <div class="btn-group">
                            <a type="button" class="btn btn-primary" href="./joinGroup.php">back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- alert -->
                        <?php message_alert(['error'=>$message_error]) ?>
                    </div>
                </div>
            </div>
        <?php }else{ 
            // sql for chat group member
            $groupChatMemberSql = $db->query("SELECT * FROM chat_group_member WHERE chat_group_id=$groupInfo[id]");
            $groupChatMemberInfo = $groupChatMemberSql->fetch_assoc();

            // reasign the variables
            $groupName = $groupInfo['name'];
            $groupMember = $groupChatMemberSql->num_rows.' member';
        ?>
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card col-12 col-md-8">
                    <div class="card-header">
                        <div class="btn-group">
                            <a type="button" class="btn btn-primary" href="./joinGroup.php">back</a>
                        </div>
                    </div>
                    <div class="card-body overflow-auto">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <!-- group name -->
                            <h1><?php echo $groupName ?></h1>
                            <!-- group Member -->
                            <h1><?php echo $groupMember ?></h1>
                            <!-- join code -->
                            <div class="mb-3">
                                <input type="text" class="form-control" value="<?php echo $_GET['code'] ?>" name="joinCode" required readonly>
                            </div>
                            <!-- button -->
                            <button class="btn w-100 btn-primary" type="submit">Join</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card col-12 col-md-8">
                <div class="card-header">
                    <div class="btn-group">
                        <a type="button" class="btn btn-primary" href="./group.php">back</a>
                    </div>
                </div>
                <div class="card-body overflow-auto">
                    <?php 
                    message_alert([
                        'success'=>$message_success,
                        'error'=>$message_error
                    ]); 
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                        <!-- input code -->
                        <div class="mb-3">
                            <input type="text" class="form-control" name="code" required autocomplete="off">
                            <small class="form-text text-muted">enter code</small>
                        </div>
                        <!-- button -->
                        <button class="btn btn-primary" type="submit">submit code</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>