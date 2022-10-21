<?php

require 'function.php';
$chiky = new hind();
$transform = $chiky->transform();
if ($transform) {
    echo 'Successful';
} else {
    echo 'Failed';
}

?>