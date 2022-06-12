<?php
class loginController extends Controller{
    public function index(){
        $dados=array();
        $u=new Users();
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
            $email=addslashes($_POST['email']);
            $senha=md5($_POST['password']);

            if($u->logarUser($email,$senha)){
                header("Location:".BASE);
                exit;
            }else{
                $dados['erro']="E-mail e/ou Senha errados!";
            }
        }

        $this->loadView('login',$dados);
    }

    public function cadastrar(){
        $dados=array();
        $u=new Users();
        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
            $nome=addslashes($_POST['nome']);
            $email=addslashes($_POST['email']);
            $senha=md5($_POST['password']);
            $foto='default.jpg';

            if(!$u->emailExist($email)){
                $u->addUser($nome,$email,$senha,$foto);
                header("Location:".BASE);
                exit;
            }else{
                $dados['erro']="E-mail já Cadastrado!";
            }
        }

        $this->loadView('cadastrar',$dados);
    }
}