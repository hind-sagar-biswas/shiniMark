<?php
require './functions.php';
$mark = new ShiniMark();
$restriction = 0;

$websites = $mark->getWebsiteList($restriction);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light  justify-content-between">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="ShiniMark logo" width="170px"></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler bg-danger btn-danger" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <!-- <span class="navbar-toggler-icon text-white"></span> -->
        <i class="fas fa-grip-horizontal text-white"></i>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
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

        <ul class="nav nav-pills">
            <li class="nav-item" id="login-button-container">
                <button type="button" class="nav-link btn text-danger navigator" data-toggle="modal" data-target="#logInModal">
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
</nav>
<br>