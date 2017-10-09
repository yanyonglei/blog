<?php


namespace  Controller;

use Controller\Controller;

use Model\UserModel;

use Model\VerifyModel;

use Framework\Ucpaas;


class UserController extends Controller
{
	public $user;

	//public $verify;

	public function __construct()
	{
		parent::__construct();

		//初始初始化Moel
		$this->user = new UserModel();

		//验证码对象
		$this->verify=new VerifyModel();

		
	}
	public function register()
	{
		$this->assign('title','注册界面');
		$this->display();
	}


	

	public function doRegister()
	{
		if(empty($_POST)){

			
			exit ("<script>alert('没有数据');window.location.href='index.php?m=user&a=register'</script>");
		}


		$click=isset($_POST['yzm'])?$_POST['yzm']:'';
		if($click=="点击获取手机验证码"){

			 $phone=trim(isset($_POST['tel'])?$_POST['tel']:'');
			if(empty($phone)){
				exit ("<script>alert('手机号不能为空');window.location.href='index.php?m=user&a=register'</script>");

			}
			
			if(!preg_match("/^1[0-9]{10}$/",$phone,$match)){

				exit ("<script>alert('手机号格式不对');window.location.href='index.php?m=user&a=register'</script>");
			}


			$options['accountsid']='daf4e50a2cce0d482a9465c92e4d0836';
			$options['token']='0dc7a164baeb1a32a78599c1ebfaf93b';


			//初始化 $options必填
			$ucpass = new Ucpaas($options);

			$string=join('',array_rand(range(0,9),4));
		


			$appId = "deeeec811cd1425aa99c830131cdde4a";
			$to = $phone;
			$templateId = "139977";
			$param=$string;

			$_SESSION['yzm']=$string;


			$strJson= $ucpass->templateSMS($appId,$to,$templateId,$param);
			$str=substr($strJson,21,6);

			if($str=="000000"){
				exit ("<script>alert('发送成功');window.location.href='index.php?m=user&a=register'</script>");
			}else{
				exit ("<script>alert('发送失败3分钟后再试');window.location.href='index.php?m=user&a=register'</script>");
			}
		}
		$reg=isset($_POST['register'])?$_POST['register']:'';
		if($reg =='注册'){

			$username=trim(isset($_POST['username'])?$_POST['username']:'');
			$password=trim(isset($_POST['password'])?$_POST['password']:'');
			$confirm=trim(isset($_POST['confirm'])?$_POST['confirm']:'');

			//var_dump($username);

			if(empty($username) || empty($password) || empty($confirm)){
					$this->error('用户名或密码不能未来空','index.php?m=user&a=register','3');
					exit();
			}
			$res=$this->user->doFindByName(['username'=>$username]);
			if ($res) {
				$this->error('用户名已存在更改用户名','index.php?m=user&a=register','3');
				exit();
			}

			$data=[
				'username'=>$username,
				'password'=>md5($password),
				'rtime'=>time()
			];

			//填写的验证码
			$yzm=trim(isset($_POST['num'])?$_POST['num']:'');


			if(strcmp($password, $confirm)==0){

				$string=isset($_SESSION['yzm'])?$_SESSION['yzm']:'';

				if(strcmp($yzm,$string)==0){

					$result = $this->user->doAdd($data);

					if ($result) {

							$this->success('注册成功' , 'index.php?m=user&a=register' , '5');
					} else {
						$this->success('注册失败' , 'index.php?m=user&a=register' , '5');
					}

				}else{
					exit ("<script>alert('验证码不正确');window.location.href='index.php?m=user&a=register'</script>");
				}
			}else{

				exit ("<script>alert('两次密码不正确');window.location.href='index.php?m=user&a=register'</script>");
			}
		}
		
	}
	public function login()
	{
		$this->display();
	}

	public function out(){

		$_SESSION['userInfo']=[];
		session_destroy();
		if(empty($_SESSION['userInfo'])){
			$this->success('成功退出' , 'index.php' , '5');
		}
	}

	public function doLogin()
	{
		if(empty($_POST)){
			exit ("<script>alert('没有数据');window.location.href='index.php?m=user&a=login'</script>");
		}

		$data['username'] = trim($_POST['username']);
		$data['password'] = trim($_POST['password']);


		$result = $this->user->doFind($data);
		
		if ($result) {
			//将用户信息储存在Seesion里面
			$_SESSION['userInfo']=$result[0];
			
			$this->success('登录成功' , 'http://localhost/blog/index.php?m=mainIndex&a=analyze' , '5');
		} else {
			$this->error('登陆失败' , 'http://localhost/blog/index.php' , '5');
		}
	}	
}
