<?php
namespace Model;
use Framework\Model;

class UserModel extends Model
{
	public function doAdd($data)
	{
		$result = $this->insert($data);

		return $result;
	}
	public function doFind($data)
	{
	
		$name = $data['username'];
		$pass = md5($data['password']);

		$result = $this->where("username='$name' and password= '$pass'")->select();
		return $result;
	}

	public function doSelect(){

		return $this->select();
	}
	
	public  function moreCount($table,$where,$fields){


		return $result=$this->table($table)->where($where)->count($fields);
	}
	public function countUser($table,$fields){

		return $result=$this->table($table)->count($fields);
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


	public function doFindPicInfo($data,$limit){
		$result=$this->table('picture')->where('uid='.$data['uid'])->limit($limit)->select();
		return $result;
	}



	public function doUpdate($data,$where){
		
		
		$result=$this->where($where)->update($data);

		return $result;
	}


	public function doDel(){

		return $this->del();
	}

}