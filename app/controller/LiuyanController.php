<?php


namespace Controller;
use Controller\Controller;

use Model\DiaryModel;
use Model\PageModel;

class LiuyanController extends Controller{

	public $liuyan;

	public function __construct(){

		parent::__construct();

		$this->liuyan = new DiaryModel();

	}
	public function show(){


		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){

			$this->assign('userInfo',$userInfo);
		}else{
			exit ("<script>alert('尚未登录，请登录');window.location.href='index.php?m=user&a=login'</script>");
		}



		$total=$this->liuyan->moreCount('liuyan','uid='.$userInfo['id'],'id');
		
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

			$resDiary=$this->liuyan->table('liuyan')->doFindDiaryInfo($data,$limit);



			
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

		$this->display("liuyan.html");
	}

	/**
	 * 将日记保存数据库
	 */

	public function save(){

		//var_dump($_POST);
		if ($_SERVER["REQUEST_METHOD"] == "POST"){


			$content=$_POST['info'];
			//发表日记的时间
			$time=time();
			$data['content']=$content;
			$data['time']=time();
			$data['isdel']=0;


			$uid=$_SESSION['userInfo']['id'];

			$data['uid']=$uid;
			$resDiary=$this->liuyan->table('liuyan')->doAdd($data);

			if($resDiary){

				$this->success('留言成功',"http://localhost/blog/index.php?m=liuyan&a=show",'3');
			}else{
				$this->success('留言成功!!!',"http://localhost/blog/index.php?m=liuyan&a=show",'3');
			}
		}
	}



}