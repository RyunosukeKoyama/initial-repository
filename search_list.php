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
    
    $sql =
        "SELECT *,
    customer.id AS id,
    customer.name AS name,
    company.id AS company_id,
    company.name AS company_name

    FROM customer
                
    INNER JOIN company
                
    ON customer.company_id = company.id;";


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
            <div class="form_wrap">
                <div class="content-box-1">
                    <div class="go_resistration">
                        <button onclick="location.href='./resistration.php'">登録</button>
                    </div>
                </div>
                <div class="content-box-2">
                    <form>
                        <div class="search-form__label">
                            <p>顧客名</p>
                            <input type="text" name="name">
                        </div>
                        <div class="search-form__label">
                            <p>顧客名（カナ）</p>
                            <input type="text" name="ruby">
                        </div>
                        <div class="search-form__label">
                            <p>性別</p>
                            <input type="radio" name="gender" value="0">男性
                            <input type="radio" name="gender" value="1">女性
                            <input type="radio" name="gender" value="2">その他
                        </div>
                        <div class="search-form__label">
                            <p>生年月日</p>
                            <input type="date" name="dateofbirth-p2">
                            <span>～</span>
                            <input type="date" name="dateofbirth-p2">
                        </div>
                        <div class="search-form__label">
                            <p>所属会社</p>
                            <select>
                                <option value="">会社を選択</option>
                                <option value="株式会社A">株式会社A</option>
                                <option value="株式会社B">株式会社B</option>
                                <option value="株式会社C">株式会社C</option>
                            </select>
                        </div>
                        <div class="search-form__submit">
                            <input type='button' value='検索'>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-box-area">
                <table class="table">
                    <tr>
                        <th>顧客ID</th>
                        <th>顧客名（カナ）</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>所属会社</th>
                        <th>新規日時/最終更新日時</th>
                        <th>編集ボタン</th>
                        <th>削除ボタン</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <!-- 削除のフォーム  -->
                        <form name="deleteForm" method="post" action="delete.php">
                            <input type="hidden" name="customerId" value="<?= $row['id'] ?>">
                            <tr>
                                <!-- 顧客情報の改行  -->
                                <td>
                                    <p><?= $row['id'] ?></p>
                                </td>
                                <td>
                                    <p><?= $row['name'] ?></p>
                                    <p><?= $row['ruby'] ?></p>
                                </td>
                                <td>
                                    <p><?= $row['mail'] ?></p>
                                </td>
                                <td>
                                    <p><?= $row['tel'] ?></p>
                                </td>
                                <td>
                                    <p><?= $row['company_name'] ?></p>
                                </td>
                                <td>
                                    <p><?= $row['created_at'] ?></p>
                                    <p><?= $row['modified_at'] ?></p>
                                </td>
                                <td><button type="button" onclick="location.href='edit.php?id=<?= $row['id']; ?>'"
                                        name="action">編集</button></td>
                                <td><button type="submit" name="action">削除</button></td>

                            </tr>
                        </form>
                        <?php
                    }
                    ?>
                </div>
        </main>
    </div>
    <script src="./js/validation.js"></script>
</body>

</html>