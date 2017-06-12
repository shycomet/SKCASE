<?php
	class LoginAction extends Action{
		public function index(){
			$this->display();
		}
		public function doLogin(){
			//接受值
			//判断用户在数据库中是否存在
			//存在 允许登录
			//不存在 显示错误信息
			$Username=$_POST['Username'];
			$Password=md5($_POST['Password']);
			
			$rules = array(
			array('Username', 'require', '请输入用户名'),
			array('Password','require','请输入密码'),
			);
			
			$user=M('User');
			$where['Username']=$Username;
			$where['Password']=$Password;
			if (!$user->validate($rules)->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($user->getError());
				}else{
			$arr=$user->field('Uid')->where($where)->find();
			$arrn=$user->field('Typeid')->where($where)->find();
			$Uid=$arr['Uid'];
			$Typeid=$arrn['Typeid'];
			if($arr){
				$_SESSION['Username']=$Username;
				$_SESSION['Uid']=$arr['Uid'];
				$_SESSION['Typeid']=$arrn['Typeid'];
				session('logintime',time());
				if($arrn['Typeid']==1){
				$this->success('用户登录成功',U('/Index/index'));
				}else{
					$this->success('管理员登录成功',U('/Admin/Index/index'));
				}
			}else{
				$this->error('用户名或密码错误');
			}
				}
		}
		//退出
		public function doLogout(){
			$_SESSION=array();
				if(isset($_COOKIE[session_name()])){
					setcookie(session_name(),'',time()-1,'/');
				}
			session_destroy();
			$this->redirect('/Login');
		}
	}
?>
