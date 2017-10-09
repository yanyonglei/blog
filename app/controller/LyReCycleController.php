<?php
namespace Controller;

use Controller\Controller;
use Model\DiaryModel;

use Model\PageModel;
class LyReCycleController extends Controller{



	public $liuyan;

	public function __construct(){

		parent::__construct();
		
		$this->liuyan=new DiaryModel();
		
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
						$result=$this->liuyan->table('liuyan')->where("id in($ids)")->doDel();

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
						
						$where="id in($ids)";
					
						$data=['isdel'=>0];

						//删除各个表内的所有数据
						$result=$this->liuyan->doUpdate($data,'liuyan',$where);
						//var_dump($result);
						//die;
						if($result){
							echo '<meta htttp-equiv="ReFreash" Content="0;index.php?m=lyrecycle&a=show">';
						}

					}
				}
			}


			$table="user,blog_liuyan";
			$where="blog_user.id=blog_liuyan.uid and isdel=1";
			//$fields="*";

			$total=$this->liuyan->moreCount($table,$where,'tid');	
			//实例化分页对象
			$this->page=new PageModel($total,3);

			//上下页首页尾页
			$render=$this->page->paging();

			//分页限制
			$limit=$this->page->offSet();

			$resLiuyan=$this->liuyan->doSelect($table,$where,$limit);
			


			//var_dump($resTechnique);

			$this->assign('resLiuyan',$resLiuyan);

			//当前页
			$this->assign('currentPage',$this->page->currentPage());
			//总页数
			$this->assign('countPage',$this->page->countPage());
			//每页数
			$this->assign('page',$this->page->getNum());
			$this->assign('render',$render);
			$this->display('./houtai/lyrecycle.html');
		}
	

}

