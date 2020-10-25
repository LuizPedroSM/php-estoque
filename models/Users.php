<?php
class Users extends Model {
    private $info;
    public function verifyUser($number, $pass)
    {
        $sql = "SELECT * FROM users WHERE user_number = :number AND user_pass = :pass";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":number", $number);
        $sql->bindValue(":pass", md5($pass));
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    public function createToken($number)
    {
        $token = md5(time().rand(0,999).$number);
        $sql = "UPDATE users SET user_token = :token WHERE user_number = :number";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":token", $token);
        $sql->bindValue(":number", $number);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            return $token;
        } else {
            return false;
        }
    }

    public function checkLogin()
    {       
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $sql = "SELECT * FROM users WHERE user_token = :token";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->execute();
            
            if ($sql->rowCount() > 0 ) {
                $this->info = $sql->fetch();                
                return true;
            } 
        }       
        return false;
    }
}