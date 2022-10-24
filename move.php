<?php

require 'functions.php';
$chiky = new ShiniMark();
$transform = $chiky->transform();
if ($transform) {
    echo 'Successful';
} else {
    echo 'Failed';
}

?>