<?php
//必ずsession_startは最初に記述
session_start();
// セッション変数に保存されたuser_idを取得する
$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];

// 関数を定義したファイルを読み込む
require_once 'funcs.php';
//ログイン認証チェック
loginCheck();

// tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
try {
    $db = getDb();
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ表示SQL作成
$stmt = $db->prepare("SELECT * FROM $tableName WHERE user_id =:id");
$stmt->bindValue(':id',$user_id,PDO::PARAM_STR);
$status = $stmt->execute();

//データ表示
$viewTables="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $viewTables = createView($stmt);
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>読書履歴</title>
</head>
<body>
    <div class="head">
        <h1>ようこそ<?=$user_name?>さん</h1>
        <h1><?=date("Y年m月d日")?>現在の読書履歴</h1>
    </div>
    <div class="search-area">
        <div>
            <p class="title">書籍名から読書履歴を検索する</p>
            <input id="search-title" type="text" name="title" class="search-title">
        </div>
        <input id="btn" type="submit" value="検索" class="submit-button search-button">
    </div>
    <p class="read-record">検索結果</p>
    <div id="view" class="tables">
        
    </div>
    <p class="read-record">読書履歴一覧</p>
    <div class="tables">
        <?=$viewTables?>
    </div>
    <div class="page-link"><a href="record.php">記録入力に戻る</a></div>
</body>

<!-- Ajaxで書籍名検索を行う -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        document.querySelector("#btn").onclick = function() {
            $.ajax({
                type: "post",
                url: "searchBooks.php",
                data: {
                    title: $("#search-title").val() 
                },
                dataType: "html",
                success: function(data) {
                    $("#view").html(data);
                }
            });
        }
</script>
</html>