<?php
namespace Controller;


use Controller\Controller;

use Model\DiaryModel;
use Model\PageModel;

class DiaryController extends Controller{

	public $diary;

	public function __construct(){

		parent::__construct();

		$this->diary = new DiaryModel();

	}
	public function show(){


		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}else{
				exit ("<script>alert('用户未登录，请登录');window.location.href='index.php?m=user&a=login'</script>");
		}



		$total=$this->diary->moreCount('diary','uid='.$userInfo['id'],'id');
		
		//实例化分页对象
		$this->pageInfo=new PageModel($total,1);

		//上下页首页尾页
		$render=$this->pageInfo->paging();

		//分页限制
		$limit=$this->pageInfo->offSet();

		//var_dump($limit);

		
		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		$data=[];
		if(!empty($userInfo)){

			$data['uid']=$_SESSION['userInfo']['id'];

			$resDiary=$this->diary->table('diary')->doFindDiaryInfo($data,$limit);



			//var_dump($resDiary);
			if($resDiary){
				$this->assign('resDiary',$resDiary);
			}
		}

	
		//当前页
		$this->assign('currentPage',$this->pageInfo->currentPage());
		//总页数
		$this->assign('countPage',$this->pageInfo->countPage());
		//每页数
		$this->assign('page',$this->pageInfo->getNum());
		$this->assign('render',$render);

		$this->display("diary.html");
	}

	/**
	 * 将日记保存数据库
	 */

	public function save(){

		//var_dump($_POST);
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(empty($_POST['title'])){

				$this->error('标题不能空',"http://localhost/blog/index.php?m=diary&a=show",'2');
				exit();
			}

			$title=trim($_POST['title']);


			if (empty($_POST['info'])) {
				$this->error('内容不能为空',"http://localhost/blog/index.php?m=diary&a=show",'2');
				exit();

			}
		

			$content=$_POST['info'];
			//发表日记的时间
			$time=time();

			$data['title']=$title;
			$data['content']=$content;
			$data['time']=time();


			$uid=$_SESSION['userInfo']['id'];

			$data['uid']=$uid;
			$resDiary=$this->diary->table('diary')->doAdd($data);

			if($resDiary){

				$this->success('日记发表成功',"http://localhost/blog/index.php?m=diary&a=show",'3');
			}else{
				$this->success('日记发表失败!!!',"http://localhost/blog/index.php?m=diary&a=show",'3');
			}
		}


	}



}