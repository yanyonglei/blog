<?php
namespace Model;
use Framework\Upload;

class UpLoadModel extends Upload{


	public function upload($fields){

		//上传文件
		$this->up($fields);
		return $this->path;
	}
}