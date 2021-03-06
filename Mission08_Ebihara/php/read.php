<?php
// 関数を定義したファイルを読み込む
require_once 'funcs.php';

// 検索条件に一致するデータを取り出す処理
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    // tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
    try {
        $db = getDb();
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。'.$e->getMessage());
    }

    //データ表示SQL作成
    $stmt = $db->prepare("SELECT * FROM $tableName where title = '${title}'");
    $status = $stmt->execute();

    $viewSearch = "";
    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);
    }else{
      $searchResalt = createView($stmt);
      if(empty($searchResalt)){
        $viewSearch = '<p class="search-msg">検索結果がありません</p>';
      }else{
        $viewSearch = $searchResalt;
      }
      
    }
    
}

// tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
try {
    $db = getDb();
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ表示SQL作成
$stmt = $db->prepare("SELECT * FROM $tableName");
$status = $stmt->execute();
//データ表示SQL作成
$countSQL = $db->prepare("SELECT COUNT(record_id) FROM $tableName");
$count_status = $countSQL->execute();



//データ表示
$count_view="";
$viewTables="";
if($status==false || $count_status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $viewTables = createView($stmt);
  $count_result = $countSQL->fetch(PDO::FETCH_ASSOC);

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
        <h1><?=date("Y年m月d日")?>現在の読書履歴</h1>
        <p class="read-record">通算読破数：<?=$count_result['COUNT(record_id)']?>冊</p>
    </div>
    <div class="search-area">
        <form action="#" method="post">
            <div>
                <p class="title">書籍名から読書履歴を検索する</p>
                <input type="text" name="title" class="search-title">
            </div>
            <input type="submit" value="検索" class="submit-button search-button">
        </form>
    </div>
    <p class="read-record">検索結果</p>
    <div class="tables">
        <?php
            if(isset($viewSearch)){
                echo($viewSearch);
            }else{
                echo('<p class="search-msg">検索結果がありません</p>');
            }
        ?>
    </div>
    <p class="read-record">読書履歴一覧</p>
    <div class="tables">
        <?=$viewTables?>
    </div>
    <div class="page-link"><a href="index.php">TOPページに戻る</a></div>
</body>
</html>