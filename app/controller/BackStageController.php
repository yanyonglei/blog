<?php
namespace Controller;

use Controller\Controller;


class BackStageController extends Controller{


	public function show(){

		$this->display('./houtai/admin_index.html');
	}
}

