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
        include("system/connectionDb.php");
    ?>

</head>
<body style="background-color:#F6F8FF;">
    

    <?php 
        include 'system/alert.php';
        include 'navbar.php';
    ?>
         
         
         
      <div class="jumbotron-fluid text-center " style="background:url(img/header1.jpg) no-repeat center center fixed;-webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover; background-size: cover; color: white;margin-bottom:0px;padding: 5%">
        <div class="container">
            <div class="text-center col">
                <img src="img/kn-logo-white.png" class="img-fluid img-logo" data-aos="zoom-in" width="10%" data-aos="zoom-in">
        </div>
            
        </div>
        <h2 class="text-center jump-h2" data-aos="fade-up"><span class="text-primary"><b>ระบบเก็บข้อมูล</b></span></h2>
        <h2 class="text-center jump-h2-a" data-aos="fade-up"><b class="">น้ำหนัก ส่วนสูง รอบเอว</b></h2>
        <p class="jump-p" data-aos="fade-up">งานพยาบาล กลุ่มบริหารงานทั่วไป ภาคเรียนที่ 1 ปีการศึกษา 2566</p>
    </div>

      <!-- about section starts -->
      <section id="login" class="about section-padding">
          <div class="container shadow-lg p-5 ff1 rounded-4 bg-white">
                <h2 class="text-center fw-bold"><span class="text-primary"><b>ระบบเก็บข้อมูล</b></span><br>น้ำหนัก ส่วนสูง รอบเอว</h2>
                <p></p>
              <div class="row">
                  <div class="col-lg-4 col-md-12 col-12">
                      <div class="about-img">
                          <img src="img/h1a.png" alt="" class="img-fluid">
                      </div>
                  </div>
                  <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="about-text">
                            <!-- <h2>We Provide the Best Quality <br/> Services Ever</h2> -->
                            <p ><span class="badge bg-danger rounded-pill"><b>&nbsp;ประกาศ</b></span>&nbsp;ใส่เลขประจำตัวนักเรียน & เลขประชาชน ให้ถูกต้อง</p>
                            <!-- <a href="#" class="btn btn-primary">Learn More</a> -->
                            <div class="col-md-11">
                                <form action="check_login.php" method="POST">
                                    <div class="mb-3">
                                      <label for="" class="form-label"><b><i class='bx bxs-user'></i>&nbsp;เลขประจำตัวนักเรียน</b></label>
                                      <input type="number" class="form-control rounded-pill" name="id" aria-describedby="emailHelp" placeholder="กรุณากรอก..">
                                    </div>
                                    <div class="mb-3">
                                      <label for="" class="form-label"><b><i class='bx bxs-key' ></i>&nbsp;เลขบัตรประชาชน</b></label>
                                      <input type="password" class="form-control rounded-pill" name="password" placeholder="กรุณากรอก..">
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control mb-8 rounded-pill" name="login_submit"><i class='bx bx-log-in' ></i>&nbsp;เข้าสู่ระบบ</button>
                                </form>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
      <!-- about section Ends -->
      <!-- services section Starts -->
      <section class="services section-padding" id="report" data-aos="fade-up">
          <div class="container shadow-lg p-5 ff1 rounded-4 bg-white">
              <div class="row">
                  <div class="col-md-12">
                      <div class="section-header text-center pb-5">
                        <h2 class="text-center fw-bold"><span class="text-primary "><b>รายงานผลนักเรียน</b></span><br></h2>
                          <!-- <p><br>และบันทึกข้อมูล</p> -->
                      </div>
                  </div>
              </div>
              <div class="row">
                <?php 

                  $sql5 = "SELECT noid FROM data_nn WHERE st1 = ''";
                  $query1 = $conn->prepare($sql5);
                  $query1->execute();
                  $row1 = $query1->rowCount();

                ?>
                <div class="col-12 col-md-12 col-lg-4 ">
                    <div class="card text-white text-center bg-danger pb-2 rounded-4 " data-aos="fade-up">
                        <div class="card-body ">
                            <i class='bx bxs-user-x' ></i>
                            <h3 class="card-title">นักเรียนที่ยังไม่บันทึกข้อมูล</h3>
                            <h6>จำนวน <?= $row1 ?> คน</h6>
                            <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p> -->
                            <a class="btn btn-danger text-white shadow-lg form-control rounded-pill" href="r1.php">ดูทั้งหมด</a>
                            <button class="btn btn-danger text-white shadow-lg form-control rounded-pill" onclick="loader()"></button>
                        </div>
                    </div>
                </div>
                <?php 
                    $sql6 = "SELECT noid FROM data_nn WHERE st1 = '1'";
                    $query2 = $conn->prepare($sql6);
                    $query2->execute();
                    $row2 = $query2->rowCount();                
                ?>
                  <div class="col-12 col-md-12 col-lg-4">
                      <div class="card text-white text-center bg-success pb-2 rounded-4" data-aos="fade-up">
                          <div class="card-body">
                            <i class='bx bxs-user-check' ></i>
                              <h3 class="card-title">นักเรียนที่บันทึกข้อมูลแล้ว</h3>
                              <h6>จำนวน <?= $row2 ?> คน</h6>
                              <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p> -->
                              <a class="btn btn-success text-white shadow-lg form-control rounded-pill" href="r2.php">ดูทั้งหมด</a>
                          </div>
                      </div>
                  </div>
                  <?php 
                    $sql7 = "SELECT noid FROM data_nn";
                    $query3 = $conn->prepare($sql7);
                    $query3->execute();
                    $row3 = $query3->rowCount();                
                ?>
                  <div class="col-12 col-md-12 col-lg-4">
                      <div class="card text-white text-center bg-primary pb-2 rounded-4" data-aos="fade-up">
                          <div class="card-body">
                            <i class='bx bxs-user-detail'></i>
                              <h3 class="card-title">นักเรียนทั้งหมด</h3>
                              <h6>จำนวน <?= $row3 ?> คน</h6>
                              <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p> -->
                              <a class="btn btn-primary text-white shadow-lg form-control rounded-pill" href="r3.php">ดูทั้งหมด</a>
                          </div>
                      </div>
                  </div>
              </div>
              <br>
              <br>
              <hr>
              <br>
              <br>
              <div class="row">
                <h3 class="text-primary text-center fw-bold"><b>ห้องเรียนที่ยังไม่กรอกข้อมูล</b></h3>
                <p class="text-center">(สามารถคลิ๊กที่ห้องเพื่อดูนักเรียนที่ยังไม่กรอกข้อมูล)</p>
                <div class="col-12 col-md-12  table-responsive ">
                
                    <?php 
                      error_reporting(E_ALL & ~E_NOTICE);
                      // $sql_1 = "SELECT id FROM data_nn WHERE st1 != '1' ";
                      $sql_2 = "SELECT room,count(id) as num_rows FROM data_nn WHERE st1 != '1' GROUP BY room";
                      $query_1 = $conn->prepare($sql_2);
                      $query_1->execute();

                      
                      
                    ?>
                    <table class="table-sm table-striped-columns mx-auto" ata-aos="fade-up">
                        <!-- <thead >
                          <tr>
                            <th scope="col" colspan="12" class="text-center "><h3 class="text-primary"><b>ห้องเรียนที่ยังไม่กรอกข้อมูล</b></h3></th>
                          </tr>
                        </thead> -->
                        <tbody class="text-center">
                          <tr>
                            <?php 
                              $m=0;
                              while($row5 = $query_1->fetch(PDO::FETCH_ASSOC)) {
                              $m++;
                              $n=($m-1)%10;
                             ?>
                            <td>
                                <form action="r_stud.php" method="POST">
                                  <input type="hidden" value="<?= $row5['room'];?>" name="room">
                                  <button type="submit" name="room_check" class="btn btn-danger p-12-m-05 rounded-3 fs-7 shadow-lg text-white">ห้อง<?= $row5['room'];?>=<?= $row5['num_rows'];?>คน</button>
                                </form>
                              <!-- <a href="" class="bg-danger p-12-m-05 rounded-3 fs-6 shadow-lg text-white"></a> -->  
                            </td>
                            <?php 
                                if($n=='9'){
                            ?>
                                </tr>
                            <?php
                                } 
                              }
                            ?>
                         
                         


                        </tbody>
                    </table>
                    
                    
                </div>
                <div class="d-grid gap-2 col-4 mx-auto m-3 mt-5">
                      <a href="backend/index.php" class="btn btn-primary rounded-pill"><i class="bi bi-door-open-fill"></i>&nbsp;สำหรับเจ้าหน้าที่</a>
                    </div>
                </div>
              </div>
          </div>
          

      </section>

      <!-- footer starts -->
            <?php 
                include 'footer.php';
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