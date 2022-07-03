<?php
      require 'header.php';

      require 'filter_form.php';
//return messeges to show
if (isset($_GET['messege'])) {
$messege=$_GET['messege'];
require 'messege.php';
}
//..............
if (isset($_POST['filtered'])) {
  require 'filter_table.php';
  }
else{
  require 'data.php';
}

require 'footer.php';
?>
