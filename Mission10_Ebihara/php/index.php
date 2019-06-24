<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>読書記録アプリ</title>
</head>
<body>
    <div class="contents-wrap">
        <div class="main-title">
            <h1>読書記録アプリ</h1>
        </div>
        <div class="buttons-wrap">
            <p class="attetion">ユーザ登録済みのかたはこちら</p>
            <button id="login-button" class="btn">ログイン</button>
        </div>
        <div class="buttons-wrap">
            <p class="attetion">まだユーザ登録をしていないかたはこちら</p>
            <button id="adduser-button" class="btn">新規ユーザ登録</button>
        </div>
    </div>

</body>
<script>
    document.getElementById('login-button').addEventListener('click', function(e){
        location.href = 'login.php';
    }, false);
    document.getElementById('adduser-button').addEventListener('click', function(e){
        location.href = 'adduser.php';
    }, false);

</script>
</html>