<?php

require '../functions.php';
$mark = new ShiniMark();
$transform = $mark->transform();
if ($transform) {
    echo 'Successful';
} else {
    echo 'Failed';
}

?>