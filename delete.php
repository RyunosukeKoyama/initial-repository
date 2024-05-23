<?php
    // DBに接続
    $dbCon = new mysqli("localhost", "root", "", "customer_db");

    $dbCon->set_charset('utf8');

    $sql = "DELETE FROM customer WHERE id = ".$_POST['customerId'].";";

    $result = $dbCon->query($sql);

    $dbCon->close();

    header('Location: index.php');
?>