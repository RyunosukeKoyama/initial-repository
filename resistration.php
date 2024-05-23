<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="./css/reset.css" rel="stylesheet" type="text/css">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    // DBに接続
    $dbCon = new mysqli("localhost", "root", "", "customer_db");

    $dbCon->set_charset('utf8');

    $sql = "SELECT * FROM company ORDER BY `id` DESC;";

    $result = $dbCon->query($sql);

    if (!$result) {
        exit('顧客情報の取得に失敗しました。' . $dbCon->error);
    }

    $dbCon->close();

    $index = 0;
    ?>

    <div class="wrapper-1">
        <header class="title">
            <h1><a href="search_list.php">顧客管理システム</a></h1>
        </header>
        <main>
            <h1 class="headline">データ登録</h1>
            <div class="resistration_form">
                <form action="insert_submit.php" method="POST" id="resist-form">
                    <div class="resist-form__label">
                        <p>お名前</p>
                        <input type="text" id="nameID" name="name" placeholder="例：小山　龍之介">
                    </div>
                    <div id="name_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>フリガナ</p>
                        <input type="text" id="rubyID" name="ruby" placeholder="例：コヤマ　リュウノスケ">
                    </div>
                    <div id="ruby_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>メールアドレス</p>
                        <input type="text" id="mailID" name="mail" placeholder="例：xxx@xxx.xxx">
                    </div>
                    <div id="mail_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>電話番号</p>
                        <input type="text" id="telID" name="tel" placeholder="ハイフンなし・9or10桁">
                    </div>
                    <div id="tel_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>性別</p>
                        <input type="radio" name="gender" value="male">男性
                        <input type="radio" name="gender" value="female">女性
                        <input type="radio" name="gender" value="other">その他
                    </div>
                    <div id="gender_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>生年月日</p>
                        <input type="date" id="dateofbirthId" name="dateofbirth">
                    </div>
                    <div id="dateofbirth_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>所属会社</p>
                        <select name="company_id" id="companyID">
                        <option value="">会社を選択してください</option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div id="company_error_Id" class="error"></div>
            </div>
            </form>
            <div class="buttons">
                <div class="cancel_resistration">
                    <button onclick="location.href='search_list.php'">キャンセル</button>
                </div>
                <div class="go_resistration_2">
                    <input type='button' value='登録' onclick="subForm()">
                </div>
            </div>
            <button type="button">追加・編集</button>
        </main>
    </div>
    <script src="./js/validation.js"></script>
</body>
</html>