<?php


namespace Controller;
use Controller\Controller;
use Model\UserModel;
use Model\PageModel;

class ListController extends Controller{

	//图片信息
	public $picInfo;
	//分页信息
	public $pageIno;
	public  function __construct(){

		parent::__construct();

		$this->picInfo=new UserModel();

		
	}
	public function pictureList(){


		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}else{
				exit ("<script>alert('用户未登录，请登录');window.location.href='index.php?m=user&a=login'</script>");
		}


		$total=$this->picInfo->moreCount('picture','uid='.$userInfo['id'],'id');

		//读取读取个人上传图片的总数
		//$total=$this->picInfo->table('picture')->doCount('uid',"picture");

		//var_dump($total);

		//实例化分页对象
		$this->pageInfo=new PageModel($total,8);

		//上下页首页尾页
		$render=$this->pageInfo->paging();

		//分页限制
		$limit=$this->pageInfo->offSet();

		//var_dump($limit);

		//$where="uid=".$_SESSION['userInfo']['id'] ."limit $limit";
		//
		



		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		$data=[];
		if(!empty($userInfo)){

			$data['uid']=$_SESSION['userInfo']['id'];

			$resPic=$this->picInfo->table('picture')->doFindPicInfo($data,$limit);


			if($resPic){
				$this->assign('resPic',$resPic);
			}

		}


		//var_dump($render);
		//当前页
		$this->assign('currentPage',$this->pageInfo->currentPage());
		//总页数
		$this->assign('countPage',$this->pageInfo->countPage());
		//每页数
		$this->assign('page',$this->pageInfo->getNum());


		$this->assign('render',$render);


		$this->assign('title','个人相册');
		$this->display('listpic.html');
	}

}