<?php
if ($_POST['get_data'] == 1) {
    $restriction = intval($_POST['restriction']);
    $page = (!isset($_POST['page'])) ? 1 : intval($_POST['page']);
    $heading = $_POST['heading'];

    $where_clause = ($_POST['where_clause'] == 'none') ? ' ' : $_POST['where_clause'];

    $bottomLimit = ($page - 1) * 50;
    $topLimit = $page * 50;
    $limitClause = " LIMIT $bottomLimit, $topLimit";

    require './functions.php';
    $mark = new ShiniMark();

    $baseQuery = $mark->getBaseQuery();
    $query = $mark->getQuery($baseQuery, $where_clause, $_POST['order_clause'], $limitClause);
    $queryForCount = $mark->getQuery('SELECT id FROM bookmarks AS b ', $where_clause, $_POST['order_clause'], '');

    $bookmarks = $mark->getBookmarkList($query);
    $bookmarksCount = $mark->getBookmarkCount($queryForCount);
}
?>

<center>
    <h2> <?php echo "$heading"; ?>
        <?php if (!$restriction) {  ?> <a href='./add_bookmark.php' class="text-danger"><i class="fas fa-bookmark"></i></a> <?php } ?>
    </h2>
    <p>Stories: <span class="text-danger"><?php echo $bookmarksCount; ?></span></p>

    <center style="display:flex; align-items:center; justify-content:center;">
        <ul class="pagination">
            <?php
            $active_class = "";
            $loop_count = 1;
            $page_count = ceil($bookmarksCount / 50);
            for ($loop_count = 1; $loop_count <= $page_count; $loop_count++) {
                if ($loop_count == $_POST['page']) {
                    $active_class = "bg-danger text-white";
                } else {
                    $active_class = "text-danger";
                }
                echo "<li class='page-item' onclick='pageChange(\"$loop_count\")'><a class='page-link  $active_class'>$loop_count</a></li>";
            }
            ?>
        </ul>
    </center>


    <div class="table-responsive-sm">
        <table class="table table-bordered table-sm">
            <thead class="text-center mx-auto bg-dark" style="font-size: 20px !important; color:aliceblue;">
                <tr>
                    <th class="">
                        Name
                    </th>
                    <th class="">
                        Category
                    </th>
                    <th class="">
                        Current
                    </th>
                    <th class="">
                        Latest
                    </th>
                    <th class="">
                        Status
                    </th>
                    <?php if (!$restriction) { ?>
                        <th>
                            <i class='fas fa-tasks'></i>
                        </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody class="text-center mx-auto">
                <?php if (!$bookmarks) {  ?>
                    <tr>
                        <td colspan="5" align="center">
                            <h5 class="text-danger">No records found!</h5>
                        </td>
                    </tr>
                    <?php } else {
                    foreach ($bookmarks as $bookmark) {  ?>

                        <tr>
                            <td><?php echo $bookmark['name']; ?></td>
                            <td><?php echo $bookmark['category']; ?></td>
                            <td><?php echo $bookmark['current']; ?></td>
                            <td><?php echo $bookmark['latest']; ?></td>
                            <td><?php echo $bookmark['status']; ?></td>
                            <?php if (!$restriction) { ?>
                                <td>
                                    <div class='btn-group mx auto text-center'>
                                        <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>
                                            <i class='fas fa-tasks'></i>
                                        </button>
                                        <div class='dropdown-menu p-1' style='border:none; padding:0'>
                                            <a class='btn btn-sm btn-secondary' href="action.php?act=add&tar=bookmark&id=<?php echo $bookmark['id'] ?>">
                                                <i class='fas fa-edit'></i>
                                            </a>
                                            <a class='btn btn-sm btn-danger' href="run.php?target=bookmark&del=<?php echo $bookmark['id'] ?>">
                                                <i class='fa fa-trash' aria-hidden='true'></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            <?php } ?>
                        </tr>

                <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <center style="display:flex; align-items:center; justify-content:center;">
        <ul class="pagination">
            <?php
            $active_class = "";
            $loop_count = 1;
            $page_count = ceil($bookmarksCount / 50);
            for ($loop_count = 1; $loop_count <= $page_count; $loop_count++) {
                if ($loop_count == $_POST['page']) {
                    $active_class = "bg-danger text-white";
                } else {
                    $active_class = "text-danger";
                }
                echo "<li class='page-item' onclick='pageChange(\"$loop_count\")'><a class='page-link  $active_class'>$loop_count</a></li>";
            }
            ?>
        </ul>
    </center>


</center>