<?php 
    session_start();
    require 'system/connectionDb.php';
    
    if(isset($_POST['login_submit'])) {
        $id = trim($_POST['id']);
        $pin = trim($_POST['password']);

        if(empty($id)) {
            $_SESSION['error'] = true;
        }elseif(empty($pin)) {
            $_SESSION['error'] = true;
        }else {
            $sql = "SELECT noid,pin FROM data_nn WHERE noid = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {
                if($pin === $fetch['pin']) {
                    $_SESSION['noid'] = $fetch['noid'];
                    $_SESSION['login_success'] = true;
                    header("Location: form_d1.php");
                }else  {
                $_SESSION['login_error'] = true;
                header("Location: index.php");                    
                }
            }else {
                $_SESSION['login_error'] = true;
                header("Location: index.php");     
            }
        }
    }else {
        header("location: index.php");
    }

?>