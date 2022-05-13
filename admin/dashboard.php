<?php

require_once 'admin.check.php';
require_once '../server/db.php';

// Total admin
$sql = "SELECT * FROM admin";
$result = $db->query($sql);
$total_admin = $result->num_rows;

// Total Student
$sql = "SELECT * FROM users";
$result = $db->query($sql);
$total_student = $result->num_rows;

// Total Active StoryBoard
// $sql = "SELECT * FROM ";
// $result = $db->query($sql);
// $total_active_storyboard = $result->num_rows;
$total_active_storyboard = 0;

// Total Active Simulation 
// $sql = "SELECT * FROM ";
// $result = $db->query($sql);
// $total_active_simulation = $result->num_rows;
$total_active_simulation = 0;

// Total Active Lecture
$sql = "SELECT * FROM lecture WHERE `status`='active'";
$result = $db->query($sql);
$total_active_lecture = $result->num_rows;

// Total Module
$sql = "SELECT * FROM module WHERE `status`='active'";
$result = $db->query($sql);
$total_active_module = $result->num_rows;

// ========================= DELETED ===============================================================

// Total Deleted Lecture
$sql = "SELECT * FROM lecture WHERE `status`='deleted'";
$result = $db->query($sql);
$total_deleted_lecture = $result->num_rows;

// Total Deleted Module
$sql = "SELECT * FROM module WHERE `status`='deleted'";
$result = $db->query($sql);
$total_deleted_module = $result->num_rows;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once './layout/style.php'; ?>
</head>

<body>

    <?php require_once './layout/navbar.php'; ?>

    <!-- Sidebar -->
    <?php require_once './layout/sidebar.php'; ?>

    <!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
    <div class="w3-main w3-padding-64" style="margin-left:250px">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div class="w3-bar">
            <!-- admin -->
            <div class="w3-quarter w3-margin">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $total_admin?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Admin</h4>
                </div>
            </div>
            <!-- studeny -->
            <div class="w3-quarter w3-margin">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $total_student?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Students</h4>
                </div>
            </div>
        </div>

        <h1 class="w3-block">Active</h1>

        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
                <div class="w3-container w3-red w3-padding-16">
                    <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $total_active_storyboard?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>StoryBoard</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-blue w3-padding-16">
                    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $total_active_simulation?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Simulation</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-teal w3-padding-16">
                    <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $total_active_lecture?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Lecture</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-teal w3-padding-16">
                    <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $total_active_module?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Module</h4>
                </div>
            </div>
        </div>

        <hr>

        <!-- END MAIN -->
    </div>

    <?php require_once './layout/script.php'; ?>

</body>

</html>