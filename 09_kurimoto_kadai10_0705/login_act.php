<?php
session_start();


$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
echo $lid;
echo $lpw;

require_once('funcs.php');
$pdo = db_conn();

$sql = "SELECT * FROM gs_user_table WHERE lid=:lid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$res = $stmt->execute();

if($res==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    //以下を関数化
    sql_error($stmt);
  }

$val = $stmt->fetch();  //1レコードだけ取得する方法

if (password_verify($lpw, $val['lpw'])){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["id"] = $val["id"];
    $_SESSION["kanri_flg"] = $val["kanri_flg"];
    $_SESSION["life_flg"] = $val["life_flg"];
    $_SESSION["name"] = $val["name"];
    if ($_SESSION["life_flg"] == 0){
        redirect('bm_list_view_free.php');
    } else if ($_SESSION["life_flg"] == 1 && $_SESSION["kanri_flg"] == 0){
        redirect('bm_list_view_pay.php');
    } else{
        redirect('bm_list_view.php');
    }
}else{
    redirect('login.php');
}

exit();

?>


