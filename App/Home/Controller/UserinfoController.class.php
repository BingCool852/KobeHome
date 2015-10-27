<?php
namespace Home\Controller;
use Think\Controller;
class UserinfoController extends Controller {
    public function userset(){
        $userid = D('user')->getUserid(session('username'));
        $account_info = D('Accounts')->getAccounts($userid);
        $this->assign('account_info',$account_info);
        $this->display();
    }

    public function comAddress(){
        $accounts = D('accounts');
        $userid = D('user')->getUserid(session('username'));
        $result = $accounts->isInAccounts($userid);
        $arr = array(
                'userid' => $userid,
                'nickname' => I('nickname'),
                'email' => I('email'),
                'tel' => I('tel'),
                'birthyear' => I('birthyear'),
                'birthmonth' => I('birthmonth'),
                'birthday' => I('birthday'),
                'sex' => I('sex'),
                'height' => I('height'),
                'weight' => I('weight'),
                'createtime' => time()
            );
        if($result == false){
            if($accounts->add($arr)){
                $this->redirect('userset');
            } else {
                $this->error('错误');
            }
            
        } else {
            if($accounts->where(array('userid'=>$userid))->save($arr)){
                $this->redirect('userset');
            } else {
                $this->error('错误');
            }
        }
    }
}