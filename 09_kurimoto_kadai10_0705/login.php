<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>login</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="user_index.php">新規登録</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="login_act.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ログイン画面</legend>
                <label>ID：<input type="text" name="lid"></label><br>
                <label>PW：<input type="password" name="lpw"></label><br>
                <input type="submit" value="ログイン">
            </fieldset>
        </div>
    </form>
</body>

</html>
