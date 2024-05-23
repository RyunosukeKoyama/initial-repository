<?php
    // DBに接続
    $dbCon = new mysqli("localhost", "root", "", "customer_db");

    $dbCon->set_charset('utf8');

    // var_dump($_POST);

    $sql = "INSERT INTO `customer`(`id`, `name`, `ruby`, `mail`, `tel`, `gender`, `dateofbirth`, `company_id`, `created_at`, `modified_at`) 
            VALUES (null,'" .$_POST['name']."','" .$_POST['ruby']."','" .$_POST['mail']."','" .$_POST['tel']."','" .$_POST['gender']."','" .$_POST['dateofbirth']."','" .$_POST['company_id']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')";

    $result = $dbCon->query($sql);

    $dbCon->close();

    header('Location: index.php');
?>