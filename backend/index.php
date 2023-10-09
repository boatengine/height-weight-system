<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="custom.css">
    
    <?php
        session_start();
        if(!isset($_SESSION['admin'])) {
            header("location: login.php");
        }
        include 'header.php';
        include("../system/connectionDb.php");
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
      <section class="services section-padding" id="report" data-aos="fade-up">
          <div class="container shadow-lg p-5 ff1 rounded-4 bg-white">
              <div class="row">
                  <div class="col-md-12">
                      <div class="section-header text-center pb-5">
                        <h2 class="text-center fw-bold"><span class="text-primary "><b>ระบบสำหรับเจ้าหน้าที่</b></span><br></h2>
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
                        <div class="custom-loader1 mx-auto"></div>
                            <h3 class="card-title">นักเรียนที่ยังไม่บันทึกข้อมูล</h3>
                            <h6>จำนวน <?= $row1 ?> คน</h6>
                            <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p> -->
                            <a class="btn btn-danger text-white shadow-lg form-control rounded-pill" href="r1.php">ดูทั้งหมด</a>
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
                            <div class="custom-loader2 mx-auto"></div>
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
                            <div class="custom-loader3 mx-auto"></div>
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
              <div class="row justify-content-center text-center">

                    <script>
                        function notactive() {
                            alert("ยังไม่เปิดใช้งาน");
                        }
                        // notactive();
                    </script>
                    <div class="d-grid gap-2 col-6 mx-auto m-3">
                        <a href="show_all1.php" class="btn btn-secondary rounded-pill form-control"><i class="bi bi-people-fill"></i>&nbsp;รายงานสรุปนักเรียนทั้งหมด</a>
                        <a href="edit_student.php"  class="btn btn-secondary rounded-pill form-control"><i class="bi bi-gear-fill"></i>&nbsp;แก้ไขข้อมูลนักเรียน</a>
                        <!-- <a href="add_a.php" class="btn btn-secondary rounded-pill form-control"><i class="bi bi-person-plus-fill"></i>&nbsp;เพิ่มผู้ใช้ระบบ</a> -->
                        <button type="button" class="btn btn-secondary rounded-pill form-control" data-bs-toggle="modal" data-bs-target="#addAdmin"><i class="bi bi-person-plus-fill"></i>&nbsp;เพิ่มผู้ใช้ระบบ</button>
                        <a href="#" onclick="
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'ระบบนี้อยู่ระบบหว่างการพัฒนา',
                                // footer: '<a href=''>Why do I have this issue?</a>
                                })
                        " class="btn btn-secondary rounded-pill form-control" style="cursor: no-drop;"><i class="bi bi-pencil-square"></i>&nbsp;แก้ไขข้อมูลผู้ใช้ในระบบ</a>
                        <a href="show1.php" class="btn btn-success rounded-pill form-control"><i class="bi bi-cloud-arrow-down-fill"></i>&nbsp;ดาวน์โหลดข้อมูล(Excel)</a>
                    </div>
                    <!-- modal Add Admin  -->
                    
                    

                </div>
                
                <div class="modal fade mt-5" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h1 class="modal-title fs-5 " id="exampleModalLabel"><i class="bi bi-person-circle"></i>&nbsp;เพิ่มผู้ใช้ระบบ</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="add_admin.php" method="POST">
                                <div class="input-group flex-nowrap mb-3">
                                      <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-person-lines-fill"></i>&nbsp;ชื่อ</span>
                                      <input type="text" placeholder="กรุณากรอก.."  name="name" class="form-control rounded-right-1"  required >
                                </div>
                                <div class="input-group flex-nowrap mb-3">
                                      <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-person-badge"></i>&nbsp;ชื่อผู้ใช้</span>
                                      <input type="text" placeholder="กรุณากรอก.."  name="username" class="form-control rounded-right-1"  required >
                                </div>
                                <div class="input-group flex-nowrap mb-3">
                                      <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-key-fill"></i>&nbsp;รหัสผ่าน</span>
                                      <input type="password" placeholder="กรุณากรอก.."  name="password" class="form-control rounded-right-1"  required >
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbsp;ปิด</button>
                                <button type="submit" class="btn btn-primary rounded-pill" name="add_admin_btn"><i class="bi bi-person-fill-add"></i>&nbsp;เพิ่มผู้ใช้ระบบ</button>
                            </div>
                            </form>
                            </div>
                    
                        </div>
                </div>
                    <div class="col-12 col-md-6 mx-auto">
                        <div class="card  mt-4">
                            <div class="card-header">
                                <h6> จัดการนักเรียน <b class="text-danger">(ยังไม่ปิดให้ใช้งาน)</b></h6>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input class="form-control" aria-describedby="basic-addon2" autocomplete="off" onkeyup="showHint(this.value)" aria-label="Recipient's username" placeholder="Name..." id="txt1" disabled>
                                    <button class="btn btn-secondary input-group-text" id="basic-addon2" disabled>Search</button>
                                </div>
                                <br>
                                <div id="txtHint"></div>
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
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>




<!--for getting the form download the code from download button-->