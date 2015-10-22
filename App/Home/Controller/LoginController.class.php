<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }

    /**
     * [checkLoginUser 验证登录用户名]
     * @DateTime  2015-09-23T10:26:09+0800
     */
    public function checkLoginUser(){
        $username = I('get.username');
        if($username != ""){
            $result = D('user')->checkUser($username);
            if (is_array($result) == 1){
                $this->ajaxReturn(array('status' => 'login_userin'));
            } else {
                $this->ajaxReturn(array('status' => 'login_usernotin'));
            }
        }
    }

    /**
     * [checkLogin 验证登录密码]
     * @DateTime  2015-09-23T15:43:38+0800
     */
    public function checkLogin(){
        $userinfo = I('get.userinfo');
        if(is_array($userinfo[0]) == 1){
            $userpassword = D('user')->getPassword($userinfo[0]['name']);
            if($userpassword !== md5($userinfo[0]['pass'])){
                $this->ajaxReturn(array('status' => 'password_error'));
            } else {
                $this->redirect('Index/index');
            }
        }
    }

    /**
     * [login 用户登录]
     * @DateTime  2015-09-23T14:07:09+0800
     */
    public function login(){
        $username = I('username');
        $password = I('password');
        $userpassword = D('user')->getPassword($username);
        if ($userpassword && $userpassword === md5($password)){
            session('username',$username);
            $this->redirect('Index/index');
        } else {
            $this->error("密码错误,请重新登录");
        }
    }

    /**
     * [checkRegisterUser 验证注册用户名]
     * @DateTime  2015-09-23T10:27:19+0800
     */
    public function checkRegisterUser(){
        if($regname = I('get.name')){
            $result = D('user')->checkUser($regname);
            if (is_array($result) == 1){
                $this->ajaxReturn(array('status' => 'in'));
            } else {
                $this->ajaxReturn(array('status' => 'notin'));
            }
        } else {
            $this->error("请稍后注册");
        }
    }

    /**
     * [register 注册用户]
     * @DateTime  2015-09-23T10:27:56+0800
     */
    public function register(){
        $username = I('regname');
        $password = I('regpass');
        $repassword = I('reregpass');
        $result = D('user')->checkUser($username);
        if(!is_array($result) && $password === $repassword){
            $userinfo['username'] = $username;
            $userinfo['password'] = md5($password);
            $userinfo['createtime'] = time();
            if(M('user')->data($userinfo)->add()){
                $this->success('注册成功');
            }
        } else {
            $this->error('注册失败');
        }
    }
 
}