<?php
    // 関数を定義したファイルを読み込む
    require_once 'funcs.php';

    // POST送信された内容を受け取る
    $id = $_POST["id"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $date = $_POST["date"];
    $judge = $_POST["judge"];
    $text = $_POST["text"];
    $quotation_01 = $_POST["quotation_01"];
    $quotation_02 = $_POST["quotation_02"];
    $quotation_03 = $_POST["quotation_03"];
    
    // tray~catch命令でDB接続関数getDb()を呼び出し接続を行う
    try {
        $db = getDb();
    } catch (PDOException $e) {
        exit('データベースに接続できませんでした。'.$e->getMessage());
    }

    // // テーブル名を変数に代入する
    // $tableName = 'books_record';

    // 関数を呼び出して、DBにデータ登録するSQLを発行
    $sql = updateSQL($tableName);

    // DBオブジェクトにbindValueで値を渡す
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':a1',$title,PDO::PARAM_STR);
    $stmt->bindValue(':a2',$author,PDO::PARAM_STR);
    $stmt->bindValue(':a3',$genre,PDO::PARAM_STR);
    $stmt->bindValue(':a4',$date,PDO::PARAM_STR);
    $stmt->bindValue(':a5',$judge,PDO::PARAM_STR);
    $stmt->bindValue(':a6',$text,PDO::PARAM_STR);
    $stmt->bindValue(':a7',$quotation_01,PDO::PARAM_STR);
    $stmt->bindValue(':a8',$quotation_02,PDO::PARAM_STR);
    $stmt->bindValue(':a9',$quotation_03,PDO::PARAM_STR);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);

    // SQL実行
    $flag = $stmt->execute();

    //４．データ登録処理後
    if($flag==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>登録データ更新結果画面</title>
</head>
<body>
        <div class="head">
            <h1>以下の内容で読書記録を更新しました</h1>
        </div>
        <div>
            <table class="read-hist">
                <tr><th class="title">書名</th><td class="contents"><?=$title?></td></tr>
                <tr><th class="title">著者名</th><td class="contents"><?=$author?></td></tr>
                <tr><th class="title">ジャンル</th><td class="contents"><?=$genre?></td></tr>
                <tr><th class="title">読了日</th><td class="contents"><?=$date?></td></tr>
                <tr><th class="title">評価</th><td class="contents"><?=$judge?></td></tr>
                <tr><th class="title">感想</th><td class="contents"><?=$text?></td></tr>
                <tr><th class="title">フレーズ①</th><td class="contents"><?=$quotation_01?></td></tr>
                <tr><th class="title">フレーズ②</th><td class="contents"><?=$quotation_02?></td></tr>
                <tr><th class="title">フレーズ③</th><td class="contents"><?=$quotation_02?></td></tr>
            </table>
        </div>
        <div class="page-link">
            <a href="read.php">読書履歴を見る</a>
            <a href="index.php">TOPページに戻る</a>
        </div>
</body>
</html>