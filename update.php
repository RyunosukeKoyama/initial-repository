<?php
    // DBに接続
    $dbCon = new mysqli("localhost", "root", "", "customer_db");

    $dbCon->set_charset('utf8');

    $sql = "UPDATE  `customer`
    SET 
    `name` = '".$_POST['name']."',
    `ruby` = '" .$_POST['ruby']."',
    `mail` = '" .$_POST['mail']."', 
    `tel` ='" .$_POST['tel']."', 
    `gender` ='" .$_POST['gender']."',
    `dateofbirth` ='" .$_POST['dateofbirth']."', 
    `company_id` ='" .$_POST['company_id']."', 
    `created_at` ='".date('Y-m-d H:i:s')."', 
    `modified_at` ='".date('Y-m-d H:i:s')."'

    WHERE `id` = ".$_POST['customerId'].";";
    
    $result = $dbCon->query($sql);

    $dbCon->close();

    header('Location: ./index.php');
?>