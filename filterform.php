<?php

if (isset($_POST['get-filterform'])) {
    $restriction = intval($_POST['restriction']);

    require './functions.php';
    $mark = new ShiniMark();

    $categories = $mark->getCategoryList($restriction);
    $statuses = $mark->getStatusList();
}

?>


<div class="container shadow p-1 border " id="fp">
    <center>
        <!-- class="form-inline" -->
        <form action="" method="post" onsubmit="return blockSubmit();" onchange="filterData()" id="filter-form" name="filter-form">
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="search" oninput="filterData()" placeholder="Search">
                <div class="input-group-append">
                    <button type="button" name="filtered" class="btn btn-danger" onclick="getDefault()">
                        <i class="fas fa-undo"></i>
                    </button>
                </div>
            </div>

            <div class="btn-group mb-1">

                <?php if ($restriction == 404) { ?>
                    <div class="btn-group">
                        <a href="./action.php?act=add&tar=category">
                            <button type="button" name="filtered" class="btn btn-danger">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </a>
                    </div>
                <?php }  ?>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="category">
                        <div class="dropdown-menu">
                            <option selected disabled class="dropdown-item" value="none" hidden>CATEGORY</option>
                            <option class="dropdown-item" value="none">NONE</option>
                            <?php
                            foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id']  ?>" class="dropdown-item">
                                    <?php echo strtoupper($category['category']) ?>
                                </option>
                            <?php } ?>
                        </div>
                    </select>
                </div>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="condition">
                        <div class="dropdown-menu">
                            <option class="dropdown-item" value="AND" selected>AND</option>
                            <option class="dropdown-item" value="OR">OR</option>
                        </div>
                    </select>
                </div>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="status">
                        <div class="dropdown-menu">

                            <option class="dropdown-item" value="none" selected disabled hidden>STATUS</option>
                            <option class="dropdown-item" value="none">NONE</option>
                            <?php
                            foreach ($statuses as $status) { ?>
                                <option value="<?php echo $status['id']  ?>" class="dropdown-item">
                                    <?php echo strtoupper($status['status']) ?>
                                </option>
                            <?php }  ?>
                        </div>
                    </select>
                </div>
            </div>

            <div class="btn-group mb-1">
                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="reading_status">
                        <div class="dropdown-menu">
                            <option value="none" selected hidden>READ STATUS</option>
                            <option class="dropdown-item" value="none">NONE</option>
                            <option class="dropdown-item" value="catched_up">CATCHED UP</option>
                            <option class="dropdown-item" value="reading">READING</option>
                            <option class="dropdown-item" value="not_started">NOT STARTED</option>
                        </div>
                    </select>
                </div>
                <div class=" btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="sort">
                        <div class="dropdown-menu">
                            <option selected class="dropdown-item" value="id" hidden>SORT BY</option>
                            <option class="dropdown-item" value="update_time">DEFAULT</option>
                            <option class="dropdown-item" value="update_time">TIME</option>
                            <option class="dropdown-item" value="id">ADDED</option>
                            <option class="dropdown-item" value="name">NAME</option>
                            <option class="dropdown-item" value="status_id">STATUS</option>
                            <option class="dropdown-item" value="category_id">CATEGORY</option>
                        </div>
                    </select>
                </div>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="order">
                        <div class="dropdown-menu">
                            <option selected class="dropdown-item" value="DESC" hidden>ORDER BY</option>
                            <option value="ASC" class="dropdown-item">ASC</option>
                            <option value="DESC" class="dropdown-item">DESC</option>
                        </div>
                    </select>
                </div>
            </div>
        </form>
    </center>
</div>
<br>