<?php
namespace Controller;

use Controller\Controller;
use Model\DiaryModel;
class SearchController extends Controller{

	public $technique;
	public function __construct(){
		parent::__construct();
		$this->technique=new DiaryModel();
	}
	public function show(){

		//var_dump($_SERVER);
		if($_SERVER['REQUEST_METHOD']=="POST"){

			$content=isset($_POST['content'])?$_POST['content']:'';
			
			if(!empty($content)){
				$where=" content like '%$content%' or title like '%$content%' and isdel=0";
				$result=$this->technique->table('technique')->where($where)->doLike();
				//var_dump($result);
				if($result){
					$this->assign('result',$result);
				}
			}
		}


		$this->display('search.html');
	}
}

