<?php

namespace Controller;

use Controller\Controller;
use Model\UserModel;
use Model\PageModel;

class AdminUserController extends Controller{

	public  $page;
	public $user;

	public function __construct(){

		parent::__construct();

		$this->user=new UserModel();
	}
	public function show(){



		if($_SERVER['REQUEST_METHOD']=="POST"){


			$ids=isset($_POST['id'])?$_POST['id']:'';
			//var_dump($ids); 

			if(!empty($ids))
			{
				$ids=join(',',$ids);

				//数据库操作
				
				$where="id in($ids)";
				$result= $this->user->table('user')->where($where)->doDel();

				//删除各个表内的所有数据
				$this->user->table('note')->where("uid in($ids)")->doDel();
				$this->user->table('picture')->where(" uid in($ids)")->doDel();
				$this->user->table('technique')->where("uid in($ids)")->doDel();
			}

		}



		

		$total=$this->user->countUser('user','id');
		
		//实例化分页对象
		$this->page=new PageModel($total,2);

		//上下页首页尾页
		$render=$this->page->paging();

		//分页限制
		$limit=$this->page->offSet();


		$userLimit=$this->user->table('user')->limit($limit)->doSelect();

		//$resUseInfo=$this->user->table('user')->doSelect();


		$this->assign('resUserInfo',$userLimit);




		$this->assign('currentPage',$this->page->currentPage());
		//总页数
		$this->assign('countPage',$this->page->countPage());
		//每页数
		$this->assign('page',$this->page->getNum());
		
		$this->assign('render',$render);


		$this->display('./houtai/user.html');
	}



}