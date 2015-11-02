<?php
namespace Admin\Model;
use Think\Model;
class ProductinputModel extends Model {

	/**
	 * [inputmsg 录入商品纪录]
	 * @param  [Array] $arr [纪录信息]
	 * @return [int]      [添加成功标识]
	 */
	public function inputmsg($arr){
		if(M('productinput')->add($arr)){
			return 1;
		}
	}
}