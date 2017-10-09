<?php
namespace Controller;

use Controller\Controller;
use Model\UserModel;


class PassController extends Controller{

	public $user;

	public function __construct(){

		parent::__construct();
		$this->user=new UserModel();

	}

	public function show(){

		$this->display('./houtai/pass.html');
	}

	public function save(){


		//var_dump($_POST);


		if($_SERVER['REQUEST_METHOD']=="POST"){

			$password=isset($_POST['mpass'])?$_POST['mpass']:"";
			$newPass=isset($_POST['newpass'])?$_POST['newpass']:"";
			$confirm=isset($_POST['confirm'])?$_POST['confirm']:"";

		
			if(empty($password) ||empty($newPass) ||empty($confirm)){
				$this->error('密码不能为空','index.php?m=pass&a=show','3');
			}

			$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';
			//判断原密码是否正确
			
			
			$data['username'] = $userInfo['username'];
			$data['password'] =trim($password);


			$result = $this->user->doFind($data);



			if(!$result){
				$this->error('原密码不正确','index.php?m=pass&a=show','3');
				exit();
			}

			if(strcmp($newPass,$confirm)!=0){
				$this->error('两次密码不相同','index.php?m=pass&a=show','3');
				exit();
			}
			//更新数据库
			//
			$data=['password'=>md5($newPass)];

			$username=$userInfo['username'];
			$where="username='$username'";

			$resInfo=$this->user->doUpdate($data,$where);
			if($resInfo){
					$this->success('修改成功','index.php?m=pass&a=show','3');
			}else{
				$this->error('修改失败','index.php?m=pass&a=show','3');
			}

			
		}
	}
}