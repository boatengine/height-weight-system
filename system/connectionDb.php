<?php 

    $host = "localhost"; # โดเมนเซิฟเวอร์
    $username = "root"; # ยูเซอเนม
    $password = ""; # รหัสผ่าน
    $dbname = "nn_661"; #ชื่อฐานข้อมูล

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname;",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'successfully';
    }catch(PDOException $e) {
        echo 'faild coonect db'.$e->getMessage();
    }

?>