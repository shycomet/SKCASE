<?php
// 本类由系统自动生成，仅供测试用途
class SetAction extends CommonAction{
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
		if($_SESSION['Typeid']==1){
			$this->redirect('/Index');
		}else{}
		}
	public function index(){
	$this->display();
    }
    public function uindex(){

        if(!IS_POST) halt("您访问的页面不存在，请稍后再试!");

        if (F('set',$_POST,CONF_PATH)){
            $this->success('修改成功', U('/Admin/Set/index'));
        } else {
            $this->error('修改失败，请修改'.CONF_PATH.'set.php文件权限');
        }
    }
	public function mysql(){
	$this->display();
    }
    public function umysql(){

        if(!IS_POST) halt("您访问的页面不存在，请稍后再试!");

        if (F('db',$_POST,CONF_PATH)){
            $this->success('修改成功', U('/Admin/Set/mysql'));
        } else {
            $this->error('修改失败，请修改'.CONF_PATH.'db.php文件权限');
        }
    }
	public function mail(){
	$this->display();
    }
    public function umail(){

        if(!IS_POST) halt("您访问的页面不存在，请稍后再试!");

        if (F('mail',$_POST,CONF_PATH)){
            $this->success('修改成功', U('/Admin/Set/mail'));
        } else {
            $this->error('修改失败，请修改'.CONF_PATH.'mail.php文件权限');
        }
    }
	public function caseclass(){
	$m=M('case_class');
	$caseclass=$m->select();
	$this->assign('caseclass',$caseclass);
	$this->display();
    }
	public function addcaseclass(){
	$this->display();
	}
	public function ccaseclass(){
	$m = M('case_class');
	$data['Title']=$_POST['Title'];
	$data['DateTime']=date('y-m-d H:i:s',time());
	$ccaseclass=$m->add($data);
	 if($ccaseclass){
		 $this->success('分类增加成功',U('/Admin/Set/caseclass'));
	 }else{
		 $this->error('分类增加失败');
	 }
	}
	public function dcaseclass(){
	$Id=$_GET['Id'];
	$m = M('case_class');
	$dcaseclass=$m->where("Id='$Id'")->delete();
	if($dcaseclass){
		$this->success('分类删除成功',U('/Admin/Set/caseclass'));
	}else{
		$this->error('分类删除失败');
		}
	}
	public function ucaseclass(){
	$Id=$_GET['Id'];
	$m=M('case_class');
	$ucaseclass=$m->where("Id='$Id'")->find();
	$this->assign('ucaseclass',$ucaseclass);
	$this->display();
	}
	public function scaseclass(){
	 $Id=$_POST['Id'];
	 $m = M('case_class'); 
	 $data['Title']=$_POST['Title'];
	 $scaseclass=$m->where("Id='$Id'")->save($data);
	 if($scaseclass){
		 $this->success('分类修改成功',U('/Admin/Set/caseclass'));
	 }else{
		 $this->error('分类修改失败');
	 }
	}
	public function questionclass(){
	$m=M('question_class');
	$questionclass=$m->select();
	$this->assign('questionclass',$questionclass);
	$this->display();
    }
	public function addquestionclass(){
	$this->display();
	}
	public function cquestionclass(){
	$m = M('question_class');
	$data['Title']=$_POST['Title'];
	$data['DateTime']=date('y-m-d H:i:s',time());
	$cquestionclass=$m->add($data);
	 if($cquestionclass){
		 $this->success('分类增加成功',U('/Admin/Set/questionclass'));
	 }else{
		 $this->error('分类增加失败');
	 }
	}
	public function dquestionclass(){
	$Id=$_GET['Id'];
	$m = M('question_class');
	$dquestionclass=$m->where("Id='$Id'")->delete();
	if($dquestionclass){
		$this->success('分类删除成功',U('/Admin/Set/questionclass'));
	}else{
		$this->error('分类删除失败');
		}
	}
	public function uquestionclass(){
	$Id=$_GET['Id'];
	$m=M('question_class');
	$uquestionclass=$m->where("Id='$Id'")->find();
	$this->assign('uquestionclass',$uquestionclass);
	$this->display();
	}
	public function squestionclass(){
	 $Id=$_POST['Id'];
	 $m = M('question_class'); 
	 $data['Title']=$_POST['Title'];
	 $squestionclass=$m->where("Id='$Id'")->save($data);
	 if($squestionclass){
		 $this->success('分类修改成功',U('/Admin/Set/carclass'));
	 }else{
		 $this->error('分类修改失败');
	 }
	}
	public function carclass(){
	$m=M('car_class');
	$carclass=$m->select();
	$this->assign('carclass',$carclass);
	$this->display();
    }
	public function addcarclass(){
	$this->display();
	}
	public function ccarclass(){
	$m = M('car_class');
	$data['Title']=$_POST['Title'];
	$data['DateTime']=date('y-m-d H:i:s',time());
	$ccarclass=$m->add($data);
	 if($ccarclass){
		 $this->success('分类增加成功',U('/Admin/Set/carclass'));
	 }else{
		 $this->error('分类增加失败');
	 }
	}
	public function dcarclass(){
	$Id=$_GET['Id'];
	$m = M('car_class');
	$dcarclass=$m->where("Id='$Id'")->delete();
	if($dcarclass){
		$this->success('分类删除成功',U('/Admin/Set/carclass'));
	}else{
		$this->error('分类删除失败');
		}
	}
	public function ucarclass(){
	$Id=$_GET['Id'];
	$m=M('car_class');
	$ucarclass=$m->where("Id='$Id'")->find();
	$this->assign('ucarclass',$ucarclass);
	$this->display();
	}
	public function scarclass(){
	 $Id=$_POST['Id'];
	 $m = M('car_class'); 
	 $data['Title']=$_POST['Title'];
	 $scarclass=$m->where("Id='$Id'")->save($data);
	 if($scarclass){
		 $this->success('分类修改成功',U('/Admin/Set/carclass'));
	 }else{
		 $this->error('分类修改失败');
	 }
	}
	public function user(){
	$m=M('user');
	$user=$m->select();
	$this->assign('user',$user);
	$this->display();
    }
	public function adduser(){
	$this->display();
	}
	public function cuser(){
			$rules = array(
			array('Username', 'require', '请输入用户名'),
			array('Username', 'english', '用户名只能为英文'),
			array('Username', '','用户名已经存在', 0 , 'unique', 1),
			array('Password','require','请输入密码'),
			array('rePassword','require','请重复密码'),
			array('Password','rePassword','两次密码不一致',0,'confirm'),
			array('Email','require','请输入邮箱'),
			array('Email','email','邮箱格式不正确'),
			);
			$User = M('user'); // 实例化User对象
			if (!$User->validate($rules)->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($User->getError());
				}else{
					$data['Username']=$_POST['Username'];
					$data['Password']=md5($_POST['Password']);
					$data['Email']=$_POST['Email'];
					$data['Realname']=$_POST['Realname'];
					$data['Faceimg']='/Data/Uploads/Photo/Face/98716679146.png';
					$data['Typeid']=$_POST['Typeid'];
					$data['RegDate']=date('y-m-d H:i:s',time());
					$data['RegIP']=$_SERVER['REMOTE_ADDR'];
					$lastId=$User->add($data);
					if($lastId){
						$this->success('增加用户成功',U('/Admin/Set/user'));
						}else{
							$this->error('增加用户失败');
						}
				}
		}
	public function duser(){
	$Uid=$_GET['Uid'];
	$m = M('user');
	$duser=$m->where("Uid='$Uid'")->delete();
	if($duser){
		$this->success('用户删除成功',U('/Admin/Set/user'));
	}else{
		$this->error('用户删除失败');
		}
	}
	public function uuser(){
	$Uid=$_GET['Uid'];
	$m=M('user');
	$uuser=$m->where("Uid='$Uid'")->find();
	$this->assign('uuser',$uuser);
	$this->display();
	}
	public function suser(){
	if(empty($_POST['Password'])){
			 $User = M('user');
			 $Uid=$_POST['Uid'];
					$data['Email']=$_POST['Email'];
					$data['Realname']=$_POST['Realname'];
					$data['Typeid']=$_POST['Typeid'];
					$lastId=$User->where("Uid='$Uid'")->save($data);
					if($lastId){
						$this->success('用户修改成功',U('/Admin/Set/user'));
						}else{
							$this->error('用户修改失败');
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
					$data['Typeid']=$_POST['Typeid'];
					$lastId=$User->where("Uid='$Uid'")->save($data);
					if($lastId){
						$this->success('用户修改成功',U('/Admin/Set/user'));
						}else{
							$this->error('用户修改失败');
						}
				}
	}
	}
}
