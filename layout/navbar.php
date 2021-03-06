
<nav class="navbar navbar-expand-sm navbar-dark position-fixed w-100">
    <div class="container">
        <a class="navbar-brand" href="/home.php">
            <img src="\image\SCinFuse1.png" width="90"/>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0" id="nav-contents">
                <a href="/Storyboard.php">
                    <li class="button button1">Stories</li>
                </a>
                <a href="/Simulations.php">
                    <li class="button button2">Simulations</li>
                </a>
                <a href="/Lectures.php">
                    <li class="button button3">Lectures</li>
                </a>
                <a href="/Modules.php">
                    <li class="button button4">Modules</li>
                </a>
            </ul>
            <div class="navbar-nav dropdown">
                <a class="nav-link" style="color: white" id="hello">
                    Hello!
                </a>
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $auth->fullname() ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/manage_account.php">Manage Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout.php">Logout</a>
                </div>
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId1">
                    <a class="dropdown-item" href="/manage_account.php">Manage Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>