<?php

require '../functions.php';
$mark = new ShiniMark();
$transform = $mark->setWebsitesFromBookmarks();
if ($transform) {
    echo 'Successful';
} else {
    echo 'Failed';
}
