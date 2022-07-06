<div class="container shadow d-flex justify-content-center mb-4 p-5 border col-sm ">
  <form action="add.php" method="post" autocomplete="off">
    <div class="input-group mb-1 mr-sm-1" id="time_holder" style="pointer-events: none; opacity: 0; visibility:hidden; width:0; height:0; position:absolute; top: -20px; left: -20px;">
      <div class="input-group-prepend">
        <div class="input-group-text bg-info text-white">1</div>
      </div>
      <input type="number" class="form-control" id="time" name="time" placeholder="Time">
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <input type="text" class="form-control" name="name" placeholder="Name" required>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <input type="url" class="form-control" id="link" name="link" placeholder="https://">
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <select class="form-control" name="category">
        <option value="Manga">Manga</option>
        <option value="Manhua">Manhua</option>
        <option value="Manhwa">Manhwa</option>
        <option value="Hentai">Hentai</option>
        <option value="Pornhwa">Pornhwa</option>
      </select>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <input type="number" class="form-control" step="0.1" value="0" name="current" placeholder="Current" required>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <input type="number" class="form-control" step="0.1" value="1" name="latest" placeholder="Latest" required>
    </div>

    <div class="input-group mb-1 mr-sm-1">
      <select class="form-control" name="status">
        <option value="0">Completed</option>
        <option value="1">Ongoing</option>
        <option value="2">S.End</option>
        <option value="3">Canceled</option>
      </select>
    </div>
    <button type="submit" name="submit" class="btn btn-success mb-1">ADD</button>
  </form>
</div>
<br>
