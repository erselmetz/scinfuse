<?php

require_once 'server/auth.php';
require_once 'server/db.php';
require_once 'server/global_function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/css/style.css">

</head>

<body>
    <?php require_once 'layout/navbar.php'; ?>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1" />
                <input type="radio" name="radio-btn" id="radio2" />
                <input type="radio" name="radio-btn" id="radio3" />
                <input type="radio" name="radio-btn" id="radio4" />

                <div class="slide first">
                    <img src="/image/Slide 1.jpg" />
                </div>
                <div class="slide">
                    <img src="/image/Slide 2.jpg" />
                </div>
                <div class="slide">
                    <img src="/image/Slide 3.jpg" />
                </div>
                <div class="slide">
                    <img src="/image/Slide 4.jpg" />
                </div>
                <div class="navigation-auto">
                    <div class="auto-btn1">
                        <label for="radio1" class="manual-btn"></label>
                    </div>
                    <div class="auto-btn2">
                        <label for="radio2" class="manual-btn"></label>
                    </div>
                    <div class="auto-btn3">
                        <label for="radio3" class="manual-btn"></label>
                    </div>
                    <div class="auto-btn4">
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-text">
        <div>
            <h1>Welcome to SCinFuse, <a style="color: #00ffff; text-transform: capitalize; text-decoration: none"><?php echo $auth->fullname()?>!</a></h1>
        </div>
        <p>The most exciting learning management system that fuse your minds into more exciting lessons</p>

    </div>

    <a class="button button9" href="Storyboard.php">Start Learning</a>

    <div class="home-row">
        <div class="home-column1">
            <h2><b>Watch our Lectures</b></h2>
            <div class="home-column1-contents">
                <div class="lectures">
                    <img src="/image/Earth logo.png" />
                    <a class="button button5" href="/Lectures/Earth Science/Earth Science Lectures.php">
                        <b>Earth Science</b>
                    </a>
                </div>
                <div class="lectures">
                    <img src="/image/Biology logo.png" />
                    <a class="button button6" href="/Lectures/Earth Science/Earth Science Lectures.php">
                        <b>Biology</b>
                    </a>
                </div>
                <div class="lectures">
                    <img src="/image/Chemistry logo.png" />
                    <a class="button button7" href="/Lectures/Earth Science/Earth Science Lectures.php">
                        <b>Chemistry</b>
                    </a>
                </div>
                <div class="lectures">
                    <img src="/image/Physics logo.png" />
                    <a class="button button8" href="/Lectures/Earth Science/Earth Science Lectures.php">
                        <b>Physics</b>
                    </a>
                </div>
            </div>
        </div>

        <div class="home-column2">
            <h2><b>Introducing SCinFuse</b></h2>
            <video controls>
                <source src="/image/SCinFuse.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <button class="button button10" id="btn" onclick='recognition.start()'>
        <img src="/image/microphone.png" width="90" height="80"/>Talk to Scientia
    </button>
    <script src="./dist/js/Voice Command.js"></script>

    <?php require_once './layout/chat_button.php'; ?>

    <?php require_once 'layout/footer.php'; ?>

    <?php require_once 'layout/script.php'; ?>
    <script src="./dist/js/Slideshow.js"></script>

</body>

</html>