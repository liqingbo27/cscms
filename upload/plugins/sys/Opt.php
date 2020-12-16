<?php 
/**
 * @Cscms 4.x open source management system
 * @copyright 2009-2015 chshcms.com. All rights reserved.
 * @Author:Cheng Jie
 * @Dtime:2014-11-24
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opt extends Cscms_Controller {

	function __construct(){
	    parent::__construct();
	    $this->load->model('Cstpl');
	}

	public function index($name=''){
		if(empty($name)){
		    msg_url(L('opt_01'),Web_Path);
		}
		//静态模式则跳转
		if(Web_Mode==3){
		    //获取静态路径
			$Htmllink = Web_Path.'opt/'.$name.'.html';
			header("Location: ".$Htmllink);
			exit;
		}
		$this->Cstpl->opt($name);
	}
}
