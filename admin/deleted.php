<?php 

require_once './admin.check.php';
require_once '../server/db.php';
require_once './layout/function.php';

$type = '';
$subject = '';
$title = '';
$notification = null;
$back = '';

if(isset($_GET['type'])){
    $type = htmlentities($_GET['type']);
    $title = ucwords($type);
    
    if($_GET['type'] == 'module' || $_GET['type'] == 'lecture'){
        $back = "/admin/deleted.php?type=$type";
    }else{
        $back = "/admin/$type.php";
    }
}

if(isset($_GET['subject'])){
    $subject = htmlentities($_GET['subject']);
}

if(isset($_POST['public'])){
    $id = htmlentities($_POST['id']);
    $type = htmlentities($_POST['type']);

    $sql = "UPDATE $type SET `status`='active' WHERE id='$id' ";
    if( $db->query($sql) == true ){
        $notification = 'Successfuly Public';
    }else{
        $notification = 'Error';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Deleted | $title" ?></title>
    <?php require_once './layout/style.php'; ?> 
</head>
<body>
    <?php require_once './layout/navbar.php'; ?> 
    <?php require_once './layout/sidebar.php'; ?> 

    <div class="w3-main w3-padding-64 w3-container" style="margin-left: 250px;">
        <?php 

        if($notification != null){echo notification($notification);}
        
        if(isset($_GET['subject'])) { ?>

        <div class="w3-bar w3-theme-l5 w3-margin-bottom">
            <h1 class="w3-bar-item w3-border-right w3-border-black">
                <a href="<?php echo $back ?>">back</a>
            </h1>
            <h1 class="w3-bar-item"> DELETED - <?php echo ucwords($type)." / $subject" ?></h1>
        </div>

        <?php 
            $sql = "SELECT * FROM $type WHERE `status`='deleted' AND subject_name='$subject' ";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){ ?>

                    <div class="w3-card w3-margin-bottom">
                        <div class="w3-container">
                            <div class="w3-bar">
                                <h1 class="w3-bar-item"><?php echo $row['title'] ?></h1>
                                <div class="w3-dropdown-click w3-right w3-margin-right">
                                    <button onclick="toggle('#IjIuj')" class="w3-button">
                                        <img src="/admin/dist/icon/menu-vertical.png" class="w3-image" width="" alt="">
                                    </button>
                                    <div id="IjIuj" class="w3-dropdown-content w3-bar-block w3-border">
                                        <a href="<?php echo "view.php?subject=$subject&type=$type&id=$row[id]" ?>" 
                                            class="w3-bar-item w3-button">
                                            View
                                        </a>
                                        <a href="<?php echo "edit.php?type=$type&subject=$subject&id=$row[id]" ?>" 
                                            class="w3-bar-item w3-button">
                                            Edit
                                        </a>
                                        <a href="#" onclick="<?php echo "modal_show('#delete-$row[id]')"?>" 
                                            class="w3-bar-item w3-button">
                                            Public
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    <div class="w3-modal" id="<?php echo "delete-$row[id]"?>">
                        <div class="w3-modal-content w3-container">
                            <div class="w3-bar w3-border-bottom">
                                <h3 class="w3-bar-item w3-yellow w3-panel">Warning</h3>
                                <span class="w3-bar-item w3-large w3-right w3-button" onclick="<?php echo "modal_close('#delete-$row[id]')"?>">
                                    X
                                </span>
                            </div>
                            <div class="w3-padding w3-center w3-large">
                                Are you sure you want to public "<?php echo $row['title'] ?>" ?
                            </div>
                            <div class="w3-border-top w3-padding w3-bar">
                                <form action="<?php echo "$_SERVER[PHP_SELF]?type=$_GET[type]&subject=$_GET[subject]" ?>" method="post">
                                    <input type="hidden" name="public">
                                    <input type="hidden" name="type" value="<?php echo $_GET['type']?>">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" class="w3-bar-item w3-right w3-button w3-border w3-border-blue w3-text-blue w3-hover-text-black w3-hover-border-black w3-hover-none">Yes</button>
                                    <button type="button" onclick="<?php echo "modal_close('#delete-$row[id]')"?>" class="w3-bar-item w3-right w3-button">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php } ?> 

            <?php }else{ ?>

                <div class="w3-panel">
                    <div class="w3-container">
                        Empty
                    </div>
                </div>

            <?php } ?>

        <?php }else{ ?>

            <div class='w3-bar w3-theme-l5 w3-margin-bottom'>
                <h1 class='w3-bar-item w3-text-red'>Deleted <?php echo ucwords($_GET['type']) ?></h1>
            </div>
            <?php require_once './layout/subject.php'; ?>

        <?php } ?>
    </div>

    <?php require_once './layout/script.php'; ?>
</body>
</html>