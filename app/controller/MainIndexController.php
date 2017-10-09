<?php
namespace Controller;

use Controller\Controller;
use Model\DiaryModel;

use Model\PageModel;


class MainIndexController extends Controller{


	public $technique;

	public $page;
	/**
	 * 主页解析
	 * @return [type] [description]
	 */

	public function __construct(){

		parent::__construct();
		
		$this->technique=new DiaryModel();


		
	}
	public function analyze(){

		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}



		//$total=$this->note->table('note')->doCount('uid',"note");
		//
		

		//在数据库blog_technique查询出 锁头的发帖内容
		
		//SELECT  * FROM blog_user,blog_technique WHERE blog_user.id=blog_technique.uid;
		
		

		$table="user,blog_technique";
		$where="blog_user.id=blog_technique.uid and type=1 and isdel=0";
		//$fields="*";

		$total=$this->technique->moreCount($table,$where,'tid');
		
		//实例化分页对象
		$this->page=new PageModel($total,3);

		//上下页首页尾页
		$render=$this->page->paging();

		//分页限制
		$limit=$this->page->offSet();

		$resTechnique=$this->technique->doSelect($table,$where,$limit);
		


		//var_dump($resTechnique);

		$this->assign('resTechnique',$resTechnique);

		//当前页
		$this->assign('currentPage',$this->page->currentPage());
		//总页数
		$this->assign('countPage',$this->page->countPage());
		//每页数
		$this->assign('page',$this->page->getNum());


		$this->assign('render',$render);
		$this->assign('title','博客之谈');
		$this->display('mainIndex.html');
	}


}