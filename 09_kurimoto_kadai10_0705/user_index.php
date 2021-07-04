<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div> -->
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン画面</a></div>
    <!-- <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="user_index.php">ユーザー登録</a></div> -->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>名前<br><input type="text" name="name"></label><br>
     <label>ID<br><input type="text" name="lid"></label><br>
     <label>パスワード<br><input type="password" name="lpw"></label><br>
     <!-- <label>管理者のステイタス
        <select name="kanri_flg" id="">
            <option value="" hidden>Select</option>
            <option value="0">管理者</option>
            <option value="1">スーパー管理者</option>
        </select>
    </label><br> -->
    <label>無料会員／有料会員<br>
        <select name="life_flg" id="">
            <option value="" hidden>Select</option>
            <option value="0">無料会員</option>
            <option value="1">有料会員</option>
        </select>
    </label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
