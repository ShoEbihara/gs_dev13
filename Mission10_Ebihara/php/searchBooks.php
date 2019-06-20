<?php
//必ずsession_startは最初に記述
session_start();

// 関数を定義したファイルを読み込む
require_once 'funcs.php';
// Ajaxを利用したデータ検索
$title = $_POST['title'];
// tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
try {
    $db = getDb();
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ表示SQL作成
$stmt = $db->prepare("SELECT * FROM $tableName WHERE title LIKE :title");
$stmt->bindValue(":title",'%'.$title.'%');
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

    //Ajaxに返すデータをechoで渡す
    echo $viewSearch;
    }
?>
