<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    
    <?php
        session_start();
        include 'header.php';
        include("../system/connectionDb.php");

        // check session
        if(isset($_SESSION['admin'])) {
        
            header("location: index.php");
            
        }

    ?>

</head>
<body style="background-color:#F6F8FF;">
    

    <?php 
        include '../system/alert.php';
        include 'navbar.php';
    ?>
         
         
         
      <div class="jumbotron-fluid text-center " style="background:url(../img/header1.jpg) no-repeat center center fixed;-webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover; background-size: cover; color: white;margin-bottom:0px;padding: 5%">
        <div class="container">
            <div class="text-center col">
                <img src="../img/kn-logo-white.png" class="img-fluid img-logo" data-aos="zoom-in" width="10%" data-aos="zoom-in">
        </div>
            
        </div>
        <h2 class="text-center jump-h2" data-aos="fade-up"><span class="text-primary"><b>ระบบเก็บข้อมูล</b></span></h2>
        <h2 class="text-center jump-h2-a" data-aos="fade-up"><b class="">น้ำหนัก ส่วนสูง รอบเอว</b></h2>
        <p class="jump-p" data-aos="fade-up">งานพยาบาล กลุ่มบริหารงานทั่วไป ภาคเรียนที่ 1 ปีการศึกษา 2566</p>
    </div>

      
      <!-- services section Starts -->
      <section id="login" class="about section-padding">
          <div class="container shadow-lg p-5 ff1 rounded-4 bg-white">
                <h2 class="text-center fw-bold"><span class="text-primary "><b>ระบบสำหรับเจ้าหน้าที่</b></span><br></h2>
                <p></p>
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-12">
                      <div class="about-img text-center">
                          <img src="../img/h99a.png" alt="" class="img-fluid " width="200px">
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12 ps-lg-5 mt-md-5 mx-auto">
                      <div class="about-text">

                            <div class="col-md-11">
                                <form action="check_login.php" method="POST">
                                    <div class="mb-3">
                                      <label for="" class="form-label"><b><i class='bx bxs-user'></i>&nbsp;Username</b></label>
                                      <input type="text" class="form-control rounded-pill" name="username" aria-describedby="emailHelp" placeholder="กรุณากรอก..">
                                    </div>
                                    <div class="mb-3">
                                      <label for="" class="form-label"><b><i class='bx bxs-key' ></i>&nbsp;Password</b></label>
                                      <input type="password" class="form-control rounded-pill" name="password" placeholder="กรุณากรอก..">
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control mb-8 rounded-pill" name="admin_login_submit"><i class='bx bx-log-in' ></i>&nbsp;เข้าสู่ระบบ</button>
                                    <a href="../" class="btn btn-secondary form-control mb-8 rounded-pill mt-3" ><i class="bi bi-x-circle-fill"></i>&nbsp;กลับหน้าหลัก</a>
                                </form>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- footer starts -->
            <?php 
                include '../footer.php';
            ?>
      <!-- footer ends -->








    
    
    <!-- All Js -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>




<!--for getting the form download the code from download button-->