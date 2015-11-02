<?php
namespace Admin\Model;
use Think\Model;
class ProductstocksModel extends Model {

	/**
	 * [productnum 添加商品数量]
	 * @param  [Array] $arr [数量]
	 * @return [int]      [添加成功标识]
	 */
	public function productnum($arr){
		if(M('productstocks')->add($arr)){
			return 1;
		}
	}
}