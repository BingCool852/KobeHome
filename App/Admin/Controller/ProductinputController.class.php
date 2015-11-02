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

    	$productid = I('productid');
    	$input_time = time();
    	$product_info = array(
    		'id' => $productid,
    		'product_name' => I('productname'),
    		'product_type' => I('producttype'),
    		'product_style' => I('productstyle'),
    		'product_rate' => I('productrate'),
    		'added' => I('added'),
    		'product_description' => I('productdes')
    	);

    	$product_stocks = array(
    		'productid' => $productid,
    		'productnum' => I('productnum'),
    		'createtime' => $input_time
    	);

    	$input = array(
    		'workerid' => 1,
    		'productid' => $productid,
    		'inputtime' => $input_time
    	);
    	$result1 = D('product')->addproduct($product_info);
    	$result2 = D('productinput')->inputmsg($input);
    	$result3 = D('productstocks')->productnum($product_stocks);
    	if ($result1 = $result2 = $result3){
    		$this->success("添加商品成功");
    	} else {
    		$this->error('添加商品错误');
    	}
    }
}