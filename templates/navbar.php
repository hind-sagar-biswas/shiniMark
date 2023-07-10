<?php
require './functions.php';
$mark = new ShiniMark();
$restriction = 0;

$websites = $mark->getWebsiteList($restriction);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="ShiniMark logo" width="170px"></a>

        <button class="navbar-toggler d-lg-none bg-danger btn-danger" type=" button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-grip-horizontal text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <?php foreach ($websites as $website) { ?>
                    <li class="nav-item navigator">
                        <a class="" target="_blank" href="<?php echo $website['url']; ?>"><button class="nav-link btn navigator-items"><?php echo $website['name']; ?></button></a>
                    </li>
                <?php } ?>
                <li class="nav-item navigator" id="all-websites">
                    <a target="_blank" href="websitelist.php">
                        <button class="nav-link btn navigator-items">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                    </a>
                </li>
            </ul>
            <ul class="d-flex my-2 my-lg-0 nav nav-pills">
                <li class="nav-item" id="login-button-container">
                    <button type="button" class="nav-link btn text-danger navigator" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-sign-in-alt"></i>
                    </button>
                </li>
                <li class="nav-item" id="logout-button-container">
                    <button type="button" class="nav-link btn text-danger navigator" id="logout-button">
                        <i class="fas fa-power-off"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>