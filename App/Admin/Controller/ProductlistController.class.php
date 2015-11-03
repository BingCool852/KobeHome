<?php
namespace Admin\Controller;
use Think\Controller;
class ProductlistController extends Controller {
    public function index(){

    	$product_info = M('product');
		$count      = $product_info->count();
		$Page       = new \Think\Page($count,15);
		$show       = $Page->show();
		$list = $product_info->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('product_info',$list);
    	$this->display();
    }

}