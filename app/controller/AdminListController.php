<?php
namespace Controller;

use Controller\Controller;


class AdminListController extends Controller{


	public function show(){

		$this->display('./houtai/list.html');
	}
}