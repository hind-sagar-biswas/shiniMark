<?php
// require 'header.php';

//  FUNCTIONS TO LOAD DATA
require 'function.php';

$chiky = new hind();

if ($_POST['f'] == "") {
    $heading = "FILTERED BOOKMARKS";
} else {
    $heading = "BOOKMARKS";
}

$hind_not_lim = $chiky->display_data($_POST['q']);
$hind = $chiky->display_data($_POST['lq']);
?>

<!-- <div class="container-fluid mx-auto table-center"> -->
<center>
    <h2> <?php echo "$heading"; ?> <a <?php
      if (isset($_POST['l']) && $_POST['l'] == "Y") {
        echo "href='./add_bookmark.php'";
      }
      ?> class="text-danger"><i class="fas fa-bookmark"></i></a>
    </h2>
    <p>Stories: <span class="text-danger"><?php echo mysqli_num_rows($hind_not_lim); ?></span></p>

        <center style="display:flex; align-items:center; justify-content:center;">
            <ul class="pagination">
                <?php
                $active_class = "";
                $loop_count = 1;
                $page_count = ceil(mysqli_num_rows($hind_not_lim) / 50);
                for ($loop_count = 1; $loop_count <= $page_count; $loop_count++) {
                    if(!isset($_POST['p']) && $loop_count == 1){
                      $active_class = "bg-danger text-white";
                    }elseif ($loop_count == $_POST['p']) {
                      $active_class = "bg-danger text-white";
                    }else {
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
                    <?php
                    if (isset($_POST['l']) && $_POST['l'] == "Y") {
                        echo "<th>
                          <i class='fas fa-tasks'></i>
                      </th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody class="text-center mx-auto">
                <?php while ($hinds = mysqli_fetch_assoc($hind)) {
                    $hinds['name'] = htmlspecialchars_decode($hinds['name']); ?>
                    <tr <?php
                          if ($_POST['l'] != 'Y') {
                            if ($hinds['category'] == "Hentai" || $hinds['category'] == "Pornhwa") {
                                      echo "style='display:none'";
                                  }
                          }
                       ?>>
                        <td class="<?php if ($hinds['current'] == '0') {
                                        echo "border bg-secondary text-white";
                                    } elseif ($hinds['current'] < $hinds['latest']) {
                                        echo "border bg-danger text-danger";
                                    } ?>"><?php if ($hinds['link'] != null) {
                                                echo "<a href='" . $hinds['link'] . "' class='mngLink'>" . $hinds['name'] . "</a>";
                                            } else {
                                                echo $hinds['name'];
                                            } ?></td>
                        <td class=''><?php echo $hinds['category']; ?></td>
                        <td class=""><?php echo $hinds['current']; ?></td>
                        <td class=""><?php echo $hinds['latest']; ?></td>
                        <td class='table-<?php
                                            if (($hinds['status']) == '2') {
                                                echo "warning";
                                            } elseif (($hinds['status']) == '1') {
                                                echo "info";
                                            } elseif (($hinds['status']) == '3') {
                                                echo "danger";
                                            } else {
                                                echo "success";
                                            }; ?> text-<?php
                                                        if (($hinds['status']) == '2') {
                                                            echo "warning";
                                                        } elseif (($hinds['status']) == '1') {
                                                            echo "info";
                                                        } elseif (($hinds['status']) == '3') {
                                                            echo "danger";
                                                        } else {
                                                            echo "success";
                                                        }; ?>'>
                            <?php
                            if (($hinds['status']) == '2') {
                                echo "S.End";
                            } elseif (($hinds['status']) == '1') {
                                echo "Ongoing";
                            } elseif (($hinds['status']) == '3') {
                                echo "Canceled";
                            } else {
                                echo "Completed";
                            }; ?>
                        </td>

                        <?php

                        if (isset($_POST['l']) && $_POST['l'] == "Y") {
                            $temp_id = $hinds['id'];
                            echo "<td>
                                          <div class='btn-group mx auto text-center'>
                                              <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>
                                                  <i class='fas fa-tasks'></i>
                                              </button>
                                              <div class='dropdown-menu p-1' style='border:none; padding:0'>
                                                      <a class='btn btn-sm btn-secondary' href='edit_view.php?status=edit&&id=$temp_id'>
                                                          <i class='fas fa-edit'></i>
                                                      </a>
                                                      <a class='btn btn-sm btn-danger' href='delete.php?status=delete&&id=$temp_id'>
                                                          <i class='fa fa-trash' aria-hidden='true'></i>
                                                      </a>
                                              </div>
                                          </div>
                                      </td>";
                        }
                        ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <center style="display:flex; align-items:center; justify-content:center;">
        <ul class="pagination">
            <?php
            $active_class = "";
            $loop_count = 1;
            $page_count = ceil(mysqli_num_rows($hind_not_lim) / 50);
            for ($loop_count = 1; $loop_count <= $page_count; $loop_count++) {
                if(!isset($_POST['p']) && $loop_count == 1){
                  $active_class = "bg-danger text-white";
                }elseif ($loop_count == $_POST['p']) {
                  $active_class = "bg-danger text-white";
                }else {
                  $active_class = "text-danger";
                }
                echo "<li class='page-item' onclick='pageChange(\"$loop_count\")'><a class='page-link  $active_class'>$loop_count</a></li>";
            }
            ?>
        </ul>
    </center>

</center>
<!-- </div> -->
</body>

</html>
