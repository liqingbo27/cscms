<?php 
/**
 * @Cscms 4.x open source management system
 * @copyright 2009-2015 chshcms.com. All rights reserved.
 * @Author:Cheng Jie
 * @Dtime:2015-03-30
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends Cscms_Controller {

	function __construct(){
	    parent::__construct();
	    $this->load->model('Cstpl');
	    $this->load->model('Csuser');
		$this->Csuser->User_Login();
		$this->lang->load('user');
	}

    //登录日志
	public function index($page=1){
	    $page=intval($page); //分页
		//模板
		$tpl='journal.html';
		//URL地址
	    $url='journal/index';
		//当前会员
	    $row=$this->Csdb->get_row_arr('user','*',$_SESSION['cscms__id']);
		if(empty($row['nichen'])) $row['nichen']=$row['name'];
		//装载模板
		$title=L('journal_01');
		$ids['uid']=$_SESSION['cscms__id'];
		$ids['uida']=$_SESSION['cscms__id'];
        $this->Cstpl->user_list($row,$url,$page,$tpl,$title,'','',$ids);
	}
}
