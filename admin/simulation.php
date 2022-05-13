<?php

require_once 'admin.check.php';
require_once '../server/db.php';

// https://www.w3schools.com/w3images/forestbridge.jpg
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Simulation</title>
    <?php require_once './layout/style.php'; ?>
</head>
<body>

    <?php
        require_once './layout/navbar.php';
        require_once './layout/sidebar.php';
    ?>

<div class="w3-main" style="margin-left: 250px;">
        <div class="w3-container w3-padding-64">
            <?php if(isset($_GET['subject'])){ //if subject is set show this one 
                $subjectId = htmlentities($_GET['subject']);
                $sql = "SELECT * FROM subjects WHERE id='$subjectId' LIMIT 1";
                $result = $db->query($sql);
                if( $result->num_rows <= 0 ){
                    header('location: ./simulation.php');
                }

                $module = $result->fetch_assoc();
                
            ?>

                <div class="w3-bar w3-theme-l5 w3-margin-bottom">
                    <h1 class="w3-bar-item">Simulation / <?php echo $module['name']  ?></h1>
                    <h1 class="w3-bar-item w3-right">
                        <a href="./simulation/add.php?subject=<?php echo $module['id']?>">add</a>
                    </h1>
                </div>

               <?php
                // get subject topics if there is available
                $sql = "SELECT * FROM simulation WHERE subject_id=$subjectId";
                $result = $db->query($sql);
                if($result->num_rows > 0 ){
                    while($row = $result->fetch_assoc()){

                    }
                }else{echo "No Modules Yet!!";}
               ?>

            <?php }else{ //if subject is not set show this one?>
                <div class="w3-bar w3-theme-l5 w3-margin-bottom">
                    <h1 class="w3-bar-item">Simulation</h1>
                </div>
                <?php
                    // get the modules subject
                    $sql = "SELECT * FROM subjects";
                    $result = $db->query($sql);
                    if ( $result->num_rows > 0 ) {
                        while ( $row = $result->fetch_assoc() ) { ?>
                            <div class="w3-card">
                                <div class="w3-container">
                                    <div class="w3-bar">
                                        <h1 class="w3-bar-item"><?php echo $row['name'] ?></h1>
                                        <h1 class="w3-bar-item w3-right">
                                            <a href="./simulation.php?subject=<?php echo $row['id']?>"
                                            class="w3-button w3-border w3-border-red w3-text-red w3-hover-text-yellow w3-hover-yellow">Open</a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }else{echo "no subject available";}
                ?>
            <?php } ?>
        </div>
    </div>

    <?php require_once './layout/script.php'; ?>
</body>
</html>