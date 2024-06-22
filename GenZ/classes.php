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
    
    public function store_projects($depart,$title,$describe,$experince,$price){
        $query = "INSERT INTO projects (depart,title,descripe,experince,price) VALUES ('$depart','$title','$describe','$experince',$price)";
        require_once("config.php");
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        mysqli_close($connect);
        return $result;
    }
    public function my_projects($user_id){
        $query= "SELECT * FROM projects WHERE user_id = '$user_id' ORDER BY created_at DESC";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        $data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public static function edit($imgname,$first_name, $last_name, $status ,$information,$password, $user_id)
    {
        $query = "UPDATE users SET img='$imgname',first_name='$first_name',last_name='$last_name',status='$status',information='$information',password='$password' WHERE user_id='$user_id'";
        require_once('config.php');
        $connect = mysqli_connect(DB_host_name, DB_user_name, DB_password, DB_name);
        $result = mysqli_query($connect, $query);
        mysqli_close($connect);
        return $result;
    }
    public function edit_pic($imgname,$user_id){
        $query= "UPDATE users SET img=$imgname WHERE user_id=$user_id";
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
