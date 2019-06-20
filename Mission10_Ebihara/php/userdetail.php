<?php
    // 関数を定義したファイルを読み込む
    require_once 'funcs.php';

    // GET送信された内容を受け取る
    $id = $_GET["id"];
    
    
    // tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
    try {
        $db = getDb();
        $stmt = $db->prepare("SELECT * FROM $tableName02 WHERE user_id=:id");
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $status = $stmt->execute();
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。'.$e->getMessage());
    }

    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }
    $row = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>ユーザ情報更新</title>
</head>
<body>
    <div class="contents-wrap">
        <div class="main-title">
            <h1>読書記録アプリ</h1>
            <h2>ユーザー情報更新画面</h2>
        </div>
        <form id="input-form" class="input-form" action="user_update.php" method="post">
            <div class="form-parts">
                <label for="name" class="labels">ユーザー名</label>
                    <input type="text" name="name" id="name" class="input-parts" value="<?=$row["user_name"]?>">
            </div>
            <div class="form-parts">
                <label for="login_id" class="labels">ログイン用ユーザーID</label>
                    <input type="text" name="login_id" id="login_id" class="input-parts" value="<?=$row["login_id"]?>">
            </div>
            <div class="form-parts">
                <label for="login_pass" class="labels">ログイン用パスワード</label>
                    <input type="password" name="login_pass" id="user_pass" class="input-parts" value="<?=$row["login_pass"]?>">
            </div>
            <input type="submit" value="送信" id="submit" class="submit-button">
            <input type="hidden" name="id" value="<?=$row["user_id"]?>">
        </form>
    </div>
    <div class="page-link"><a href="read.php">読書履歴を見る</a></div>

</body>
</html>
