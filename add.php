<?php require 'header.php';
//add data
if(isset($_POST['submit'])){
  $return_message = $chiky->add_data($_POST);
  if (isset($return_message)) {
  header("Location: index.php?messege=$return_message");
}
  }
require 'footer.php';
