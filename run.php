<?php

if (isset($_POST['submit'])) {
    require './functions.php';

    $action = $_POST['action'];
    $target = $_POST['target'];

    function add($target, $data) 
    {
        $mark = new ShiniMark();
        switch ($target) {
            case 'bookmark':
                $mark->addData($data);
                break;
            case 'category':
                $mark->addCategory($data['category'], $data['restriction']);
                break;
            case 'status':
                $mark->addStatus($data['status']);
                break;
        }
    }
    function update($target, $data)
    {
        $mark = new ShiniMark();
        switch ($target) {
            case 'bookmark':
                $mark->updateBookmark($data);
                break;
            case 'category':
                $mark->updateCategory($data['id'], $data['category'], $data['restriction']);
                break;
            case 'status':
                $mark->updateStatus($data['id'], $data['status']);
                break;
        }
    }

    if ($action == 'add') add($target, $_POST);
    else update($target, $_POST);
} elseif (isset($_GET['del'])) {
    if (isset($_GET['target'])) {
        require './functions.php';
        $mark = new ShiniMark();

        $target = $_POST['target'];
        $id = $_POST['del'];
        switch ($target) {
            case 'bookmark':
                $mark->deleteData('bookmarks', $id);
                break;
            case 'category':
                $mark->deleteData('categories', $id);
                break;
            case 'status':
                $mark->deleteData('status', $id);
                break;
        }
    }
}
