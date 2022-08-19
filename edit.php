<?php
require 'function.php';

//editing data
$chiky = new hind();
  $return_messege=$chiky->update_data($_POST);
  if (isset($return_messege)) {
    header("Location: index.php?messege=$return_messege");
  }

require 'header.php';
require 'footer.php';
 ?>
