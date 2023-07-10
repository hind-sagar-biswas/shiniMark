<?php
$bookmark = json_decode($_POST['bookmark'], true);
$loggedIn = $_POST['restriction'];
$mode = ($_POST['mode']) ? $_POST['mode'] : 'list';

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

<?php if ($mode === 'card') : ?>
    <div class="col-lg-2 col-md-3 col-sm-12 mb-3">
        <div class="card shadow">
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
            <img class="card-img-top rounded-0" id="image-<?= $bookmark['id'] ?>" src="./assets/images/logo.png" title="<?= $bookmark['name'] ?>" alt=" <?= $bookmark['name'] ?>">
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
            <?php if ($loggedIn) : ?>
                <div class="card-footer text-muted d-flex justify-content-end gap-1">
                    <a class='btn btn-sm btn-secondary' href="action.php?act=update&tar=bookmark&id=<?php echo $bookmark['id'] ?>">
                        EDIT <i class='fas fa-edit'></i>
                    </a>
                    <a class='btn btn-sm btn-danger' href="run.php?target=bookmark&del=<?php echo $bookmark['id'] ?>">
                        DELETE <i class='fa fa-trash' aria-hidden='true'></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php elseif ($mode === 'list') : ?>
    <div class="col-sm-12 col-md-6">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4" style="max-width:20%;">
                    <img id="image-<?= $bookmark['id'] ?>" src="./assets/images/logo.png" title="<?= $bookmark['name'] ?>" alt=" <?= $bookmark['name'] ?>" style="max-width:100%; aspect-ratio:1">
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <span>
                                <?= ($bookmark['restriction']) ? "<span class='badge bg-danger'> 18+ </span>" : '' ?>
                                <?php echo $bookmark['category']; ?>
                            </span>
                            <span>
                                <?= "<span class='badge bg-$statusTheme text-lowercase'>$statusText</span>" ?>
                                <?= "<span class='badge bg-$badgeStyle'>$badgeText</span>" ?>
                            </span>
                        </div>
                        <h5 class="card-title">
                            <?php if ($bookmark['link'] != null || !empty($bookmark['link'])) {
                                echo "<a href='" . $bookmark['link'] . "' target='_blank' class='mngLink'>" . $bookmark['name'] . "</a>";
                            } else {
                                echo $bookmark['name'];
                            } ?>
                        </h5>
                        <small class="card-text">
                            Read <span class="text-danger"><?= $bookmark['current'] ?></span> of <span class="text-danger"><?= $bookmark['latest'] ?></span>
                        </small>
                        <?php if ($loggedIn) : ?>
                            <div class="d-flex justify-content-end gap-1">
                                <a class='btn btn-sm btn-secondary' href="action.php?act=update&tar=bookmark&id=<?php echo $bookmark['id'] ?>">
                                    EDIT <i class='fas fa-edit'></i>
                                </a>
                                <a class='btn btn-sm btn-danger' href="run.php?target=bookmark&del=<?php echo $bookmark['id'] ?>">
                                    DELETE <i class='fa fa-trash' aria-hidden='true'></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>