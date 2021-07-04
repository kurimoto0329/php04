<?php
session_start();
require_once('funcs.php');
loginCheck();
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET["id"];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id = :id");
$stmt->bindvalue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}


?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" <?php 
                    if ($_SESSION["life_flg"] == 0){
                        echo 'href="bm_list_view_free.php"';
                    } else if ($_SESSION["life_flg"] == 1 && $_SESSION["kanri_flg"] == 0){
                        echo 'href="bm_list_view_pay.php"';
                    } else{
                        echo 'href="bm_list_view.php"';
                    }
                ?>>ブックマーク一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>User情報詳細 & 更新画面</legend>
                <label>名前<br>
                <input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                <label>ユーザーID<br>
                <input type="text" name="lid"value="<?= $result['lid'] ?>"></label><br>
                <label>ユーザーPW<br>
                <input type="text" name="lpw"value="<?= $result['lpw'] ?>"></label><br>
                <label>無料会員／有料会員<br>
                    <select name="life_flg" id="" value="<?= $result['life_flg'] ?>">
                        <!-- <option value="" hidden>Select</option> -->
                        <option value="0"<?php if ($result['life_flg']==0){echo 'selected';} ?>>無料会員</option>
                        <option value="1"<?php if ($result['life_flg']==1){echo 'selected';} ?>>有料会員</option>
                    </select>
                </label><br>
                <input type="hidden" name="kanri_flg" value="<?= $result['kanri_flg']?>">                
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <input type="submit" value="更新">

            </fieldset>
        </div>
    </form>
</body>

</html>

<script>


</script>

