<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//関数ファイル読み込み
require_once 'funcs.php';

$lid = $_POST["login_id"];
$lpw = $_POST["login_pass"];

//1.  DB接続します
$pdo = getDb();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE login_id=:lid AND login_pass=:lpw ");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sqlError($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
if( $val["user_id"] != "" ){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["name"]      = $val['user_name'];
  header("Location: record.php");
}else{
  //Login失敗時(Logout経由)
  header("Location: logout.php");
}
exit();
?>