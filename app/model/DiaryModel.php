<?php

namespace Model;

use Framework\Model;

class DiaryModel extends Model{



	public function doAdd($data){


		$result = $this->insert($data);

		return $result;
	}


	public function doCount($fields,$table){

		$result=$this->table($table)->where('uid='.$fields)->count($fields);

		return $result;
	}

	public function doFindByName($data){

		$name = $data['username'];

		$result = $this->where("username='$name'")->select();
		return $result;

	}


	public  function moreCount($table,$where,$fields){

		return $result=$this->table($table)->where($where)->count($fields);
	}

	public function findMax($fields){

			$result=$this->max($fields);
			return $result;
		}


	
	public function doFindById($data,$table){

		$id = $data['id'];

		$result = $this->table($table)->where("id='$id'")->select();

		return $result;

	}

	public function doFindWhere($table,$where){

		$result =$this->table($table)->where($where)->select();

		return $result;
	}


	public function doSelect($table,$where,$limit){


		return $this->table($table)->where($where)->limit($limit)->select();
	}

	public function doFindDiaryInfo($data,$limit){
		
		$result=$this->where('uid='.$data['uid'])->limit($limit)->select();
		return $result;
	}


	public function doFindTecInfo($data,$limit){
		$result=$this->where('id='.$data['id'])->limit($limit)->select();
		return $result;

	}

	public function doUpdate($data,$table,$where){

		
		$result=$this->table($table)->where($where)->update($data);
		
		return $result;
	}

	public function doDel(){

		return $this->del();
	}	

	public function doLike(){

		$result=$this->select();
		return $result;
	}	

}