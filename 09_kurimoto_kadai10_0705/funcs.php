<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//LOGIN認証チェック関数
function loginCheck(){
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        echo "LOGIN Error!";
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION ["chk_ssid"] = session_id();
    }
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。
function db_conn(){
    try {
        // $db_name = "gs_db4";    //データベース名
        // $db_id   = "root";      //アカウント名
        // $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        // $db_host = "localhost"; //DBホスト

        //sakura server用// gitにアップする際は削除する!!
        $db_name = "bisqueweasel2_09_kurimoto";    //データベース名
        $db_id   = "bisqueweasel2";                 //アカウント名
        $db_pw   = "mil01_09_26";                   //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "mysql57.bisqueweasel2.sakura.ne.jp";                     //DBホスト        


        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
    return $pdo;
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}
