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
    
    public function store_projects($depart,$title,$describe,$experince,$price,$user_id){
        $query = "INSERT INTO projects (depart,title,descripe,experince,price,user_id) VALUES ('$depart','$title','$describe','$experince','$price','$user_id')";
        require_once("config.php");
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        mysqli_close($connect);
        return $result;
    }
      public static function home_projects(){
        $qry="SELECT * FROM projects  ORDER BY created_at DESC limit 15";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $rslt= mysqli_query($connect,$qry);
        $data= mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;   
    }
    public function my_projects($user_id){
        $query= "SELECT * FROM projects WHERE user_id =$user_id ORDER BY created_at DESC";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        $data= mysqli_fetch_all($result,MYSQLI_ASSOC);
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

}
    
        public static function store_comment($comment,$project_id,$user_id){
        $qry= "INSERT  INTO comments (content,project_id,user_id) values ('$comment','$project_id','$user_id')";
        require_once('config.php');
        $cn= mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $rslt= mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt; 
    }
        public static function get_comments($project_id){
        $qry="SELECT * FROM comments join users on comments.user_id = users.user_id WHERE project_id =$project_id ORDER BY comments.created_at DESC";
        require_once('config.php');
        $cn= mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $rslt= mysqli_query($cn,$qry);
        $data= mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;   
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
