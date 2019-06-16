<?php
class UserSession{
    
    public function __construct(){
        session_start();
    
    }
    public function create_Session($email, $nomUsr, $idUsr){
        $this->setEmail($email);
        $this->setnomUsr($nomUsr);
        $this->setidUsr($idUsr);

    }

    public function setEmail($email){
        $_SESSION['email']=$email;
    }

    public function getEmail(){
        return $_SESSION['email'];
    }
    
    public function setnomUsr($nomUsr){
        $_SESSION['nomUsr']=$nomUsr;
    }

    public function getnomUsr(){
        return $_SESSION['nomUsr'];
    }
    
    public function setidUsr($idUsr){
        $_SESSION['idUsr']=$idUsr;
    }

    public function getidUsr(){
        return $_SESSION['idUsr'];
    }


    public function closeSession(){
        session_unset();
        session_destroy();

    }
}

?>