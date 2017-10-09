<?php
namespace Controller;

use Controller\Controller;


use Model\DiaryModel;
use Model\PageModel;


class DetailController extends Controller{

	
	public $technique;

	public $page;
	public function __construct(){

		parent::__construct();

		$this->technique=new DiaryModel();

	}

	public function show(){


		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}else{
			exit ("<script>alert('用户未登录，请登录');window.location.href='index.php'</script>");
		}

		

		//获取技术文章的ID号
		//
		$tid=isset($_GET['id'])?$_GET['id']:"";

		$this->assign('tid',$tid);

		if(empty($tid)){
			$this->error('GET 无法获取争取的值','index.php','3');
			exit();
		}

		$table="technique";
		$where="id=".$tid.'and isdel=0';

		
		$total=$this->technique->table('technique')->moreCount("technique",$where,'id');
	
		$this->page=new PageModel($total,1);




		//上下页首页尾页
		$render=$this->page->paging();

		//分页限制
		$limit=$this->page->offSet();


		//var_dump($total);
		$resTec=$this->technique->table('technique')->doFindTecInfo(['id'=>$tid],$limit);

		
		if($_SERVER['REQUEST_METHOD']=="POST"){

			$content=!empty($_POST['info'])?$_POST['info']:'';

			if(empty($content)){
				$this->error('交流内容不能为空',"index.php?m=detail&a=show&id={$tid}",'3');
				exit();
			}
			$table="technique";
			$where="id=$tid and type=1";

			$resTec=$this->technique->table($table)->doFindWhere($table,$where);

			$classname=$resTec[0]['classname'];


			$data=[

				'id'=>$tid,
				'content'=>$content,
				'ttime'=>time(),
				'classname'=>$classname,
				'type'=>0,
				'uid'=>$_SESSION['userInfo']['id'],
				'isdel'=>0
			];

			//回复内容加入数据库
			//
			$res=$this->technique->table('technique')->doAdd($data);
			if($res){
				$this->success('交流成功',"http://localhost/blog/index.php?m=detail&a=show&id={$tid}",'3');
			}else{
				$this->error('交流内容失败',"http://localhost/blog/index.php?m=detail&a=show&id={$tid}",'3');
			}
		}
		

		//当前页
		$this->assign('currentPage',$this->page->currentPage());
		//总页数
		$this->assign('countPage',$this->page->countPage());
		//每页数
		$this->assign('page',$this->page->getNum());
		
		$this->assign('render',$render);



		$this->assign('resTec',$resTec);

		$this->display('detail.html');
	}

}

