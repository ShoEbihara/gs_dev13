<?php
// この関数はXSS対応用です。
function h($s){
    return htmlspecialchars($s,ENT_QUOTES);
}

//ログイン認証チェック用関数
function loginCheck(){
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
        exit("LOGIN ERROR");
    } else {
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
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
$tableName02 = 'user_table';


// 読書記録データ登録用SQLを発行する
function insertSQL($tableName){
    $sql = "INSERT INTO $tableName(record_id, user_id, title, author, genre, reed_date, judge, impression,
    quotation_01, quotation_02, quotation_03, indate)
    VALUES(NULL,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:a9,:a10,sysdate())";
    return $sql;
}

// ユーザーデータ登録用SQLを発行する
function addUserSQL($tableName02){
    $sql = "INSERT INTO $tableName02(user_id, user_name, login_id, login_pass, admin_flg, life_flg)
    VALUES(NULL,:user_name,:login_id,:login_pass,:admin_flg,:life_flg)";
    return $sql;
}

// ユーザーデータ更新用SQLを発行する
function userUpdateSQL($tableName02){
    $sql = "UPDATE $tableName02 SET 
    user_name=:user_name, login_id=:login_id, login_pass=:login_pass WHERE user_id=:id";
    return $sql;
}


// 読書記録データ更新用SQLを発行する
function updateSQL($tableName){
    $sql = "UPDATE $tableName SET 
    title=:a1, author=:a2, genre=:a3,
    reed_date=:a4, judge=:a5, impression=:a6,
    quotation_01=:a7, quotation_02=:a8, quotation_03=:a9 WHERE record_id=:id";
    return $sql;
}

// ユーザ一覧を表示するtableを作成する
function createUserView($stmt){
    $view ="";
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view .='<a href="userdetail.php?id='.$result["user_id"].'">';
        $view .='<table class="read-hist">';
        $view .='<tr><th class="title">ユーザー名</th><td class="contents">';
        $view .=$result["user_name"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">ログインID</th><td class="contents">';
        $view .=$result["login_id"];
        $view .='</td></tr>';
        $view .='<tr><th class="title">パスワード</th><td class="contents">';
        $view .=$result["login_pass"];
        $view .='</td></tr>';
        $view .='<tr><td class="contents delete_td" colspan="2">';
        $view .='<a href="userdelete.php?id='.$result["user_id"].'">';
        $view .='<button type="button" class="delete_button">ユーザーを削除する</button>';
        $view .='</a>';
        $view .='</td></tr>';
        $view .='</table>';
        $view .='</a>';
      }
    return $view;
    
}


// DBから読書記録のtable要素を作成する関数
function createView($stmt){
    $view ="";
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view .='<a href="detail.php?id='.$result["record_id"].'">';
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
        $view .='<tr><td class="contents delete_td" colspan="2">';
        $view .='<a href="delete.php?id='.$result["record_id"].'">';
        $view .='<button type="button" class="delete_button">読書記録を削除する</button>';
        $view .='</a>';
        $view .='</td></tr>';
        $view .='</table>';
        $view .='</a>';
      }
    return $view;
    
}


?>