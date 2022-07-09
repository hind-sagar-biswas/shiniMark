<div class="container shadow p-1 border ">
  <center>
    <form class="form-inline" action="" method="post">
      <div class="btn-group">
        <div class="btn-group">
          <div class="input-group mb-1 mr-sm-1">
            <input type="text" class="form-control" name="search" placeholder="Search">
          </div>
        </div>
      </div>
      <div class="btn-group">
        <div class="btn-group">
          <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="category">
            <div class="dropdown-menu">
              <option selected disabled class="dropdown-item" hidden>CATEGORY</option>
              <option style="background-color:white;" value="Manga" class="dropdown-item">Manga</option>
              <option style="background-color:white;" value="Manhua" class="dropdown-item">Manhua</option>
              <option style="background-color:white;" value="Manhwa" class="dropdown-item">Manhwa</option>
              <option style="background-color:white;" value="Hentai" class="dropdown-item">Hentai</option>
              <option style="background-color:white;" value="Pornhwa" class="dropdown-item">Pornhwa
              </option>
            </div>
          </select>
        </div>

        <div class="btn-group">
          <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="condition">
            <div class="dropdown-menu">
              <option selected class="dropdown-item" value="AND">AND</option>
              <option style="background-color:white;" value="OR" class="dropdown-item">OR</option>
            </div>
          </select>
        </div>

        <div class="btn-group">
          <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="status">
            <div class="dropdown-menu">

              <option selected disabled class="dropdown-item" hidden>STATUS</option>
              <option style="background-color:white;" value="1" class="dropdown-item">Ongoing</option>
              <option style="background-color:white;" value="0" class="dropdown-item">Completed</option>
              <option style="background-color:white;" value="2" class="dropdown-item">S.END</option>
              <option style="background-color:white;" value="3" class="dropdown-item">Cancelled</option>
            </div>
          </select>
        </div>

      </div>
      <div class="btn-group">

        <div class="btn-group">
          <select type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" name="sort">
            <div class="dropdown-menu">
              <option selected class="dropdown-item" value="id" hidden>SORT BY</option>
              <option style="background-color:white;" value="time" class="dropdown-item">TIME</option>
              <option style="background-color:white;" value="id" class="dropdown-item">ADDED</option>
              <option style="background-color:white;" value="name" class="dropdown-item">NAME</option>
              <option style="background-color:white;" value="status" class="dropdown-item">STATUS</option>
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
      <button type="submit" name="filtered" class="btn btn-danger"><i class="fas fa-search"></i></button>
    </form>
  </center>
</div>
<br>