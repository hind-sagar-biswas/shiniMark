<?php require 'header.php';

if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $hinds_data = $chiky->display_data_by_id($id);
    }
}
  require 'edit_form.php';
  require 'footer.php';
  ?>
