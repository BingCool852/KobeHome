<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	/**
	 * [checkUser 判断用户是否存在]
	 * @DateTime  2015-09-23T10:23:01+0800
	 * @param     [string]                   $username [用户名]
	 * @return    Array
	 */
	function checkUser($username){
		$map['username'] = array('in',$username);
		$result = M('user')->where($map)->getField('username',true);
		return $result;
	}

	/**
	 * [getPassword 获取用户密码]
	 * @DateTime  2015-09-23T19:39:06+0800
	 * @param     [string]                   $username [用户名]
	 * @return    [string]                             [用户密码]
	 */
	function getPassword($username){
		$where['username'] = $username;
		$password = M('user')->where($where)->getField('password');
		return $password;
	}
}