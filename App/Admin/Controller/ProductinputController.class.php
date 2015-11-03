<?php
namespace Admin\Controller;
use Think\Controller;
class ProductinputController extends Controller {
    public function index(){
    	$this->display();
    }

    /**
     * [input 录入商品]
     */
    public function input(){

    	$productid = trim(I('productid'));
    	$input_time = time();
    	$product_info = array(
    		'id' => $productid,
    		'product_name' => trim(I('productname')),
    		'product_type' => trim(I('producttype')),
    		'product_style' => trim(I('productstyle')),
    		'product_rate' => trim(I('productrate')),
            'product_num' => trim(I('productnum')),
    		'added' => trim(I('added')),
    		'product_description' => I('productdes')
    	);
    	$input = array(
    		'workerid' => 1,
    		'productid' => $productid,
    		'inputtime' => $input_time
    	);
    	$result1 = D('product')->addproduct($product_info);
    	$result2 = D('productinput')->inputmsg($input);
    	if ($result1 = $result2){
    		$this->success("添加商品成功");
    	} else {
    		$this->error('添加商品错误');
    	}
    }
}