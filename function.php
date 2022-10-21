<?php
class hind
{
  private $conn;
  public function __construct()
  {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = "";
    $dbname = 'shinimark';

    $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$this->conn) {
      die("Database Connection Error!!");
    }
  }

  public $baseQuerry = "SELECT b.name, b.link, c.category, b.current, b.latest, s.status, b.status_id
                          FROM `bookmarks` AS b
                        LEFT JOIN `categories` AS c
	                        ON b.category_id = c.id
                        LEFT JOIN `status` AS s
	                        ON b.status_id = s.id";


  public function add_data($data)
  {

    $name = htmlspecialchars($data['name']);
    $link = $data['link'];
    $category = $data['category'];
    $current = $data['current'];
    $latest = $data['latest'];
    $status = $data['status'];
    $time = $data['time'];
    $query = "INSERT INTO hinds(name,link,category,current,latest,status,time) VALUE('$name','$link','$category','$current','$latest','$status','$time')";

    if (mysqli_query($this->conn, $query)) {
      return "Information Added Successfully";
    }
  }

  public function transform_add($data)
  {
    $name = $data['name'];
    $link = $data['link'];
    switch ($data['category']) {
      case 'Manga':
        $category = 9;
        break;
      case 'Manhwa':
        $category = 10;
        break;
      case 'Manhua':
        $category = 11;
        break;
      case 'Hentai':
        $category = 12;
        break;
      case 'Pornhwa':
        $category = 13;
        break;
      default:
        $category = 9;
        break;
    }
    $current = $data['current'];
    $latest = $data['latest'];
    switch ($data['status']) {
      case '1':
        $status = 1;
        break;
      case '0':
        $status = 2;
        break;
      case '2':
        $status = 3;
        break;
      case '3':
        $status = 4;
        break;
      default:
        $status = 1;
        break;
    }
    $query = "INSERT INTO bookmarks(name, link, category_id, current, latest, status_id) VALUE('$name','$link','$category','$current','$latest','$status')";
    if (mysqli_query($this->conn, $query)) {
      return True;
    }
    return False;
  }

  public function transform()
  {
    $query = "SELECT * FROM hinds";
    if (mysqli_query($this->conn, $query)) {
      $returneddata = mysqli_query($this->conn, $query);
      while ($data = mysqli_fetch_assoc($returneddata)) {
        if (!$this->transform_add($data)) {
          return False;
        }
      }
      return True;
    }
  }

  public function display_data($query)
  {
    if (mysqli_query($this->conn, $query)) {
      $returndata = mysqli_query($this->conn, $query);
      return $returndata;
    }
  }

  public function display_data_by_id($id)
  {
    $query = "SELECT * FROM hinds WHERE id=$id";
    if (mysqli_query($this->conn, $query)) {
      $returndata = mysqli_query($this->conn, $query);
      $hindData = mysqli_fetch_assoc($returndata);
      return $hindData;
    }
  }

  public function update_data($data)
  {
    $name = htmlspecialchars($data['name1']);
    $category = $data['category1'];
    $link = $data['link1'];
    $current = $data['current1'];
    $latest = $data['latest1'];
    $status = $data['status1'];
    $id = $data['id'];
    $time = $data['time1'];

    $query = "UPDATE hinds SET name='$name', link='$link', category='$category',current='$current',latest='$latest',status='$status',time='$time' WHERE id='$id'";

    if (mysqli_query($this->conn, $query)) {
      return "Information Updated Successfully!";
    }
  }

  public function delete_data($id)
  {
    $catch_id = "SELECT * FROM hinds WHERE id=$id";
    $delete_hind_info = mysqli_query($this->conn, $catch_id);
    $hind_info_delete = mysqli_fetch_assoc($delete_hind_info);
    $query = "DELETE FROM hinds WHERE id=$id";
    if (mysqli_query($this->conn, $query)) {
      return "Deleted Successfully";
    }
  }
}
