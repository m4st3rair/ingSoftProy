<?
class UserSession{
    public function __construct(){
        session_start();
    }

    public function setEmail($email){
        $_SESSION['email']=$email;
    }

    public function getEmail(){
        return $_SESSION['email'];
    }


    public function closeSession(){
        session_unset();
        session_destroy();

    }
}

?>