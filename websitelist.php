<?php
$pageTitle = 'ShiniMark | Personal Bookmark Site';
require './templates/header.php';
require './templates/navbar.php';
require './templates/forms/login.php';

$allWebsites = $mark->getWebsiteList();
?>

<div class="container">
    <div class="list-group">
        <?php foreach ($allWebsites as $website) { ?>
            <a target="_blank" href="<?php echo $website['url']; ?>" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action text-danger">
                <?php echo $website['name']; ?>
                <?php if ($website['restriction']) { ?>
                    <span class="badge badge-danger badge-pill">18+</span>
                <?php } ?>
            </a>
        <?php } ?>
    </div>
</div>

<div id="filter-form-container"></div>
<div id="data-container" class="container-fluid mx-auto table-center"></div>
<style>
    #data-container,
    #filter-form-container {
        visibility: hidden;
        height: 0;
        width: 0;
        overflow: hidden;
        pointer-events: none;
    }
</style>
<?php
require './templates/footer.php';
