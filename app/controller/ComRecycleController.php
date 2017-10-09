<?php

namespace Controller;
use Controller\Controller;
use Model\DiaryModel;
use Model\PageModel;

class ComRecycleController extends Controller{

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

	public function show(){





		if($_SERVER['REQUEST_METHOD']=="POST"){

				$del=isset($_POST['del'])?$_POST['del']:'';
				$nodel=isset($_POST['nodel'])?$_POST['nodel']:'';

				if($del=='删除'){

					$ids=isset($_POST['id'])?$_POST['id']:'';
					//var_dump($ids); 

					if(!empty($ids))
					{
						$ids=join(',',$ids);

						//数据库操作
						
						$where="id in($ids)";
					
						//删除各个表内的所有数据
						$result=$this->technique->table('technique')->where("tid in($ids)")->doDel();

						if($result){
							echo '<meta htttp-equiv="ReFreash" Content="0;index.php?m=lyrecycle&a=show">';
						}

					}

				}

				if($nodel=="还原"){

					$ids=isset($_POST['id'])?$_POST['id']:'';
					//var_dump($ids); 

					if(!empty($ids))
					{
						$ids=join(',',$ids);

						//数据库操作
						
						$where="tid in($ids)";
					
						$data=['isdel'=>0];

						//删除各个表内的所有数据
						$result=$this->technique->doUpdate($data,'technique',$where);
						//var_dump($result);
						//die;
						if($result){
							echo '<meta htttp-equiv="ReFreash" Content="0;index.php?m=lyrecycle&a=show">';
						}

					}
				}
			}




		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}



		//$total=$this->note->table('note')->doCount('uid',"note");
		//
		

		//在数据库blog_technique查询出 锁头的发帖内容
		
		//SELECT  * FROM blog_user,blog_technique WHERE blog_user.id=blog_technique.uid;
		
		

		$table="user,blog_technique";
		$where="blog_user.id=blog_technique.uid and type=0 and isdel=1";
		


		$total=$this->technique->moreCount($table,$where,'tid');
		
		//实例化分页对象
		$this->page=new PageModel($total,3);

		//上下页首页尾页
		$render=$this->page->paging();

		//分页限制
		$limit=$this->page->offSet();

		$resTechnique=$this->technique->doSelect($table,$where,$limit);

		//var_dump($resTechnique);


		//var_dump($resTechnique);

		$this->assign('resTechnique',$resTechnique);

		//当前页
		$this->assign('currentPage',$this->page->currentPage());
		//总页数
		$this->assign('countPage',$this->page->countPage());
		//每页数
		$this->assign('page',$this->page->getNum());


		$this->assign('render',$render);

		$this->display("./houtai/techrecycle.html");
	}
}
