<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
  <form class="form-inline" action="edit.php" method="post">
    <div class="input-group mb-1 mr-sm-1" id="time_holder">
      <div class="input-group-prepend">
        <div class="input-group-text bg-success text-white">1</div>
      </div>
      <input type="number" class="form-control" id="time" style="pointer-events: none; opacity: 0; visibility:hidden; width:0; height:0; position:absolute; top: -20px; left: -20px;" name="time1">
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <div class="input-group-prepend">
        <div class="input-group-text bg-info text-white font-weight-bold">1</div>
      </div>
      <input type="text" class="form-control" name="name1" value="<?php echo $hinds_data['name']; ?>" required>
      <input type="hidden" name="id" value="<?php echo $hinds_data['id']; ?>">
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <div class="input-group-prepend">
        <div class="input-group-text bg-info text-white font-weight-bold">2</div>
      </div>
      <select required class="form-control" name="category1">
        <option hidden><?php echo $hinds_data['category']; ?></option>
        <option value="Manga">Manga</option>
        <option value="Manhua">Manhua</option>
        <option value="Manhwa">Manhwa</option>
        <option value="Hentai">Hentai</option>
        <option value="Pornhwa">Pornhwa</option>
      </select>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <div class="input-group-prepend">
        <div class="input-group-text bg-warning text-white font-weight-bold">3</div>
      </div>
      <input type="number" class="form-control" name="current1" value="<?php echo $hinds_data['current']; ?>" required>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <div class="input-group-prepend">
        <div class="input-group-text bg-primary text-white font-weight-bold">4</div>
      </div>
      <input type="number" class="form-control" name="latest1" value="<?php echo $hinds_data['latest']; ?>" required>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <div class="input-group-prepend">
        <div class="input-group-text  bg-secondary text-white font-weight-bold">5</div>
      </div>
      <select class="form-control" name="status1">

        <option hidden value="<?php echo $hinds_data['status']; ?>"><?php
                                                                    if (($hinds_data['status']) == '2') {
                                                                      echo "S.End";
                                                                    } elseif (($hinds_data['status']) == '1') {
                                                                      echo "Ongoing";
                                                                    } elseif (($hinds_data['status']) == '3') {
                                                                      echo "Canceled";
                                                                    } else {
                                                                      echo "Complete";
                                                                    }; ?></option>
        <option value="0">Complete</option>
        <option value="1">Ongoing</option>
        <option value="2">S.End</option>
        <option value="3">Canceled</option>
      </select>
    </div>

    <br><br>
    <div>
      <button type="edit" name="edit" class="btn btn-success mb-1 text-white font-weight-bold">Edit</button>
      <a class="btn btn-info mb-1 text-white font-weight-bold " href="index.php">Back</a>
      <br>
    </div>
  </form>
</div>