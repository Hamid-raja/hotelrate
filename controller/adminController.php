<?php

$truePath = realpath(dirname(__FILE__));

include($truePath."/../config/dbUtil.php");
include($truePath."/../config/session.php");

Session::checkLogin();
class adminController
{
    private $dbobj;

    public function __construct()
    {
        $this->dbobj = new dbUtile();
    }

    public function adminLogin($email, $adminPass)
    {
        $email = $email;
        $adminPass = $adminPass;

        if (empty($email) || empty($adminPass)) {
            $loginmsg = "<div class='alert alert-danger' role='alert'>Email or Password must not be empty! </div>";
            return $loginmsg;
        } else {
            
            $query = "SELECT * FROM admin WHERE email = '$email' AND pass = '$adminPass'";
            $result = $this->dbobj->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                // session are set using 
                // print_r($result);
                Session::set("adminlogin", true);
                Session::set("adminId", $value['id']);
                Session::set("email", $value['email']);
                Session::set("adminName", $value['name']);
                header("Location:dashboard.php");
            } else {
                $loginmsg = "<div class='alert alert-danger' role='alert'> Email or  Password not match! </div>";
                return $loginmsg;
            }
        }
    }
}
?>