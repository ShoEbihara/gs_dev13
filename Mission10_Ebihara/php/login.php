<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>ログイン</title>
</head>
<body>
    <div class="contents-wrap">
        <div class="main-title">
            <h1>読書記録アプリ</h1>
            <h2>ログイン画面</h2>
        </div>
        <form id="input-form" class="input-form" action="login_act.php" method="post">
            <div class="form-parts">
                <label for="login_id" class="labels">ログイン用ユーザーID</label>
                    <input type="text" name="login_id" id="login_id" class="input-parts">
            </div>
            <div class="form-parts">
                <label for="login_pass" class="labels">ログイン用パスワード</label>
                    <input type="password" name="login_pass" id="user_pass" class="input-parts">
            </div>
            <input type="submit" value="ログイン" id="submit" class="submit-button">
        </form>
        <button id="btn" class="submit-button">TOPページへ</button>
    </div>
</body>
<script>
    document.getElementById('btn').addEventListener('click', function(e){
        location.href = 'index.php';
    }, false);
</script>
</html>