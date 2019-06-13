<?php
//必ずsession_startは最初に記述
session_start();

// 関数を定義したファイルを読み込む
require_once 'funcs.php';

//ログイン認証チェック
loginCheck();

// GET送信された内容を受け取る
$id = $_GET["id"];


// tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
try {
    $db = getDb();
    $stmt = $db->prepare("DELETE FROM $tableName02 WHERE user_id=:id");
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $status = $stmt->execute();
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}
$view ='';
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    $view .= 'ユーザー情報を削除しました';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>ユーザー情報削除</title>
</head>
<body>
        <div class="head">
            <h1><?=$view?></h1>
        </div>
        <div class="page-link">
            <a href="read.php">読書履歴を見る</a>
            <a href="record.php">記録入力に戻る</a>
            <a href="users.php">ユーザー情報一覧画面へ</a>
        </div>
</body>
</html>