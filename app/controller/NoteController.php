<?php

namespace  Controller;

use Controller\Controller;

use Model\DiaryModel;
use Model\PageModel;

class NoteController  extends Controller{


	public $note;

	public function __construct(){

		parent::__construct();

		$this->note = new DiaryModel();

	}

	public function show(){

		$userInfo=isset($_SESSION['userInfo'])?$_SESSION['userInfo']:'';

		if(!empty($userInfo)){
			$this->assign('userInfo',$userInfo);
		}else{
			exit ("<script>alert('用户未登录，请登录');window.location.href='index.php?m=user&a=login'</script>");
		}


		// function moreCount($table,$where,$fields)

		$total=$this->note->moreCount('note','uid='.$userInfo['id'],'id');

	//	var_dump($total);
	//	$total=$this->note->table('note')->doCount('uid',"note");

		
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

			

			$resNote=$this->note->table('note')->doFindDiaryInfo($data,$limit);
			//var_dump($resNote);

			if($resNote){

				$this->assign('resNote',$resNote);
			}else{
				$this->assign('resNote','');
			}
		}


		$this->assign('currentPage',$this->pageInfo->currentPage());
		//总页数
		$this->assign('countPage',$this->pageInfo->countPage());
		//每页数
		$this->assign('page',$this->pageInfo->getNum());
		
		$this->assign('render',$render);

		$this->display("note.html");

		
	}





	public function save(){



		//var_dump($_POST);

		//var_dump($_POST);
		if ($_SERVER["REQUEST_METHOD"] == "POST"){


			$newnote=isset($_POST['newnote'])?$_POST['newnote']:'';

			$addnote=isset($_POST['addnote'])?$_POST['addnote']:'';


			if($newnote=="新建笔记"){


				if(empty($_POST['title'])){

					$this->error('标题不能空',"http://localhost/blog/index.php?m=note&a=show",'2');
					exit();
				}

				$title=trim($_POST['title']);


				if (empty($_POST['info'])) {
					$this->error('内容不能为空',"http://localhost/blog/index.php?m=note&a=show",'2');
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

				$resNote=$this->note->table('note')->doAdd($data);

				if($resNote){
					$this->success('笔记发表成功',"http://localhost/blog/index.php?m=note&a=show",'3');
				}else{
					$this->error('笔记发表失败!!!',"http://localhost/blog/index.php?m=note&a=show",'3');
				}
			}else if($addnote=="追加笔记"){

				
				//当前笔记的id
				$id=$_POST['id'];
			 //	var_dump($id);
				//查询当前笔记信息
				//
				$resNote=$this->note->doFindById(['id'=>$id],'note');


				//var_dump($resNote);
				//获取当前笔记信息
				$content=$resNote[0]['content'];

			//	var_dump($content);

				if(empty($_POST['title'])){

					$this->error('标题不能空',"http://localhost/blog/index.php?m=note&a=show",'2');
					exit();
				}

				$title=trim($_POST['title']);


				if (empty($_POST['info'])) {
					$this->error('内容不能为空',"http://localhost/blog/index.php?m=note&a=show",'2');
					exit();

				}

				$content.=$_POST['info'];


				//发表日记的时间
				$time=time();

				$data['title']=$title;
				$data['content']=$content;
				$data['time']=time();

				$where="id=$id";

				//更新数据表
				
				$res=$this->note->doUpdate($data,'note',$where);

				//var_dump($res);

				

				if($res){
					$this->success('笔记追加成功',"http://localhost/blog/index.php?m=note&a=show",'3');
				}else{
					$this->error('笔记追加失败!!!',"http://localhost/blog/index.php?m=note&a=show",'3');
				}

			}
		}

	}
}
