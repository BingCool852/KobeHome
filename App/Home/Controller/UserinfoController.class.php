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

    /**
     * [addAccounts 完善个人信息]
     */
    public function addAccounts(){
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

    /**
     * [addComAddress 添加通信地址]
     */
    public function addComAddress(){
        $com_address = M('com_address');
        $userid = D('user')->getUserid(session('username'));
        $arr = array(
            'userid' => $userid,
            'province' => I('province'),
            'city' => I('city'),
            'area' => I('area'),
            'address' => I('address'),
            'code' => I('code'),
            'tel' => I('tel'),
            'createtime' => time()
            );
        $com_address->add($arr);
        $this->redirect('userset');
    }

    /**
     * [addPostAddress 添加邮寄地址]
     */
    public function addPostAddress(){
        $post_address = M('post_address');
        $userid = D('user')->getUserid(session('username'));
        $arr = array(
            'userid' => $userid,
            'consignee' => I('consignee'),
            'province' => I('s_province'),
            'city' => I('s_city'),
            'area' => I('s_county'),
            'address' => I('address'),
            'code' => I('code'),
            'tel' => I('tel'),
            'createtime' => time()
            );
        $post_address->add($arr);
    }
}