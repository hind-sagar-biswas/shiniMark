<?php
require 'header.php';
//editing data
  $return_messege=$chiky->update_data($_POST);
  if (isset($return_messege)) {
    header("Location: index.php?messege=$return_messege");
  }


require 'footer.php';
 ?>
