<?php
namespace Admin\Model;
use Think\Model;
class ProductModel extends Model {

	/**
	 * [addproduct 添加商品信息]
	 * @param  [Array] $arr [商品信息]
	 * @return [int]      [添加成功标识]
	 */
	public function addproduct($arr){
		if(M('product')->add($arr)){
			return 1;
		}
	}

	public function getproduct(){
		return D('product')->select();
	}
}