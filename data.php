<?php echo "$default_btn"; ?>

<div class="container-fluid mx-auto table-center">
  <center>
    <h2> <?php echo "$heading"; ?> <a href="./add_bookmark.php"><i class="fas fa-bookmark"></i></a></h2>
    <p>Stories: <?php echo mysqli_num_rows($hind); ?></p>
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
          <th class="">
            <i class="fas fa-tasks"></i>
          </th>
        </tr>
      </thead>
      <tbody class="text-center mx-auto">
        <?php while ($hinds = mysqli_fetch_assoc($hind)) {
          $hinds['name']=htmlspecialchars_decode($hinds['name']); ?>
          <tr class="">
            <td class="<?php if ($hinds['current'] == '0') {
              echo "table-secondary";
            }elseif ($hinds['current'] < $hinds['latest']) {
              echo "table-danger text-danger";
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
            <td>


              <div class="btn-group mx auto text-center">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-tasks"></i>
                </button>
                <div class="dropdown-menu p-1" style="border:none; padding:0">
                  <center>

                        <a class="btn btn-sm btn-warning" href="edit_view.php?status=edit&&id=<?php echo $hinds['id']; ?>">
                          <i class="fas fa-edit"></i>
                        </a>

                        <a class="btn btn-sm btn-danger" href="delete.php?status=delete&&id=<?php echo $hinds['id']; ?>">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>


                  </center>
                  <style>
                    .btn-lst {
                      width: 90px;
                    }
                  </style>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  </center>
</div>
