<?php
if (isset($_POST['login']) && $_POST['login'] == 1) {
    require './functions.php';
    $mark = new ShiniMark();
    $success = $mark->login($_POST['user'], $_POST['password']);
    if ($success) {
        echo 1;
    } else {
        echo 0;
    }
}
