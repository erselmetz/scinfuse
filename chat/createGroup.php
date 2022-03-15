<?php

require_once '../auth.php';
require_once '../db.php';
require_once '../globalFunction.php';

$groupCode = randomString(3).'-'.randomString(4).'-'.randomString(3);

if(isset($_POST['requestToCreateGroup'])){
    if(isset($_POST['groupStatus'])){
        $name = htmlentities($_POST['groupName']);
        $status = htmlentities($_POST['groupStatus']);
        $code = $groupCode;

        // trim
        $nameTrim = trim($name);
        $statusTrim = trim($status);

        if( !empty($nameTrim)&&!empty($statusTrim) ){
            $sqlGroupChat = "INSERT INTO chat_group (name,status,code,leader) VALUES ('$name','$status','$code','$_SESSION[user_id]')";
            if( $db->query($sqlGroupChat) === TRUE ){
                header('location: ./group.php');
            }

        }
    }else{
        $message_error = "select group status";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat | create group</title>
    <!-- css -->
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card col-12 col-md-8">
            <div class="card-header">
                <div class="btn-group">
                    <a type="button" class="btn btn-primary" href="./group.php">back</a>
                </div>
            </div>
            <div class="card-body overflow-auto">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <!-- request -->
                    <input type="hidden" name="requestToCreateGroup">
                    <!-- alert -->
                    <?php message_alert(['error'=>$message_error]); ?>
                    <!-- input group name -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="groupName" required>
                        <small class="form-text text-muted">enter group name</small>
                    </div>
                    <!-- input group status -->
                    <div class="mb-3">
                        <select class="form-select" name="groupStatus" required>
                            <option selected disabled hidden>group status</option>
                            <option value="public">public</option>
                            <option value="private">private</option>
                        </select>
                    </div>
                    <!-- input code -->
                    <div class="mb-3">
                        <input type="text" class="form-control" value="<?php echo $groupCode ?>" name="groupCode" required readonly>
                        <small class="form-text text-muted">enter code</small>
                    </div>
                    <!-- button -->
                    <button class="btn btn-primary" type="submit">create group</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>