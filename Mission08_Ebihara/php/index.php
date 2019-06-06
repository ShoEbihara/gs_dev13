<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>index.php</title>
</head>
<body>
    <div class="contents-wrap">
        <div class="main-title">
            <h1>読書記録アプリ</h1>
        </div>
        <form id="input-form" class="input-form" action="write.php" method="post">
            <div class="form-parts">
                <label for="title" class="labels">書名</label>
                    <input type="text" name="title" id="title" class="input-parts">
            </div>
            <div class="form-parts">
                <label for="author" class="labels">著者名</label>
                    <input type="text" name="author" id="author" class="input-parts">
            </div>
            <div class="form-parts">
                <label for="genre" class="labels">ジャンル</label>
                    <select id="genre" name="genre" class="input-parts">
                        <optgroup label="文学・評論">
                            <option value="純文学">純文学</option>
                            <option value="評論・文学研究">評論・文学研究</option>
                            <option value="エッセー・随筆">エッセー・随筆</option>
                            <option value="ミステリー・サスペンス">ミステリー・サスペンス</option>
                            <option value="SF・ホラー・ファンタジー">SF・ホラー・ファンタジー</option>
                            <option value="経済・社会小説">経済・社会小説</option>
                            <option value="歴史・時代小説">歴史・時代小説</option>
                            <option value="エンタメ・ラノベ">エンタメ・ラノベ</option>
                            <option value="詩歌">詩歌</option>
                            <option value="戯曲・シナリオ">戯曲・シナリオ</option>
                            <option value="古典">古典</option>
                        </optgroup>
                        <optgroup label="ノンフィクション">
                            <option value="思想・社会・政治">思想・社会・政治</option>
                            <option value="歴史・地理・旅行記">歴史・地理・旅行記</option>
                            <option value="科学・数学">科学・数学</option>
                            <option value="事件・犯罪">事件・犯罪</option>
                            <option value="自伝・伝記">自伝・伝記</option>
                        </optgroup>
                        <optgroup label="ビジネス・経済">
                            <option value="経済学・経済事情">経済学・経済事情</option>
                            <option value="産業・業界研究">産業・業界研究</option>
                            <option value="金融・ファイナンス・投資">金融・ファイナンス・投資</option>
                            <option value="経営学・MBA">経営学・MBA</option>
                            <option value="キャリアアップ">キャリアアップ</option>
                            <option value="ビジネス読み物">ビジネス読み物</option>
                        </optgroup>
                        <optgroup label="アート・エンタメ">
                            <option value="作品集">作品集</option>
                            <option value="演劇・舞台">演劇・舞台</option>
                            <option value="音楽">音楽</option>
                            <option value="タレント本">タレント本</option>
                            <option value="落語・歌舞伎・古典芸能">落語・歌舞伎・古典芸能</option>
                            <option value="映画">映画</option>
                            <option value="コミックス">コミックス</option>
                        </optgroup>
                        <optgroup label="趣味・実用">
                            <option value="健康・医学">健康・医学</option>
                            <option value="料理・グルメ">料理・グルメ</option>
                            <option value="住まい・インテリア">住まい・インテリア</option>
                            <option value="ファッション">ファッション</option>
                            <option value="ペット">ペット</option>
                            <option value="園芸">園芸</option>
                        </optgroup>
                    </select>
            </div>
            <div class="form-parts">
                <label for="date" class="labels">読了日</label>
                    <input type="date" name="date" id="date" class="input-parts">
            </div>
            <div class="form-parts">
                <label for="judge" class="labels">評価</label>
                    <select name="judge" id="judge" class="input-parts">
                        <option value="評価なし" selected>作品を評価してください</option>
                        <option value="とてもつまらない">とてもつまらない</option>
                        <option value="つまらない">つまらない</option>
                        <option value="普通">普通</option>
                        <option value="面白い">面白い</option>
                        <option value="とても面白い">とても面白い</option>
                    </select>
            </div>
            <div class="form-parts">
                <label for="text" class="labels textarea-label">感想</label>
                    <textarea name="text" id="text" class="input-parts"></textarea>
            </div>
            <div class="form-parts">
                <label for="quotation_01" class="labels">お気に入りのフレーズ①</label>
                    <input type="quotation_01" name="quotation_01" id="quotation_01" class="input-parts">            
            </div>
            <div class="form-parts">
                <label for="quotation_02" class="labels">お気に入りのフレーズ②</label>
                    <input type="quotation_02" name="quotation_02" id="quotation_02" class="input-parts">            
            </div>
            <div class="form-parts">
                <label for="quotation_03" class="labels">お気に入りのフレーズ③</label>
                    <input type="quotation_03" name="quotation_03" id="quotation_03" class="input-parts">            
            </div>
            <input type="submit" value="送信" id="submit" class="submit-button">
        </form>
    </div>
    <div class="page-link">
        <a href="read.php">読書履歴を見る</a>
        <a href="adduser.php">ユーザー登録画面へ</a>
        <a href="users.php">ユーザー情報一覧画面へ</a>
    </div>

</body>
</html>