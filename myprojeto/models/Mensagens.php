<?php
class Mensagens extends Model{
    public function addmesg($msg,$id_amigo){
        $hash_user=$_SESSION['logado'];
        $sql=$this->pdo->prepare("INSERT INTO mensagens SET hash_user=:hash_user,id_friend=:id_friend,date_msm=NOW(),msg=:msg");
        $sql->bindValue(':hash_user',$hash_user);
        $sql->bindValue(':id_friend',$id_amigo);
        $sql->bindValue(':msg',$msg);
        $sql->execute();

        return true;
    }

    public function getMessages($id_amigo){
        $array=array();
        $hash_user=$_SESSION['logado'];
        $limit=6;

        $sql=$this->pdo->prepare("SELECT * FROM mensagens WHERE hash_user=:hash_user AND id_friend=:id_friend ORDER BY date_msm DESC LIMIT $limit");
        $sql->bindValue(':hash_user',$hash_user);
        $sql->bindValue(':id_friend',$id_amigo);
        $sql->execute();

        if($sql->rowCount()>0){
            $array=$sql->fetchAll(PDO::FETCH_ASSOC);
            
        }


        $array=array_reverse($array);
        return $array;
    }
}