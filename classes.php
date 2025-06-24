<?php
abstract class user
{
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    protected $password;
    public $img;
    public $phone;
    public $status;
    public $information;
    public $created_at;
    public $updated_at;

    function __construct($user_id, $first_name, $last_name, $email, $password, $img, $phone, $status, $information, $created_at, $updated_at)
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->img = $img;
        $this->phone = $phone;
        $this->status = $status;
        $this->information = $information;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function login($email, $password)
    {
        $user = null;
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        if ($arr = mysqli_fetch_assoc($result)) {
            switch ($arr["role"]) {
                case 'hire':
                    $user = new Hire($arr["user_id"], $arr["first_name"], $arr["last_name"], $arr["email"], $arr["password"], $arr["img"], $arr["phone"], $arr["status"], $arr["information"], $arr["created_at"], $arr["updated_at"]);
                    break;

                case 'job_seeker':
                    $user = new job_seeker($arr["user_id"], $arr["first_name"], $arr["last_name"], $arr["email"], $arr["password"], $arr["img"], $arr["phone"], $arr["status"], $arr["information"], $arr["created_at"], $arr["updated_at"]);
                    break;
            }
        }
        mysqli_close($connect);
        return $user;
    }
    public static function register($first_name, $last_name, $email, $phone, $password)
    {
        $query = "INSERT INTO users (first_name,last_name,Email,phone,password)
         VALUES ('$first_name','$last_name','$email',$phone,'$password')";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        mysqli_close($connect);
        return $result;
    }

    public function store_projects($depart, $title, $describe, $experince, $price, $user_id)
    {
        $query = "INSERT INTO projects (depart,title,descripe,experince,price,user_id) VALUES ('$depart','$title','$describe','$experince','$price','$user_id')";
        require_once("config.php");
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        mysqli_close($connect);
        return $result;
    }
    public static function home_projects()
    {
        $qry = "SELECT projects.*, users.first_name AS owner_first_name, users.last_name AS owner_last_name, users.img AS owner_img FROM projects JOIN users ON projects.user_id = users.user_id ORDER BY projects.created_at DESC LIMIT 15";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public function my_projects($user_id)
    {
        $query = "SELECT projects.*, users.first_name AS owner_first_name, users.last_name AS owner_last_name, users.img AS owner_img FROM projects JOIN users ON projects.user_id = users.user_id WHERE projects.user_id = $user_id
 ORDER BY created_at DESC";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public static function edit($imgname, $first_name, $last_name, $status, $information, $password, $user_id)
    {
        require_once('config.php');
        $cn = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        if (!empty($password)) {
            $password = md5($password);
            $query = "UPDATE users SET img='$imgname', first_name='$first_name', last_name='$last_name',
                  status='$status', information='$information', password='$password' WHERE user_id='$user_id'";
        } else {
            $query = "UPDATE users SET img='$imgname', first_name='$first_name', last_name='$last_name',
                  status='$status', information='$information' WHERE user_id='$user_id'";
        }

        $result = mysqli_query($cn, $query);
        mysqli_close($cn);
        return $result;
    }

    public static function get_by_id($user_id)
    {
        require_once('config.php');
        $cn = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $query = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($cn, $query);
        $data = mysqli_fetch_assoc($result);
        mysqli_close($cn);

        if (!$data) {
            return null;
        }

        if ($data['role'] === 'hire') {
            return new Hire(
                $data['user_id'],
                $data['first_name'],
                $data['last_name'],
                $data['Email'],
                $data['password'],
                $data['img'],
                $data['phone'],
                $data['status'],
                $data['information'],
                $data['created_at'],
                $data['updated_at']
            );
        } elseif ($data['role'] === 'job_seeker') {
            return new Job_seeker(
                $data['user_id'],
                $data['first_name'],
                $data['last_name'],
                $data['Email'],
                $data['password'],
                $data['img'],
                $data['phone'],
                $data['status'],
                $data['information'],
                $data['created_at'],
                $data['updated_at']
            );
        } else {
            return null;
        }
    }
    public static function depart($depart){
        $query = "SELECT * FROM projects WHERE depart ='$depart' ORDER BY created_at DESC";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public static function store_comment($comment, $project_id, $user_id)
    {
        $qry = "INSERT  INTO comments (content,project_id,user_id) values ('$comment','$project_id','$user_id')";
        require_once('config.php');
        $cn = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $rslt = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $rslt;
    }
    public static function get_comments($project_id)
    {
        $qry = "SELECT * FROM comments join users on comments.user_id = users.user_id WHERE project_id =$project_id ORDER BY comments.created_at DESC";
        require_once('config.php');
        $cn = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
public static function search($keyword) {
    require_once('config.php');
    $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
    $query1 = "SELECT *, 'project' AS result_type FROM projects 
               WHERE depart LIKE ? OR descripe LIKE ? OR title LIKE ? ORDER BY created_at DESC";
    $query2 = "SELECT *, 'user' AS result_type FROM users WHERE first_name LIKE ? OR last_name LIKE ?";
    $stmt1 = mysqli_prepare($connect, $query1);
    $search = "%$keyword%";
    mysqli_stmt_bind_param($stmt1, 'sss', $search, $search, $search);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
    $data1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    $stmt2 = mysqli_prepare($connect, $query2);
    mysqli_stmt_bind_param($stmt2, 'ss', $search, $search);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);
    $data2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    mysqli_close($connect);
    return array_merge($data1, $data2);
}


}

class Job_seeker extends user
{
    public $role = "job_seeker";
}

class Hire extends user
{
    public $role = "hire";
}