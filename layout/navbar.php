<nav class="navbar navbar-expand-sm navbar-dark bg-dark position-fixed w-100" style="z-index: 1;">
    <div class="container">
        <a class="navbar-brand" href="#">Scinfuse</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/home.php">Home <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">chat</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/chat/individual.php">individual</a>
                        <a class="dropdown-item" href="/chat/group.php">group</a>
                        <a class="dropdown-item" href="/chat/global.php">global</a>
                    </div>
                </li>
            </ul>
            <div class="navbar-nav dropdown">
                <a class="nav-link text-white dropdown-toggle text-dark" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['user_fullname'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <!-- <a class="dropdown-item" href="#"></a> -->
                    <a class="dropdown-item" href="/logout.php">logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>