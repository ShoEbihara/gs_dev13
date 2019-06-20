<?php
// 関数を定義したファイルを読み込む
require_once 'funcs.php';

// tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
try {
    $db = getDb();
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ表示SQL作成
$stmt = $db->prepare("SELECT * FROM $tableName02");
$status = $stmt->execute();

//データ表示
$viewTables="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $viewTables = createUserView($stmt);
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>ユーザー情報一覧</title>
</head>
<body>
    <p class="read-record">ユーザー情報一覧</p>
    <div class="tables">
        <?=$viewTables?>
    </div>
    <div class="page-link"><a href="index.php">TOPページに戻る</a></div>
</body>
</html>