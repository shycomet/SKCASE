<?php
	class CommonAction extends Action{
		Public function _initialize(){
   		// 初始化的时候检查用户权限
   			if(!isset($_SESSION['Username']) || $_SESSION['Username']==''){
				$this->redirect('/doLogout');
			}
			if($_SESSION['Typeid']==2){
			$this->redirect('/Admin');
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

