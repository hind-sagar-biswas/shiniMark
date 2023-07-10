<?php
$bookmark = json_decode($_POST['bookmark'], true);

$statusTheme = 'primary';
$statusText = $bookmark['status'];
switch ($bookmark['status']) {
    case 'Completed':
        $statusTheme = 'success';
        $statusText = '<i class="fa-solid fa-check-double"></i>';
        break;
    case 'Ongoing':
        $statusTheme = 'primary';
        $statusText = '<i class="fa-solid fa-spinner"></i>';
        break;
    case 'Season End':
        $statusTheme = 'warning';
        $statusText = '<i class="fa-solid fa-circle-pause"></i>';
        break;
    case 'Axed':
        $statusTheme = 'danger';
        $statusText = '<i class="fa-solid fa-ban"></i>';
        break;
}

$badgeStyle = 'primary';
$badgeText = '';

if ($bookmark['current'] == 0) {
    $badgeStyle = 'danger';
    $badgeText = '<i class="fas fa-pause"></i>';
} elseif ($bookmark['current'] == $bookmark['latest']) {
    $badgeStyle = 'secondary';
    $badgeText = '<i class="fas fa-check"></i>';
} else {
    $badgeStyle = 'warning';
    $badgeText = '<i class="fas fa-play"></i>';
}

?>
<div class="col-lg-2 col-md-3 col-sm-12 mb-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                <?= ($bookmark['restriction']) ? "<span class='badge bg-danger'> 18+ </span>" : '' ?>
                <?php echo $bookmark['category']; ?>
            </span>
            <span>
                <?= "<span class='badge bg-$statusTheme text-lowercase'>$statusText</span>" ?>
                <?= "<span class='badge bg-$badgeStyle'>$badgeText</span>" ?>
            </span>
        </div>
        <img class="card-img-top" src="./assets/images/logo.png" alt="Title">
        <div class="card-body">
            <h4 class="card-title">
                <?php if ($bookmark['link'] != null || !empty($bookmark['link'])) {
                    // echo var_dump(parse_url($bookmark['link']));
                    echo "<a href='" . $bookmark['link'] . "' target='_blank' class='mngLink'>" . $bookmark['name'] . "</a>";
                } else {
                    echo $bookmark['name'];
                } ?>
            </h4>
            <p class="card-text">
                Read <span class="text-danger"><?= $bookmark['current'] ?></span> of <span class="text-danger"><?= $bookmark['latest'] ?></span>
            </p>
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>
</div>