<?php

require_once 'admin.check.php';
require_once '../server/db.php';

$notification = null;

if(isset($_POST['delete'])){
    $id = htmlentities($_POST['id']);

    $sql = "UPDATE storyboard SET `status`='deleted' WHERE id='$id' ";
    if( $db->query($sql) == true ){
        $notification = 'Successfuly Deleted';
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
    <title>Admin | Storyboard</title>
    <?php require_once './layout/style.php'; ?>
</head>
<body>

    <?php
        require_once './layout/navbar.php';
        require_once './layout/sidebar.php';
    ?>

    <div class="w3-main" style="margin-left: 250px;">
        <div class="w3-container w3-padding-64">
            <div class="w3-bar w3-theme-l5 w3-margin-bottom">
                <h1 class="w3-bar-item">Storyboard</h1>
                <h1 class="w3-bar-item w3-right">
                    <a href="./add.php?type=storyboard&subject=storyboard">add</a>
                    <a href="./deleted.php?type=storyboard&subject=storyboard">deleted</a>
                </h1>
            </div>

                <?php
                    // get the modules subject
                    $sql = "SELECT * FROM storyboard WHERE `status`='active'";
                    $result = $db->query($sql);
                    if ( $result->num_rows > 0 ) {
                        while ( $row = $result->fetch_assoc() ) { ?>

                            <div class="w3-card w3-margin-bottom">
                                <div class="w3-container">
                                    <div class="w3-bar">
                                        <h1 class="w3-bar-item"><?php echo $row['title'] ?></h1>
                                        <div class="w3-dropdown-click w3-right w3-margin-right">
                                            <button onclick="toggle('#IjIuj')" class="w3-button">
                                                <img src="/admin/dist/icon/menu-vertical.png" class="w3-image" width="" alt="">
                                            </button>
                                            <div id="IjIuj" class="w3-dropdown-content w3-bar-block w3-border">
                                                <a href="<?php echo "view.php?type=storyboard&subject=storyboard&id=$row[id]" ?>" 
                                                    class="w3-bar-item w3-button">
                                                    View
                                                </a>
                                                <a href="<?php echo "edit.php?type=storyboard&subject=storyboard&id=$row[id]" ?>" 
                                                    class="w3-bar-item w3-button">
                                                    Edit
                                                </a>
                                                <a href="#" onclick="<?php echo "modal_show('#delete-$row[id]')"?>" 
                                                    class="w3-bar-item w3-button">
                                                    Delete
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
                                        Are you sure you want to delete "<?php echo $row['title'] ?>" ?
                                    </div>
                                    <div class="w3-border-top w3-padding w3-bar">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                            <input type="hidden" name="delete">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <button type="submit" class="w3-bar-item w3-right w3-button w3-border w3-border-red w3-text-red w3-hover-text-black w3-hover-border-black w3-hover-none">Yes</button>
                                            <button type="button" onclick="<?php echo "modal_close('#delete-$row[id]')"?>" class="w3-bar-item w3-right w3-button">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    }else{echo "No storyboard available!!";}
                ?>
        </div>
    </div>

    <?php require_once './layout/script.php'; ?>
</body>
</html>