<?php
class homeController extends controller {

	public function __construct(){
		$u=new Users();
		if(!$u->isSession()){
			header("Location:".BASE."login");
			exit;
		}
	}
	public function index(){
		$dados=array();
		$u=new Users();
		$dados['infoUser']=$u->getInfo();

		$this->loadView('home',$dados);
	}

	public function logout(){
		unset($_SESSION['logado']);
		header("Location:".BASE);
		exit;
	}

	public function perfil($id_user){
		$dados=array();
		$u=new Users();
		if(!empty($id_user) && intval($id_user)){
			$dados['perfil']=$u->getInfoPerfil($id_user,$_SESSION['logado']);
			if(empty($dados['perfil'])){
				header("Location:".BASE);
				exit;
			}

			$this->loadView('perfil',$dados);
		}else{
			header("Location:".BASE);
			exit;
		}
	}

	public function user($id_user){
		$dados=array();
		$u=new Users();
		$dados['id']=$u->getInfo();
		if(!empty($id_user) && intval($id_user)){
			if(isset($_POST['nome']) && !empty($_POST['nome'])){
				$newName=addslashes($_POST['nome']);
				$u->updateName($newName,$_SESSION['logado']);
			}

			if(isset($_POST['password']) && !empty($_POST['password'])){
				$newPass=md5($_POST['password']);
				$u->updatePassword($newPass,$_SESSION['logado']);
			}

			if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])){
				$newPhoto=$_FILES['foto'];
				$u->updatePhoto($newPhoto,$_SESSION['logado']);
			}
			$this->loadView('editar',$dados);
		}else{
			header("Location:".BASE);
			exit;
		}
	}


	public function usersearch($id_user){
		$dados=array();
		$u=new Users();
		$dados['id']=$u->getInfo();
		if(!empty($id_user) && intval($id_user)){
			if($dados['id']['id'] ==$id_user){
				header("Location:".BASE."home/perfil/".$dados['id']['id']);
				exit;
			}else{
				$dados['getinfoFriend']=$u->getInfoFriend($id_user);
				$this->loadView('chat',$dados);
			}
		}else{
			header("Location:".BASE);
			exit;
		}
	}

	public function userFriend($id_amigo){
		$dados=array();
		$u=new Users();
		if(!empty($id_amigo) && intval($id_amigo)){
			$dados['perfil']=$u->getInfoFriend($id_amigo);

			$this->loadView('perfilamigo',$dados);
			
		}else{
			header("Location:".BASE);
			exit;
		}
	}

}