<?php
class Users extends Model{
    public function isSession(){
        if(empty($_SESSION['logado'])){
            return false;
        }else{
            return true;
        }
    }

    public function addUser($nome,$email,$senha,$foto){
        $hash=md5(time().rand(0,999));



        $sql=$this->pdo->prepare("INSERT INTO users SET hash=:hash,name=:name,email=:email,password=:password,photo=:photo");
        $sql->bindValue(':hash',$hash);
        $sql->bindValue(':name',$nome);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':password',$senha);
        $sql->bindValue(':photo',$foto);
        $sql->execute();
        $id=$this->pdo->lastInsertId();
        $sql=$this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['logado']=$sql['hash'];
            return true;
        }
    }

    public function logarUser($email,$senha){
        $sql=$this->pdo->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
        $sql->bindValue(':email',$email);
        $sql->bindValue(':password',$senha);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            $_SESSION['logado']=$sql['hash'];
            return true;
        }else{
            return false;
        }
    }

    public function emailExist($email){
        $sql=$this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $sql->bindValue(':email',$email);
        $sql->execute();

        if($sql->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public function getInfo(){
        $array=array();
        $hash=$_SESSION['logado'];
        $sql=$this->pdo->prepare("SELECT * FROM users WHERE hash=:hash");
        $sql->bindValue(':hash',$hash);
        $sql->execute();
        if($sql->rowCount()>0){
            $array=$sql->fetch();
        }

        return $array;
    }

    public function getInfoPerfil($id_user,$hash){
        $array=array();
        $sql=$this->pdo->prepare("SELECT * FROM users WHERE id=:id AND hash=:hash");
        $sql->bindValue(':id',$id_user);
        $sql->bindValue(':hash',$hash);
        $sql->execute();


        if($sql->rowCount()>0){
            $array=$sql->fetch();
        }

        return $array;

    }

    public function updateName($newName,$hash){
        $sql=$this->pdo->prepare("UPDATE users SET name=:name WHERE hash=:hash");
        $sql->bindValue(':name',$newName);
        $sql->bindValue(':hash',$hash);
        $sql->execute();
        return true;
    }

    public function updatePassword($newPass,$hash){
        $sql=$this->pdo->prepare("UPDATE users SET password=:password WHERE hash=:hash");
        $sql->bindValue(':password',$newPass);
        $sql->bindValue(':hash',$hash);
        $sql->execute();
        return true;
    }

    public function updatePhoto($newPhoto,$hash){
        $types=array('image/png','image/jpg','image/jpeg');
        if(in_array($newPhoto['type'],$types)){
            $newNamePhoto=md5(time().rand(0,9999));
            $sql=$this->pdo->prepare("UPDATE users SET photo=:photo WHERE hash=:hash");
            $sql->bindValue(':photo',$newNamePhoto.'.jpg');
            $sql->bindValue(':hash',$hash);
            $sql->execute();

            move_uploaded_file($newPhoto['tmp_name'],"assets/images/media/".$newNamePhoto.'.jpg');
            return true;
        }else{
            return false;
        }
    }

    public function getFriends($valor){
        $array=array();
        $sql=$this->pdo->prepare("SELECT * FROM users WHERE name LIKE :name LIMIT 10");
        $sql->bindValue(':name','%'.$valor.'%');
        $sql->execute();

        if($sql->rowCount()>0){
            $array=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;

    }

    public function getInfoFriend($id_user){
        $array=array();

        $sql=$this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $sql->bindValue(':id',$id_user);
        $sql->execute();

        if($sql->rowCount()>0){
            $array=$sql->fetch(PDO::FETCH_ASSOC);
        }

        return $array;
    }
    
}