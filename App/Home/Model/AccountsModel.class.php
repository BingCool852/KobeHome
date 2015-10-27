<?php
namespace Home\Model;
use Think\Model;
class AccountsModel extends Model {

	/**
	 * [getAccounts 获取用户信息]
	 * @param  [int] $userid [用户id]
	 * @return [Array]         [用户信息]
	 */
	public function getAccounts($userid){
		$where['userid'] = $userid;
		$result = M('Accounts')->order('createtime DESC')->where($where)->find();
		return $result;
	}

	/**
	 * [isInAccounts userid是否存在于account]
	 * @param  [string]  $userid [用户id]
	 * @return boolean         [存在true 不存在false]
	 */
	public function isInAccounts($userid){
		$map['userid'] = array('in',$userid);
		$result = M('Accounts')->where($map)->select();
		return $result;
	}
}