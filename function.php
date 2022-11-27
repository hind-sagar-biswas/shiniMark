<?php
class hind
{
    private $conn;
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'hind';

        /*$dbhost = 'sql311.epizy.com';
        $dbuser = 'epiz_32068285';
        $dbpass = "#ashed2004";
        $dbname = 'epiz_32068285_shinimark';
*/
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Database Connection Error!!");
        }
    }


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

    public function display_data()
    {
        $query = "SELECT * FROM hinds ORDER BY id DESC";
        if (mysqli_query($this->conn, $query)) {
            $returndata = mysqli_query($this->conn, $query);
            return $returndata;
        }
    }
    public function display_filtered_data($search_data, $category, $condition, $status, $sort, $order)
    {
      $limit_query=" ";
      $where_query=null;
      $order_query="ORDER BY $sort $order ";

      $query="SELECT * FROM hinds ";

      if ($search_data!=null) {
        $where_query="WHERE name LIKE '%$search_data%' ";
      }else {
        $where_query=" ";
      }

      if ($category!=null || $status!=null) {
        if ($where_query==" ") {
          $where_query="WHERE ";
        }elseif ($where_query!=" ") {
          $where_query="$where_query AND ";
        }
        if ($category!=null && $status!=null){
          $where_query="$where_query category='$category' $condition status='$status' ";
        }elseif ($category!=null) {
          $where_query="$where_query category='$category' ";
        }else {
          $where_query="$where_query status='$status' ";
        }
      }
      if (isset($_GET['page'])) {
        if ($_GET['page']!=null) {
          $init_val=($_GET['page']-1)*50;
          $limit_query="LIMIT $init_val, 50 ";
        }else {
          $limit_query="LIMIT 50 ";
        }
      }

        $query = "$query $where_query $order_query $limit_query";
        /*echo "$query";
        $query = "SELECT * FROM hinds ORDER BY id DESC";*/

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
