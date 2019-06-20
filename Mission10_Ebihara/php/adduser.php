<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>ユーザ登録</title>
</head>
<body>
    <div class="contents-wrap">
        <div class="main-title">
            <h1>読書記録アプリ</h1>
            <h2>ユーザー登録画面</h2>
        </div>
        <form id="input-form" class="input-form" action="user_write.php" method="post">
            <div class="form-parts">
                <label for="name" class="labels">ユーザー名</label>
                    <input type="text" name="name" id="name" class="input-parts">
            </div>
            <div class="form-parts">
                <label for="login_id" class="labels">ログイン用ユーザーID</label>
                    <input type="text" name="login_id" id="login_id" class="input-parts">
            </div>
            <div class="form-parts">
                <label for="login_pass" class="labels">ログイン用パスワード</label>
                    <input type="password" name="login_pass" id="user_pass" class="input-parts">
            </div>
            <input type="submit" value="送信" id="submit" class="submit-button">
        </form>
    </div>
    <div class="page-link"><a href="index.php">TOPページへ</a></div>

</body>
</html>