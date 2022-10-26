<?php
class ShiniMark
{
    private $conn;
    private $bookmarkTable = 'bookmarks';
    private $categoryTable = 'categories';
    private $statusTable = 'status';
    private $websiteTable = 'websites';
    private $bookmarks = array();

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

    private $baseQuery = "SELECT b.id, b.name, b.link, c.category, b.category_id, b.current, b.latest, s.status, b.status_id
                          FROM `bookmarks` AS b
                        LEFT JOIN `categories` AS c
	                        ON b.category_id = c.id
                        LEFT JOIN `status` AS s
	                        ON b.status_id = s.id ";

    public function getBaseQuery()
    {
        return $this->baseQuery;
    }

    public function getQuery($base = '', $where = ' ', $order = 'ORDER BY b.update_time DESC', $limit = 'LIMIT 50')
    {
        $base = (empty($base)) ? $this->baseQuery : $base . ' ' ;
        $order = (empty($order)) ? ' ORDER BY b.id DESC ' : $order . ' ';

        return $base . $where . $order . $limit;
    }

    public function addData($data)
    {
        $name = htmlspecialchars($data['name']);
        $link = $data['link'];
        $categoryId = $data['category'];
        $current = $data['current'];
        $latest = $data['latest'];
        $statusId = $data['status'];

        $query = "INSERT INTO $this->bookmarkTable (name, link, category_id ,current ,latest ,status_id) VALUE('$name', '$link', '$categoryId', '$current','$latest', '$statusId')";

        if (mysqli_query($this->conn, $query)) {
            $restriction = $this->getCategory($categoryId)['restriction'];
            $parsedUrl = parse_url($link);
            if($this->addWebsite($parsedUrl['scheme'], $parsedUrl['host'], $restriction)) return "Information Added Successfully";
        }
    }

    public function getCategoryId($category, $restriction = 0)
    {
        $getquery = "SELECT id FROM $this->categoryTable WHERE category='$category'";
        $id = mysqli_fetch_assoc(mysqli_query($this->conn, $getquery));
        if (empty($id['id'])) {
            return $this->addCategory($category, $restriction);
        } else {
            return $id['id'];
        }
    }

    public function addCategory($category, $restriction)
    {
        $addquery = "INSERT INTO $this->categoryTable (category, restriction) VALUES('$category', '$restriction')";
        if (mysqli_query($this->conn, $addquery)) {
            return $this->getCategoryId($category, $restriction);
        } else {
            return 0;
        }
    }

    public function getStatusId($status)
    {
        $getquery = "SELECT id FROM $this->statusTable WHERE status='$status'";
        $id = mysqli_fetch_assoc(mysqli_query($this->conn, $getquery));
        if (empty($id['id'])) {
            return $this->addStatus($status);
        } else {
            return $id['id'];
        }
    }

    public function addStatus($status)
    {
        $addquery = "INSERT INTO $this->statusTable (status) VALUES('$status')";
        if (mysqli_query($this->conn, $addquery)) {
            return $this->getStatusId($status);
        } else {
            return 0;
        }
    }

    public function addWebsite($scheme, $host, $restriction, $type = 'manga')
    {
        $url = "$scheme://$host/";
        $name = ucfirst(explode(".", $host)[0]);
        $go = True;
        switch ($name) {
            case 'Manganato':
                $go = False;
                break;
            case 'Chapmanganato':
                $go = False;
                break;
            case 'Readmanganato':
                $go = False;
                break;
            
            default:
                $go = True;
                break;
        }
        if (!$this->checkExists($this->websiteTable, 'url', $url) && $go) {
            $addquery = "INSERT INTO $this->websiteTable (type, name, url, restriction) VALUES('$type', '$name', '$url', '$restriction')";
            if (mysqli_query($this->conn, $addquery)) return True;
            else return False;
        } return "Entry Already Exists!";
    }

    public function checkExists($table, $col, $value)
    {
        $query = "SELECT * FROM $table WHERE $col = '$value'";
        if (mysqli_num_rows(mysqli_query($this->conn, $query)) > 0) return True;
        else return False;   
    }

    public function getStatusList()
    {
        $statusList = array();
        $query = "SELECT * FROM $this->statusTable";
        if (mysqli_query($this->conn, $query)) {
            $statuses = mysqli_query($this->conn, $query);
            while ($status = mysqli_fetch_assoc($statuses)) {
                array_push($statusList, $status);
            }
            return $statusList;
        }
        return array('Something went wrong');
    }

    public function getCategoryList($restriction = 404)
    {
        $categoryList = array();
        $query = "SELECT * FROM $this->categoryTable";
        if ($restriction != 404) $query = $query . " WHERE restriction = '$restriction'";
        if (mysqli_query($this->conn, $query)) {
            $categories = mysqli_query($this->conn, $query);
            while ($category = mysqli_fetch_assoc($categories)) {
                array_push($categoryList, $category);
            }
            return $categoryList;
        }
        return array('Something went wrong');
    }

    public function getBookmarkList($query)
    {
        if (mysqli_query($this->conn, $query)) {
            $bookmarks = mysqli_query($this->conn, $query);
            while ($bookmark = mysqli_fetch_assoc($bookmarks)) {
                array_push($this->bookmarks, $bookmark); 
            }
            return (empty($this->bookmarks)) ? False : $this->bookmarks ;
        } return False;
    }

    public function getWebsiteList($restriction = 404)
    {
        $websiteList = array();
        $query = "SELECT name, url, type FROM websites";
        if ($restriction != 404) $query = "$query WHERE restriction = '$restriction'";
        if (mysqli_query($this->conn, $query)) {
            $websites = mysqli_query($this->conn, $query);
            while ($bookmark = mysqli_fetch_assoc($websites)) {
                array_push($websiteList, $bookmark);
            }
            return (empty($websiteList)) ? False : $websiteList;
        }
        return False;
    }

    public function getBookmarkCount($query)
    {
        if (mysqli_query($this->conn, $query)) {
            $bookmarks = mysqli_query($this->conn, $query);
            return mysqli_num_rows($bookmarks);
        }
        return 0;
    }

    public function getMark($id)
    {
        $query = "$this->baseQuery WHERE b.id=$id";
        if (mysqli_query($this->conn, $query)) {
            $returnData = mysqli_fetch_assoc(mysqli_query($this->conn, $query));
            return $returnData;
        }
    }

    public function getCategory($id)
    {
        $query = "SELECT * FROM $this->categoryTable WHERE id=$id";
        if (mysqli_query($this->conn, $query)) {
            $returnData = mysqli_fetch_assoc(mysqli_query($this->conn, $query));
            return $returnData;
        }
    }

    public function getStatus($id)
    {
        $query = "SELECT * FROM $this->statusTable WHERE id=$id";
        if (mysqli_query($this->conn, $query)) {
            $returnData = mysqli_fetch_assoc(mysqli_query($this->conn, $query));
            return $returnData;
        }
    }

    public function updateBookmark($data)
    {
        $name = htmlspecialchars($data['name']);
        $category = $data['category'];
        $link = $data['link'];
        $current = $data['current'];
        $latest = $data['latest'];
        $status = $data['status'];
        $id = $data['id'];

        $query = "UPDATE $this->bookmarkTable SET name='$name', link='$link', category_id='$category', current='$current', latest='$latest', status_id='$status' WHERE id='$id'";
        if (mysqli_query($this->conn, $query))  return True;
        return False;
    }

    public function updateSingle($id, $target, $value)
    {
        $query = "UPDATE $this->bookmarkTable SET $target='$value' WHERE id='$id'";
        if (mysqli_query($this->conn, $query))  return True;
        return False;
    }

    public function updateCategory($id, $newCategory, $restriction = 0)
    {
        $query = "UPDATE $this->categoryTable SET category='$newCategory', restriction='$restriction' WHERE id='$id'";
        if (mysqli_query($this->conn, $query)) return True;
        return False;
    }

    public function updateStatus($id, $newStatus)
    {
        $query = "UPDATE $this->statusTable SET status='$newStatus' WHERE id='$id'";
        if (mysqli_query($this->conn, $query)) return True;
        return False;
    }

    public function deleteData($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=$id";
        if (mysqli_query($this->conn, $query)) return True;
        return False;
    }

    /// Getting all websites from bookmarks
    public function setWebsitesFromBookmarks()
    {
        $query = "SELECT link, category_id FROM $this->bookmarkTable";
        $bookmarks = $this->getBookmarkList($query);

        echo "<pre>";
        foreach ($bookmarks as $bookmark) {
            $restriction = $this->getCategory($bookmark['category_id'])['restriction'];
            if(!empty($bookmark['link']) || $bookmark['link'] != null){
                $parsedUrl = parse_url($bookmark['link']);
                var_dump($parsedUrl);
                $this->addWebsite($parsedUrl['scheme'], $parsedUrl['host'], $restriction);
            } 
        }
        echo "</pre>";
    }

    /// Switching methods
    public function transform_add($data)
    {
        $name = $data['name'];
        $link = $data['link'];
        switch ($data['category']) {
            case 'Manga':
                $category = 1;
                break;
            case 'Manhwa':
                $category = 2;
                break;
            case 'Manhua':
                $category = 3;
                break;
            case 'Hentai':
                $category = 4;
                break;
            case 'Pornhwa':
                $category = 5;
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


    // Login
    public function login($user, $password)
    {
        $query = "SELECT * FROM admin_info WHERE username = '$user'";
        if (mysqli_query($this->conn, $query)) {
            $data = mysqli_fetch_assoc(mysqli_query($this->conn, $query));
            return password_verify($password, $data['password']);
        }
    }
}
