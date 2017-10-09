<?php
namespace Controller;
use Controller\Controller;
/**
 * 处理index.html 文件
 */
class IndexController extends Controller{

	
	
	public function index(){

		$this->assign('title','Blog(博客之谈)');
		$this->display('index.html');
	}
	
}