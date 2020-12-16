<?php 
/**
 * @Cscms 4.x open source management system
 * @copyright 2009-2015 chshcms.com. All rights reserved.
 * @Author:Cheng Jie
 * @Dtime:2015-03-07
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gbook extends Cscms_Controller {

	function __construct(){
	    parent::__construct();
	    $this->load->model('Cstpl');
	    $this->load->model('Csuser');
		$this->lang->load('user');
		$this->Csuser->User_Login();
	}

    //留言列表
	public function index($page=1){
	    $page=intval($page); //分页
		//模板
		$tpl='gbook.html';
		//URL地址
	    $url='gbook/index';
		//当前会员
	    $row=$this->Csdb->get_row_arr('user','*',$_SESSION['cscms__id']);
		if(empty($row['nichen'])) $row['nichen']=$row['name'];
		//装载模板
		$title=L('gbook_01');
		$ids['uid']=$_SESSION['cscms__id'];
		$ids['uida']=$_SESSION['cscms__id'];
        $this->Cstpl->user_list($row,$url,$page,$tpl,$title,'id','',$ids);
	}

    //删除留言
	public function del($id=0){
	    $id=intval($id); //ID
		if($id==0) msg_url(L('gbook_02'),'javascript:history.back();');
        $this->db->query("delete from ".CS_SqlPrefix."gbook where uida=".$_SESSION['cscms__id']." and id=".$id."");
        msg_url(L('gbook_03'),$_SERVER['HTTP_REFERER']);
	}
}
