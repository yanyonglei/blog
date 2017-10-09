<?php

namespace Controller;
use Controller\Controller;
use Model\UploadModel;
use Model\UserModel;

class AboutController extends Controller{


	public $file;
	public $user;

	public function __construct(){

		parent::__construct();

		$this->file=new UploadModel(['path'=>'public/upload']);
		$this->user=new UserModel();


	}

	public function show(){


		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}else{
				exit ("<script>alert('用户未登录，请登录');window.location.href='index.php?m=user&a=login'</script>");
		}
		

		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$sex=$_POST['sex'];
			$content=$_POST['info'];

			if(!empty($content)){

				$data['content']=$content;
			}

			if(empty($_FILES['file']))
			{
				$this->error("文件空",'index.php?m=about&a=show','3');
				exit();
			}
			$path=	$this->file->upload('file');

			
			$infoFile=pathInfo($path);
			if(empty($infoFile['extension'])){

				$this->error("图片上传失败","index.php?m=about&a=show",'3');
				exit();
			}

			$password=$_POST['password'];
			if(!empty($password)){
				$data['password']=md5(trim($password));
			}

			$data['path']=$path;
			$data['sex']=$sex;
			

	
		
			
			if (empty($userInfo)) {

				$this->error("您属于游客请登陆","index.php?m=about&a=show",'3');
				exit();
			}
			$id=$userInfo['id'];

			
				$result=$this->user->table('user')->doUpdate($data,"id=$id");
				/*var_dump($result);
				var_dump($data);*/
				
				if($result){
					$this->success("修改成功","index.php?m=about&a=show",'3');
				}else{
					$this->error("修改失败","index.php?m=about&a=show",'3');
				}	




				

				
		}


		$currentUser=$this->user->table('user')->doFindByName(['username'=>$userInfo['username'] ]);
		
		//var_dump($currentUser);
		

		$this->assign("currentUser",$currentUser[0]);
		$this->assign('title','个人简介');
		$this->display('about.html');
	}




}
