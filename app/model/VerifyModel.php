<?php

namespace Model;
use Framework\Verify;

 class VerifyModel extends Verify{


 	public function displayImg(){
		$this->getImg();
 	}
 	public function getString(){
 		return $this->getCode();
 	}
 }