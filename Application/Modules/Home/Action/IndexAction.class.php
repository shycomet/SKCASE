<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    Public function _initialize(){
		if(!isset($_SESSION['Username']) || $_SESSION['Username']==''){
		$this->redirect('/doLogout');
		}
		$Uid=$_SESSION['Uid'];
	    $m=M('user');
	    $userinfo=$m->where("Uid='$Uid'")->find();
	    $this->assign('userinfo',$userinfo);
		$nowtime = time();
            $s_time = session('logintime');
            if (($nowtime - $s_time) > 900) {
                session('logintime',null);
                $this->error('当前用户未登录或登录超时，请重新登录', U('/doLogout'));
            } else {
                session('logintime',$nowtime);
            }
		if($_SESSION['Typeid']==2){
			$this->redirect('/Admin');
		}else{}
		}
	public function index(){
	$m=M('question');
	$question=$m->select();
	$this->assign('question',$question);
	$m=M('case');
	$case=$m->select();
	$this->assign('case',$case);
	$this->display();
    }
	public function ask(){
	$m=M('question_class'); //连接到数据表
	$qclass=$m->select();  //查询数据
	$this->assign('qclass',$qclass);  //将查询到数据作为信号传输到模板
	$this->display();
    }
	public function doask(){
	$data['Title']=$_POST['Title']; //获取提交的问题标题
	$data['Uid']=$_POST['Uid'];
	$data['Cid']=$_POST['Cid'];    //获取提问者ID
	$data['Content']=$_POST['Content'];   //获取问题描述
	$data['DateTime']=date('y-m-d H:i:s',time());   //获取当前时间
	$m=M('question');
	$doask=$m->add($data);  //将数组（由获取到的数据组成）添加到数据库
	if($doask){
		$this->success('发表问题成功',U('/Index/myquestion'));
	}else{
		$this->error('发表问题失败');
	}
    }
	public function question(){
	$Cid=$_GET['Id'];
	$m=M('question');
	if(!isset($_GET['Id']) || $_GET['Id']==''){
		$question=$m->select();
	}else{
		$question=$m->where("Cid='$Cid'")->select();
	}
	$this->assign('question',$question);
	$this->display();
    }
	public function qdetails(){
	$Id=$_GET['Id'];   //获取查询ID
	$m=M('question');
	$qdetails=$m->find($Id);  //根据ID进行查询
	$this->assign('qdetails',$qdetails);
	$m=M('answer');
	$answer=$m->where("Qid='$Id'")->select();
	$this->assign('answer',$answer);
	$this->display();
    }
	public function doanswer(){
	$data['Uid']=$_POST['Uid'];
	$data['Qid']=$_POST['Qid']; 
	$data['Content']=$_POST['Content']; 
	$data['DateTime']=date('y-m-d H:i:s',time());
	$m=M('answer');
	$doanswer=$m->add($data);
	if($doanswer){
		$this->success('发表答案成功');
	}else{
		$this->error('发表答案失败');
	}
    }
	public function addcase(){
	$m=M('case_class'); //连接到数据表
	$cclass=$m->select();  //查询数据
	$this->assign('cclass',$cclass);  //将查询到数据作为信号传输到模板
	$m=M('car_class'); //连接到数据表
	$carclass=$m->select();  //查询数据
	$this->assign('carclass',$carclass);  //将查询到数据作为信号传输到模板
	$this->display();
    }
	public function docase(){
	$data['Title']=$_POST['Title']; //获取提交的问题标题
	$data['Uid']=$_POST['Uid'];
	$data['Cid']=$_POST['Cid'];    //获取提问者ID
	$data['Carid']=$_POST['Carid'];    //获取提问者ID
	$data['Content']=$_POST['Content'];   //获取问题描述
	$data['DateTime']=date('y-m-d H:i:s',time());   //获取当前时间
	$m=M('case');
	$docase=$m->add($data);  //将数组（由获取到的数据组成）添加到数据库
	if($docase){
		$this->success('案例上传成功',U('/Index/mycase'));
	}else{
		$this->error('案例上传失败');
	}
    }
	public function mycase(){
	$Uid=$_SESSION['Uid'];
	$m=M('case');
	$mycase=$m->where("Uid='$Uid'")->select();
	$this->assign('mycase',$mycase);
	$this->display();
    }
	public function acase(){
	$Cid=$_GET['Id'];
	$m=M('case');
	if(!isset($_GET['Id']) || $_GET['Id']==''){
		$case=$m->select();
	}else{
		$case=$m->where("Cid='$Cid'")->select();
	}
	$this->assign('case',$case);
	$this->display();
    }
	public function dcase(){
	$Id=$_GET['Id'];
	$m=M('case');
	$dcase=$m->where("Id='$Id'")->delete();
	if($dcase){
		$this->success('案例删除成功',U('/Index/mycase'));
	}else{
		$this->error('案例删除失败');
	}
    }
	public function ecase(){
	$Id=$_GET['Id'];
	$m=M('case');
	$ecase=$m->find($Id);  //根据ID进行查询
	$this->assign('ecase',$ecase);
	$Cid=$ecase['Cid'];
	$m=M('case_class');
	$cclass=$m->where("Id<>'$Cid'")->select();
	$this->assign('cclass',$cclass);
	$Carid=$ecase['Carid'];
	$m=M('car_class');
	$carclass=$m->where("Id<>'$Carid'")->select();
	$this->assign('carclass',$carclass);
	$this->display();
    }
	public function cdetails(){
	$Id=$_GET['Id'];   //获取查询ID
	$m=M('case');
	$cdetails=$m->find($Id);  //根据ID进行查询
	$this->assign('cdetails',$cdetails);
	$this->display();
    }
	public function ucase(){
	$Id=$_POST['Id'];
	$data['Title']=$_POST['Title'];
	$data['Cid']=$_POST['Cid'];
	$data['Carid']=$_POST['Carid'];
	$data['Content']=$_POST['Content'];
	$m=M('case');
	$ucase=$m->where("Id='$Id'")->save($data);
	if($ucase){
		$this->success('案例修改成功',U('/Index/mycase'));
	}else{
		$this->error('案例修改失败');
	}
    }
	public function myquestion(){
	$Uid=$_SESSION['Uid'];
	$m=M('question');
	$question=$m->where("Uid='$Uid'")->select();
	$this->assign('question',$question);
	$this->display();
    }
	public function dquestion(){
	$Id=$_GET['Id'];
	$m=M('question');
	$dquestion=$m->where("Id='$Id'")->delete();
	if($dquestion){
		$this->success('问题删除成功',U('/Index/myquestion'));
	}else{
		$this->error('问题删除失败');
	}
    }
	public function equestion(){
	$Id=$_GET['Id'];   //获取查询ID
	$m=M('question');
	$equestion=$m->find($Id);  //根据ID进行查询
	$this->assign('equestion',$equestion);
	$Cid=$equestion['Cid'];
	$m=M('question_class');
	$qclass=$m->where("Id<>'$Cid'")->select();
	$this->assign('qclass',$qclass);
	$this->display();
    }
	public function uquestion(){
	$Id=$_POST['Id'];
	$data['Title']=$_POST['Title'];
	$data['Cid']=$_POST['Cid'];
	$data['Content']=$_POST['Content'];
	$m=M('question');
	$uquestion=$m->where("Id='$Id'")->save($data);
	if($uquestion){
		$this->success('问题修改成功',U('/Index/myquestion'));
	}else{
		$this->error('问题修改失败');
	}
    }
	public function myanswer(){
	$Uid=$_SESSION['Uid'];
	$m=M('answer');
	$myanswer=$m->where("Uid='$Uid'")->select();
	$this->assign('myanswer',$myanswer);
	$this->display();
    }
	public function danswer(){
	$Id=$_GET['Id'];
	$m=M('answer');
	$danswer=$m->where("Id='$Id'")->delete();
	if($danswer){
		$this->success('答案删除成功',U('/Index/myanswer'));
	}else{
		$this->error('答案删除失败');
	}
    }
	public function eanswer(){
	$Id=$_GET['Id']; 
	$m=M('answer');
	$eanswer=$m->find($Id);
	$this->assign('eanswer',$eanswer);
	$this->display();
    }
	public function uanswer(){
	$Id=$_POST['Id'];
	$data['Content']=$_POST['Content'];
	$m=M('answer');
	$uanswer=$m->where("Id='$Id'")->save($data);
	if($uanswer){
		$this->success('答案修改成功',U('/Index/myanswer'));
	}else{
		$this->error('答案修改失败');
	}
    }
	public function face(){
	$Uid=$_SESSION['Uid'];
	//商家信息
	$l=M('shop');
	$shop=$l->find($Uid);
	//输出商家信息
	$this->assign('shop',$shop);
	$this->display();
    }
	public function uface(){
	import('ORG.Net.UploadFile');
	 $upload = new UploadFile();// 实例化上传类
	 $upload->maxSize  = 3145728 ;// 设置附件上传大小
	 $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 $upload->savePath =  './Data/Uploads/Photo/Face/';// 设置附件上传目录
	 if(!$upload->upload()) {// 上传错误提示错误信息
	 $this->error($upload->getErrorMsg());
	 }else{// 上传成功 获取上传文件信息
	 $info =  $upload->getUploadFileInfo();
	 }
	 $Img = '/Data/Uploads/Photo/Face/'.$info[0]['savename']; // 保存上传的照片根据需要自行组装
	 // 保存表单数据 包括附件数据
	 $Uid=$_POST['Uid'];
	 $c = M('user'); // 实例化User对象
	 $data['Faceimg']=$Img;
	 $uface=$c->where("Uid='$Uid'")->save($data);
	 if($uface){
		 $this->success('修改头像成功',U('/Index/face'));
	 }else{
		 $this->error('修改头像失败');
	 }
	}
	public function uaccount(){
	if(empty($_POST['Password'])){
			 $User = M('user');
			 $Uid=$_POST['Uid'];
					$data['Email']=$_POST['Email'];
					$data['Realname']=$_POST['Realname'];
					$lastId=$User->where("Uid='$Uid'")->save($data);
					if($lastId){
						$this->success('账号修改成功',U('/Index/account'));
						}else{
							$this->error('账号修改失败');
						}
	}else{
		$rules = array(
			array('Password','require','请输入密码'),
			array('rePassword','require','请重复密码'),
			array('Password','rePassword','两次密码不一致',0,'confirm'),
			array('Email','require','请输入邮箱'),
			array('Email','email','邮箱格式不正确'),
			);
			$User = M('User'); // 实例化User对象
			if (!$User->validate($rules)->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($User->getError());
				}else{
					$Uid=$_POST['Uid'];
					$data['Password']=md5($_POST['Password']);
					$data['Email']=$_POST['Email'];
					$data['Realname']=$_POST['Realname'];
					$lastId=$User->where("Uid='$Uid'")->save($data);
					if($lastId){
						$this->success('账号修改成功',U('/Index/account'));
						}else{
							$this->error('账号修改失败');
						}
				}
	}
	}
}