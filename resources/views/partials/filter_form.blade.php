<div class="container shadow p-1 border " id="fp">
    <center>
        <!-- class="form-inline" -->
        <form action="/" id="filter-form" name="filter-form">
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="search" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" name="filtered" class="btn btn-danger">
                        <i class="fas fa-search"></i>
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
                            <option style="background-color:white;" class="dropdown-item" value="none">NONE</option>

                            <x-form-select-options :options="$categories" show="category" />

                        </div>
                    </select>
                </div>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="condition">
                        <div class="dropdown-menu">
                            <option style="background-color:white;" class="dropdown-item" value="AND" selected>AND</option>
                            <option style="background-color:white;" class="dropdown-item" value="OR">OR</option>
                        </div>
                    </select>
                </div>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="status">
                        <div class="dropdown-menu">

                            <option class="dropdown-item" value="none" selected disabled hidden>STATUS</option>
                            <option class="dropdown-item" value="none" style="background-color:white;">NONE</option>
                            
                            <x-form-select-options :options="$status_list" show="status" />

                        </div>
                    </select>
                </div>
            </div>

            <div class="btn-group mb-1">
                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="reading_status">
                        <div class="dropdown-menu">
                            <option value="none" selected hidden>READ STATUS</option>
                            <option style="background-color:white;" class="dropdown-item" value="none">NONE</option>
                            <option style="background-color:white;" class="dropdown-item" value="catched_up">CATCHED UP</option>
                            <option style=" background-color:white;" class="dropdown-item" value="reading">READING</option>
                            <option style=" background-color:white;" class="dropdown-item" value="not_started">NOT STARTED</option>
                        </div>
                    </select>
                </div>
                <div class=" btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="sort">
                        <div class="dropdown-menu">
                            <option selected class="dropdown-item" value="id" hidden>SORT BY</option>
                            <option style="background-color:white;" class="dropdown-item" value="update_time">DEFAULT</option>
                            <option style="background-color:white;" class="dropdown-item" value="update_time">TIME</option>
                            <option style="background-color:white;" class="dropdown-item" value="id">ADDED</option>
                            <option style="background-color:white;" class="dropdown-item" value="name">NAME</option>
                            <option style="background-color:white;" class="dropdown-item" value="status_id">STATUS</option>
                            <option style="background-color:white;" class="dropdown-item" value="category_id">CATEGORY</option>
                        </div>
                    </select>
                </div>

                <div class="btn-group">
                    <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="order">
                        <div class="dropdown-menu">
                            <option selected class="dropdown-item" value="DESC" hidden>ORDER BY</option>
                            <option style="background-color:white;" value="ASC" class="dropdown-item">ASC</option>
                            <option style="background-color:white;" value="DESC" class="dropdown-item">DESC</option>
                        </div>
                    </select>
                </div>
            </div>
        </form>
    </center>
</div>
<br>