<?php ?>
<script>
    // แจ้งเตือน เข้าสู๋ระบบสำเร็จ
    <?php if(isset($_SESSION['login_success'])){?>
        Swal.fire({
            title: 'สำเร็จ',
            text: 'เข้าสู่ระบบสำเร็จ',
            icon: 'success',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['login_success']);
    ?>

    // แจ้งเตือนเข้าสู่ระบบไม่สำเร็จ
    <?php if(isset($_SESSION['login_error'])){?>
        Swal.fire({
            title: 'ไม่สำเร็จ',
            text: 'เลขประจำตัว หรือ รหัส ผิด',
            icon: 'error',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['login_error']);
    ?>

    // แจ้งเตือนคนไม่หลังดีเข้าระบบ
    <?php if(isset($_SESSION['redirect_login'])){?>
        Swal.fire({
            title: 'ไม่สำเร็จ',
            text: 'เลขประจำตัว หรือ รหัส ผิด',
            icon: 'error',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['redirect_login']);
    ?>

    // น้ำหนักผิด
    <?php if(isset($_SESSION['error_weight'])){?>
        Swal.fire({
            title: 'ไม่สำเร็จ',
            text: 'น้ำหนักไม่ถูกต้อง กรุณาแก้ไข',
            icon: 'error',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['error_weight']);
    ?>

    // ส่วนสูงผิด
    <?php if(isset($_SESSION['error_height'])){?>
        Swal.fire({
            title: 'ไม่สำเร็จ',
            text: 'ส่วนสูงไม่ถูกต้อง กรุณาแก้ไข',
            icon: 'error',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['error_height']);
    ?>

    // รอบเอวสูงผิด
    <?php if(isset($_SESSION['error_rob'])){?>
        Swal.fire({
            title: 'ไม่สำเร็จ',
            text: 'รอบเอวไม่ถูกต้อง กรุณาแก้ไข',
            icon: 'error',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['error_rob']);
    ?>

    // บันทึกข้อมูลสำเร็จ
    <?php if(isset($_SESSION['insert_success'])){?>
        Swal.fire({
            title: 'สำเร็จ',
            text: 'บันทึกข้อมูลสำเร็จ',
            icon: 'success',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['insert_success']);
    ?>
    // ชื่อผู้ใช้ADminซ้ำ
    <?php if(isset($_SESSION['db_alert_name'])){?>
        Swal.fire({
            title: 'ไม่สำเร็จ',
            text: 'ชื่อผู้ใช้นี้มีในระบบแล้ว',
            icon: 'error',
            confirmButtonText: 'ปิดหน้าต่าง'
            });
    <?php }
        unset($_SESSION['db_alert_name']);
    ?>
</script>