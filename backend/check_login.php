<?php 
        session_start();
        include("../system/connectionDb.php");
        // check login
        if(isset($_SESSION['admin'])) {
            header("Location: index.php");
        }elseif(isset($_POST['admin_login_submit'])) {
            echo $username = trim($_POST['username']);
            echo $password = trim($_POST['password']);
    
            if(empty($username)) {
                $_SESSION['error'] = true;
                // echo 555;
            }elseif(empty($password)) {
                // echo 666;
                $_SESSION['error'] = true;
            }else {
                // echo 777;
                $sql = "SELECT * FROM u_admin WHERE Username = :username";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->execute();
                $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() === 1) {
                    if($password === $fetch['Password']) {
                        $_SESSION['admin'] = $fetch['UserID'];
                        $_SESSION['login_success'] = true;
                        // echo '<scrpit>alert("dangers")</scrpit>';
                        header("Location: index.php");
                    }else  {
                    $_SESSION['login_error'] = true;
                    // echo 2;
                    header("Location: login.php");                    
                    }
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