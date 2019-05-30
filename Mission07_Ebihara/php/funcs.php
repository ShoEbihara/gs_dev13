<?php
// この関数はXSS対応用です。
function h($s){
    return htmlspecialchars($s,ENT_QUOTES);
}

// データベースへの接続処理
function getDb(){
    // 接続に必要な情報を変数に代入
    $dsn = 'mysql:dbname=read_books_record; charset=utf8; host=localhost';
    $usr = 'root';
    $passwd = '';
    // データベースへの接続を確率する
    $db = new PDO($dsn, $usr, $passwd);
    // 接続が確率されたPDOクラスのインスタンス$dbを返す
    return $db;
}

// テーブル名を変数に代入する
$tableName = 'books_record';

// データ登録用SQLを発行する
function insertSQL($tableName){
    $sql = "INSERT INTO $tableName(record_id, title, author, genre, reed_date, judge, impression,
    quotation_01, quotation_02, quotation_03, indate)
    VALUES(NULL,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:a9,sysdate())";
    return $sql;
}

// DBのデータからtable要素を作成する関数
function createView($stmt){
    $view ="";
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view .='<table class="read-hist">';
        $view .='<tr><th class="title">登録日</th><td class="contents">';
        $view .=$result["indate"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">登録No.</th><td class="contents">';
        $view .=$result["record_id"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">書名</th><td class="contents">';
        $view .=$result["title"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">著者名</th><td class="contents">';
        $view .=$result["author"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">ジャンル</th><td class="contents">';
        $view .=$result["genre"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">読了日</th><td class="contents">';
        $view .=$result["reed_date"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">評価</th><td class="contents">';
        $view .=$result["judge"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">感想</th><td class="contents">';
        $view .=$result["impression"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">フレーズ①</th><td class="contents">';
        $view .=$result["quotation_01"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">フレーズ②</th><td class="contents">';
        $view .=$result["quotation_02"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">フレーズ③</th><td class="contents">';
        $view .=$result["quotation_03"];
        $view .='</td></tr>';
        $view .='</table>';
      }
    return $view;
    
}


?>