<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    // public function index(){
    //     $this->display();
    // }
    
    /**
     * [logout 退出登录，清除session]
     * @DateTime  2015-10-10T10:08:50+0800
     */
    public function logout(){
		$_SESSION = array(); //清除SESSION值.
        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
            setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();  //清除服务器的sesion文件
        $this->redirect('Index/index');
	}
}