<?php 

    session_start();
    date_default_timezone_set('Asia/Bangkok');
    include('../system/connectionDb.php');
    if(!isset($_SESSION['admin'])) {
        header("location: login.php");
    }
    if(isset($_POST['edit_submit'])) {
        $_ID = $_POST['noid1'];
        $_nn2 = trim($_POST['nn2']);
        $_hh2 = trim($_POST['hh2']);
        $_rob2 = trim($_POST['rob2']);
        
        $v1 = date('d');
        $v2 = date('m');
        $v3 = date('Y')+543;
        $v4 = date('H');
        $v5 = date('i:s');
        $ti = date('H:i:s');
        $d = $v1.'/'.$v2.'/'.$v3;
        $d24 = $v3.'-'.$v2.'-'.$v1.'-'.$ti;

    
        if($_nn2<20) {
            $_SESSION['error_weight'] = true;
            header("location: from_d1.php");
        }elseif($_nn2>150){
            $_SESSION['error_weight'] = true;
            header("location: from_d1.php");
        }elseif($_hh2<100) {
            $_SESSION['error_height'] = true;
            header("location: from_d1.php");
        }elseif($_hh2>200) {
            $_SESSION['error_height'] = true;
            header("location: from_d1.php");
        }elseif($_rob2<10) {
            $_SESSION['error_rob'] = true;
            header("location: from_d1.php");
        }else{
            $insertDB = "UPDATE data_nn SET w=:_nn2,h=:_hh2,rob=:_rob2,date1=:d24,st1='1' WHERE noid = :_ID";
            // $insertDB = "UPDATE data_nn SET w='$_nn2',h='$_hh2',rob='$_rob2',date1='$d24',st1='1' WHERE noid = '$_ID'";
            $query = $conn->prepare($insertDB);
            $query->bindParam(':_nn2', $_nn2, PDO::PARAM_INT);
            $query->bindParam(':_hh2', $_hh2, PDO::PARAM_INT);
            $query->bindParam(':_rob2', $_rob2, PDO::PARAM_INT);
            $query->bindParam(':d24', $d24, PDO::PARAM_STR);
            $query->bindParam(':_ID', $_ID, PDO::PARAM_INT);
            $result = $query->execute();
            if($result) {
                // echo 'success';
                $_SESSION['insert_success'] = true;
                // unset($_SESSION['noid']);
                header("location: index.php");
            }else{
                // echo 'error';
                $_SESSION['insert_error'] = true;
                header("location: index.php");
            }
            $conn = null;
        }
    }


?>