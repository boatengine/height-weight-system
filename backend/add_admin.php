<?php
    session_start();
    include("../system/connectionDb.php");
    
    if(isset($_SESSION['admin'])) {
        header("Location: index.php");

    }elseif(isset($_POST['add_admin_btn'])) {
       $name = $_POST['name'];
       $username = $_POST['username'];
       $password = $_POST['password'];

        if(empty($name)) {
            $_SESSION['error'] = true;
            // echo 555;
        }elseif(empty($username)) {
            // echo 666;
            $_SESSION['error'] = true;
        }elseif(empty($password)) {
            // echo 888;
            $_SESSION['error'] = true;
        }else{
            // Create valible add value admin to status;
            $status = "ADMIN";

            $sql = "SELECT * FROM u_admin WHERE Username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() === 0) {
                $sql1 = "INSERT INTO u_admin(Username,Password,Name,status) VALUES(:username, :password, :name, :status)";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt1->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt1->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt1->bindParam(':status', $status, PDO::PARAM_STR);
                $stmt1->execute();
                if($result) {
                    // echo 'success';
                    $_SESSION['insert_success'] = true;
                    header("location: index.php");
                }else{
                    // echo 'error';
                    $_SESSION['db_alert_name'] = true;
                    header("location: index.php");
                }
                $conn = null;
            }else {
                // echo 3;
                $_SESSION['login_error'] = true;
                header("Location: login.php");     
            }
        }
    }else {
        $_SESSION['insert_error'] = true;
        header("location: index.php");
    }


?>