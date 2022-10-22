<?php
require 'function.php';

$chiky = new hind();
//delete data
if(isset($_GET['status'])){
    if($_GET['status']='delete'){
        $delete_id = $_GET['id'];
        $return_message =  $chiky->delete_data($delete_id);
        if (isset($return_message)) {
  header("Location: index.php?messege=$return_message");
        }
    }
}
require 'header.php';
require 'footer.php';
