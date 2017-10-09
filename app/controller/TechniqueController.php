<?php

namespace Controller;

use Controller\Controller;

use Model\DiaryModel;

class TechniqueController extends Controller{



	public $technique;



	public function __construct(){

		parent::__construct();

		$this->technique = new DiaryModel();

	}
	public function show(){

		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}else{
			exit ("<script>alert('用户未登录，请登录');window.location.href='index.php'</script>");
		}


		$this->display('technique.html');
	}




	public function save(){



		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(empty($_POST['title'])){

				$this->error('标题不能空',"http://localhost/blog/index.php?m=technique&a=show",'2');
				exit();
			}

			$title=trim($_POST['title']);


			if (empty($_POST['info'])) {
				$this->error('内容不能为空',"http://localhost/blog/index.php?m=technique&a=show",'2');
				exit();

			}

			$maxTid=$this->technique->table('technique')->findMax("tid");

			$content=$_POST['info'];
			//发表日记的时间
			$time=time();
			$data['id']=$maxTid+1;
			$data['title']=$title;
			$data['content']=$content;
			$data['ttime']=time();
			$data['type']=1;
			$data['isdel']=0;
			$data['classname']=trim($_POST['classname']);
			//var_dump($data);
			//die;
			$uid=$_SESSION['userInfo']['id'];

			$data['uid']=$uid;

			$resTechnique=$this->technique->table('technique')->doAdd($data);
			//var_dump($resTechnique);
			//die;
			if($resTechnique){

				$this->success('技术文章发表成功',"http://localhost/blog/index.php?m=mainIndex&a=analyze",'3');
			}else{
				$this->success('技术文章发表失败!!!',"http://localhost/blog/index.php?m=technique&a=show",'3');
			}
		}


	}
}

