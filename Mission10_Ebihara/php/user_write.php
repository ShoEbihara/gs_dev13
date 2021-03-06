<?php
    // 関数を定義したファイルを読み込む
    require_once 'funcs.php';

    // POST送信された内容を受け取る
    $name = $_POST["name"];
    $login_id = $_POST["login_id"];
    $login_pass = $_POST["login_pass"];

    // 管理者フラグ、アクティブユーザーフラグ
    $admin_flg = 0;
    $life_flg = 1;
    
    // tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
    try {
        $db = getDb();
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。'.$e->getMessage());
    }

    // 関数を呼び出して、DBにデータ登録するSQLを発行
    $sql = addUserSQL($tableName02);

    // DBオブジェクトにbindValueで値を渡す
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':login_id',$login_id,PDO::PARAM_STR);
    $stmt->bindValue(':login_pass',$login_pass,PDO::PARAM_STR);
    $stmt->bindValue(':admin_flg',$admin_flg,PDO::PARAM_INT);
    $stmt->bindValue(':life_flg',$life_flg,PDO::PARAM_INT);

    // SQL実行
    $flag = $stmt->execute();

    //４．データ登録処理後
    if($flag==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        $view = 'ユーザー登録が完了しました';
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Write.php</title>
</head>
<body>
        <div class="head">
            <h1><?=$view?></h1>
        </div>
        
        <div class="page-link">
            <a href="index.php">TOPページに戻る</a>
        </div>
</body>
</html>