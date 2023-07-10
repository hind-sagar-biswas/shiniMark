<?php
$pageTitle = 'ShiniMark | Personal Bookmark Site';
require './templates/header.php';
require './templates/navbar.php';
require './templates/forms/login.php';
?>
<div id="filter-form-container"></div>
<div class="container-fluid mx-auto">
    <div class="row pagination-slot"></div>
    <div class="row" id="data-container"></div>
    <div class="row pagination-slot"></div>
</div>


<?php
require './templates/footer.php';
