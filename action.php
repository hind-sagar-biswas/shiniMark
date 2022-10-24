<?php

if (isset($_GET['act'])) {
    require './functions.php';
    $mark = new ShiniMark();

    $action = $_GET['act'];
    $target = $_GET['tar'];
    $type = '';

    if ($action == 'add') {
        $type = 'add';
    } elseif ($action == 'upd' && isset($_GET['id'])) {
        $type = 'update';
        $actionId = $_GET['id'];
    }
    
    if (!empty($type) && ($target == 'bookmark' || $target == 'category' || $target == 'status')) {
        $categoryList = $mark->getCategoryList();
        $statusList = $mark->getStatusList();

        if ($type == 'update') {
            if ($target == 'bookmark') $targetData = $mark->getMark($actionId);
            if ($target == 'category') $targetData = $mark->getCategory($actionId);
            if ($target == 'staus') $targetData = $mark->getStatus($actionId);
        }

        $pageTitle = ucwords($type . ' ' . $target);
        require './templates/header.php';
        require './templates/forms/' . $target . '.php';
    }
}

require './templates/footer.php';