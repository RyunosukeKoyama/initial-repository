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

    $sql = "SELECT * FROM `customer` WHERE `id` = " . $_GET['id'] . ";";

    $result = $dbCon->query($sql);

    $data = $result->fetch_assoc();

    $dbCon->close();

    ?>
    <div class="wrapper-1">
        <header class="title">
            <h1><a href="search_list.php">顧客管理システム</a></h1>
        </header>
        <main>
            <h1 class="headline">お客様情報編集</h1>
            <div class="resistration_form">
                <form action="update.php" method="POST" id="resist-form">
                    <input type="hidden" name="customerId" value="<?=$data['id']?>">
                    <div class="resist-form__label">
                        <p>お名前</p>
                        <input type="text" id="nameId" name="name" value="<?= $data['name'] ?>" placeholder="例：小山　龍之介">
                    </div>
                    <div id="name_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>フリガナ</p>
                        <input type="text" id="rubyID" name="ruby" value="<?= $data['ruby'] ?>" placeholder="例：コヤマ　リュウノスケ">
                    </div>
                    <div id="ruby_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>メールアドレス</p>
                        <input type="text" id="mailID" name="mail" value="<?= $data['mail'] ?>" placeholder="例：xxx@xxx.xxx">
                    </div>
                    <div id="mail_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>電話番号</p>
                        <input type="text" id="telID" name="tel" value="<?= $data['tel'] ?>"placeholder="ハイフンなし・9or10桁">
                    </div>
                    <div id="tel_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>性別</p>
                        <input type="radio" name="gender" value="" <?php if($data['gender']==0) {?> checked <?php }?>>男性
                        <input type="radio" name="gender" value="" <?php if($data['gender']==1) {?> checked <?php }?>>女性
                        <input type="radio" name="gender" value="" <?php if($data['gender']==2) {?> checked <?php }?>>その他
                    </div>
                    <div id="gender_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>生年月日</p>
                        <input type="date" id="dateofbirthId" value="<?= $data['dateofbirth']; ?>" name="dateofbirth">
                        
                    </div>
                    <div id="dateofbirth_error_Id" class="error"></div>
                    <div class="resist-form__label">
                        <p>所属会社</p>
                        <select name="company_id" id="companyID">
                            
                            <?php
                            $dbCon = new mysqli("localhost", "root", "", "customer_db");

                            $dbCon->set_charset('utf8');
                        
                            $sql = "SELECT * FROM `company` WHERE `id` = ".$data['company_id'].";";
                        
                            $result = $dbCon->query($sql);
                            $row = $result->fetch_assoc();
                        
                            if (!$result) {
                                exit('顧客情報の取得に失敗しました。' . $dbCon->error);
                            }
                        
                            $dbCon->close();                    

                            ?>
                            
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            
                            
                            
                            
                            
                            <?php
                            // companyテーブルに接続を変更
                            $dbCon = new mysqli("localhost", "root", "", "customer_db");

                            $dbCon->set_charset('utf8');
                        
                            $sql = "SELECT * FROM company ORDER BY `id` DESC;";
                        
                            $result = $dbCon->query($sql);
                        
                            if (!$result) {
                                exit('顧客情報の取得に失敗しました。' . $dbCon->error);
                            }
                        
                            $dbCon->close();
                        
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
            <div class="go_resistration_2 buttons">
            <input type='submit' value='更新'>
            </div>
            </form>
            <div class="buttons">
                <div class="cancel_resistration">
                    <button onclick="location.href='search_list.php'">キャンセル</button>
                </div>
                <!-- <div class="go_resistration_2">
                    <input type='button' value='登録' onclick="subForm()"> -->
                    <!-- <input type='submit' value='登録'>
                </div> -->
            </div>
        </main>
    </div>
    <script src="./js/validation.js"></script>
</body>

</html>