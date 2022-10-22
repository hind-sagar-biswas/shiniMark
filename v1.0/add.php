<?php
require 'function.php';

//editing data
$chiky = new hind();
//add data
if (isset($_POST['submit'])) {
  $return_message = $chiky->add_data($_POST);
  if (isset($return_message)) {
    header("Location: add_bookmark.php?messege=$return_message");
  }
}

require 'header.php';
require 'footer.php';
