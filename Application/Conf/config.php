<?php
return array(
    //'配置项'=>'配置值'
	'LOAD_EXT_CONFIG' => 'db,set,mail',
	'APP_GROUP_LIST' => 'Home,Admin',
	'DEFAULT_GROUP' => 'Home',
	'APP_GROUP_MODE' => 1,
	'TMPL_FILE_DEPR' =>'/',
	'APP_GROUP_PATH' => 'Modules',
	'HTML_CACHE_ON' => FALSE,
	'OUTPUT_ENCODE' => FALSE,
	'URL_MODEL' => 2,
	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES' => array( //定义路由规则
	'Login'    => 'Home/Login/index',
	'doLogin'    => 'Home/Login/dologin',
	'doLogout'    => 'Home/Login/doLogout',
	'Register'    => 'Home/Register/index',
	'doReg'    => 'Home/Register/doReg',
	),
	'URL_PATHINFO_DEPR'=>'/',//修改URL的分隔符
	'TMPL_L_DELIM'=>'<{', //修改左定界符
    'TMPL_R_DELIM'=>'}>', //修改右定界符
);
?>