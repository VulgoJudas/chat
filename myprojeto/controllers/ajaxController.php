<?php
class ajaxController extends controller {

	public function __construct(){
		$u=new Users();
		if(!$u->isSession()){
			header("Location:".BASE."login");
			exit;
		}
	}

    public function index(){}

    public function search(){
        $array=array();
        $u=new Users();
        if(isset($_POST['valor']) && !empty($_POST['valor'])){
            $valor=addslashes($_POST['valor']);
            $array=$u->getFriends($valor);
        }


        echo json_encode($array);
    }


    public function add_menssage(){
        $array=array('erro'=>'');
        $m=new Mensagens();
        if(isset($_POST['msg']) && !empty($_POST['msg']) && isset($_POST['amigo']) && !empty($_POST['amigo'])){
            $msg=addslashes($_POST['msg']);
            $id_amigo=addslashes($_POST['amigo']);
            $m->addmesg($msg,$id_amigo);

        }else{
            $array['erro']="não há Mensagens!";
        }


        echo json_encode($array);
    }

    public function get_messages(){
        $array=array('erro'=>'','msg'=>array());
        $m=new Mensagens();
        set_time_limit(60);
        if(isset($_POST['amigo']) && !empty($_POST['amigo'])){
            $id_amigo=addslashes($_POST['amigo']);
        }else{
            $array['erro']="Não há amigo!";
        }

        while(true){
            session_write_close();
            $msg=$m->getMessages($id_amigo);
            if(count($msg)>0){
                $array['msg']=$msg;
                break;
            }else{
                sleep(2);
                continue;
            }
        }
        echo json_encode($array);
        exit;
    }

}