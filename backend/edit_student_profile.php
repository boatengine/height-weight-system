<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูล</title>
    
    <?php 
        session_start();
        include('../system/connectionDb.php');
        
        // check session
        if(!isset($_SESSION['admin'])) {
        
            header("location: login.php");
            
        }
            
        include 'header.php';
        
    ?>

</head>
<body style="background-color:#F6F8FF;">
    

    <?php
        include '../system/alert.php';
        include 'navbar.php';

        // system 
        // $noid = $_SESSION['noid'];
        if(isset($_POST['edit_student'])) {
            $noid = $_POST['noid'];
        }
        $sql1 = "SELECT * FROM data_nn WHERE noid = :noid";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':noid', $noid, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0) {
            foreach($row as $rowv) {
                $v=" ";$fn=$rowv['fname'];$n=$rowv['nn'];$ln=$rowv['lname'];$r=$rowv['room'];$no=$rowv['no'];
            }
        }
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

      <!-- about section Ends -->
      <!-- services section Starts -->
      <section id="login" class="about section-padding">
        <div class="container shadow-lg p-5 ff1 rounded-4 bg-white ">
              <div class="col-md-12 text-center ">
              <img src="../img/h9aa.png" alt="" class="img-fluid img-save " width="10%" loading="eager">
                <h2 class="text-center fw-bold"><span class="text-primary "><b>ระบบสำหรับเจ้าหน้าที่</b></span><br></h2>
                    <h5 class="text-center "><span class="text-primary"><b>แก้ไขข้อมูลนักเรียน</b></span></h5>
                    <h4 class="text-center text-primary"><?php echo $n.$fn.$v.$ln;?></h4>
                    <h6 class="text-success text-center">เลขประจำตัว  <?= $noid?>  ชั้น ม.  <?= $r?>  เลขที่  <?= $no?></h6>

                    
                </div>
              <!-- <hr> -->
            <div class="row " >
                <!-- <div class="col-lg-2 col-md-12 col-12"></div> -->


                    
                    
                <div class="about-text">
                          <!-- <h2>We Provide the Best Quality <br/> Services Ever</h2> -->
      
      
                          <!-- <a href="#" class="btn btn-primary">Learn More</a> -->
                          <div class="col-md-6 mx-auto">
                              <form method="POST" action="edit_student_system.php">
                                  <input type="hidden" value="<?= $noid ?>" name="noid1" id="noid1">
                                  <div class="input-group flex-nowrap">
                                      <span class="input-group-text bg-primary text-white rounded-left-1" id="addon-wrapping"><i class='bx bx-plus-medical' ></i>&nbsp;น้ำหนัก</span>
                                      <input type="number" placeholder="กรุณากรอก.." min ='20' max = '150' step ='.1' maxlength='5' name="nn2" class="form-control" id="nn2" required value="<?= $rowv['w'];?>">
                                      <span class="input-group-text bg-primary text-white rounded-right-1" id="addon-wrapping">(กก.)</span>
                                  </div>
      
                                  <div class="input-group flex-nowrap mt-3">
                                      <span class="input-group-text bg-primary text-white rounded-left-1" id="addon-wrapping"><i class='bx bxs-bar-chart-alt-2' ></i>&nbsp;ส่วนสูง</span>
                                      <input type="number" placeholder="กรุณากรอก.." min='100' max ='200' maxlength="3" name="hh2" class="form-control" id="hh2" required value="<?= $rowv['h'];?>">
                                      <span class="input-group-text bg-primary text-white rounded-right-1" id="addon-wrapping">(ซม.)</span>
                                  </div>
      
                                  <div class="input-group flex-nowrap mt-3">
                                      <span class="input-group-text bg-primary text-white rounded-left-1" id="addon-wrapping"><i class='bx bx-reflect-horizontal' ></i>&nbsp;รอบเอว</span>
                                      <input type="number" placeholder="กรุณากรอก.." min='10' max = '70' step ='.1'maxlength="5" name="rob2" class="form-control" id="rob2" required value="<?= $rowv['rob'];?>">
                                      <span class="input-group-text bg-primary text-white rounded-right-1" id="addon-wrapping">(นิ้ว)</span>
                                  </div>
      
                                <button type="submit" name="edit_submit" class="btn btn-success form-control mt-3 rounded-pill"><i class='bx bxs-save'></i>  &nbsp;บันทึกข้อมูล</button>
                                <a href="index.php" class="btn btn-secondary form-control mt-1 rounded-pill"><i class='bx bx-exit' ></i>&nbsp;ยกเลิก</a>
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

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>




<!--for getting the form download the code from download button-->