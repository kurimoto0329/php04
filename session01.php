<?php
// SESSIONスタート
session_start();

// SESSIONのidを取得
$sid = session_id();


// SESSION変数にデータ登録

$_SESSION['name'] = '栗本';
$_SESSION['age'] = '38';


echo $sid;

?>