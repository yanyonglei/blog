<?php


namespace Model;

use Framework\Page;

class PageModel  extends Page{

	/**
	 * 上下页首页 尾页
	 * @return [type] [description]
	 */
	public function paging(){

		return $this->render();
	}
	/**
	 * 当前页
	 * @return [type] [description]
	 */
	public function currentPage(){

		return $this->page;
	}

	/**
	 * 		
	 * 分页的总数
	 * @return [type] [description]
	 */
	public function countPage(){

		return $this->pageCount;
	}

	/**
	 * 分页限制
	 * @return [type] [description]
	 */
	public function offSet(){

		return $this->getOffset();
	}

	/**
	 * 每页的个数
	 * @return [type] [description]
	 */
	public function getNum(){

		return $this->num;
	}
}