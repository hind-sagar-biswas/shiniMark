<?php
require 'header.php';

if (isset($_GET['messege'])) {
    $messege = $_GET['messege'];
    require 'messege.php';
}
//require form
require 'form.php';

require 'footer.php';
