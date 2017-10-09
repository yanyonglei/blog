<?php
namespace Controller;

use Controller\Controller;

class WangYiController extends Controller{


	public function show(){


		$news=file_get_contents("http://c.m.163.com/nc/article/headline/T1348647853363/0-20.html");
		$this->assign('news',$news);

		//转化为数组存储
		$arr=json_decode($news,true);
		$arrNews=$arr['T1348647853363'];
		unset($arrNews[0]);
		$this->assign('arrNews',$arrNews);
		//	var_dump($arrNews);
		$this->assign("title","网易新闻");
		$this->display('wangyi.html');

	} 
}

