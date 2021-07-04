<?php
require_once("funcs.php");
//必ずsession_startは最初に記述
session_start();

//SESSIONを初期化(空っぽにする)
$_SESSION = array();

//Cookieに保存してある"Session IDの保存期間を過去にして破壊
if (isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-42000, '/');
}


//サーバ側での、セッションIDの破壊
session_destroy();

//処理後、login.phpへリダイレクト

redirect('login.php');

?>