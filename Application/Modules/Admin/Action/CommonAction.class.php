<?php
	class CommonAction extends Action{
		Public function _initialize(){
		if(!isset($_SESSION['Username']) || $_SESSION['Username']==''){
			$this->redirect('/doLogout');
		$Uid=$_SESSION['Uid'];
	    $m=M('user');
	    $userinfo=$m->where("Uid='$Uid'")->find();
	    $this->assign('userinfo',$userinfo);
		}
		if($_SESSION['Typeid']==1){
			$this->redirect('/Index');
		}else{}
		}
		public function __construct() {
            parent::__construct();
            $this->checkAdminSession();
        }
        public function checkAdminSession() {
            $nowtime = time();
            $s_time = session('logintime');
            if (($nowtime - $s_time) > 900) {
                session('logintime',null);
                $this->error('当前用户未登录或登录超时，请重新登录', U('/doLogout'));
            } else {
                session('logintime',$nowtime);
            }
        }
	}
?>


