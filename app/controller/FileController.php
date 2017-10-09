<?php
namespace Controller;

use Controller\Controller;
use Model\UploadModel;
use Model\UserModel;

class FileController extends Controller{

	public $file;
	public $user;
	public function __construct(){

		parent::__construct();

		$this->file=new UploadModel(['path'=>'public/upload']);
		$this->user=new UserModel();

	}


	public function upPic(){

		if(empty($_FILES['file']))
		{
			exit();
		}
		$path=	$this->file->upload('file');

		//var_dump(pathInfo($path));
		$infoFile=pathInfo($path);
		if(empty($infoFile['extension'])){

			$this->error("图片上传失败","index.php?m=list&a=pictureList",'3');
			exit();
		}
		$data['path']=$path;
		$data['time']=time();
		$data['uid']=$_SESSION['userInfo']['id'];

		
		$result=$this->user->table('picture')->doAdd($data);
		
		if($result){
			$this->success("图片上传成功","index.php?m=list&a=pictureList",'3');
		}else{
			$this->error("图片上传失败","index.php?m=list&a=pictureList",'3');
		}	
		
	}
}