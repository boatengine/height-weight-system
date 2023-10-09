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
        include('system/connectionDb.php');
        // check session
        // if(!isset($_SESSION['noid'])) {
        
        //     header("location: index.php");
            
        // }
            
        include 'header.php';
        
    ?>

</head>
<body style="background-color:#F6F8FF;">
    

    <?php
        include 'system/alert.php';
        include 'navbar.php';
        

        // system 
        $sql = "SELECT * FROM data_nn WHERE st1 = '1' ORDER BY date1 DESC" ; //เรียกข้อมูลจากฐานข้อมูลมาใช้งานและนับข้อมูลในฐานข้อมูล
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
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

      <!-- about section Ends -->
      <!-- services section Starts -->
      <section id="login" class="about section-padding">
        <div class="container shadow-lg p-5 ff1 rounded-4 bg-white">
              <div class="col-md-12 text-center ">
              <img src="img/h8green.png" alt="" class="img-fluid img-save " width="10%" loading="eager">
                    <h2 class="text-center "><span class="text-success"><b>นักเรียนที่บันทึกข้อมูลเรียบร้อยแล้ว</b></span></h2>
                    <div class="d-grid gap-2 col-3 mx-auto m-3">
                        <a href="index.php" class="btn btn-success form-control mb-8 rounded-pill btn-sm"><i class='bx bx-right-arrow-alt'></i>&nbsp;กลับหน้าแรก</a>
                    </div>
                    
                </div>
              <hr>
            <div class="row " >
                <!-- <div class="col-lg-2 col-md-12 col-12"></div> -->

                <div class="col-lg-12 col-md-12 col-12 mx-auto rounded-4 shadow p-5">
                    
                    <div class="about-text">
                    <div class="table-responsive">    
                        <table class="table mt-3 table-hover display nowrap" id="myG" style="width:100%">
                            <thead class="p-2 mb-2 bg-success text-white">
                                <tr>
                                    <th scope="col" class="bg-success text-white">#</th>
                                    <th scope="col"  class="bg-success text-white" style="width:10%">เลขประจำตัว</th>
                                    <th scope="col" class="bg-success text-white">ห้อง</th>
                                    <th scope="col" class="bg-success text-white">เลขที่</th>
                                    <th scope="col" class="bg-success text-white">ชื่อสกุล</th>
                                    <th scope="col" class="bg-success text-white">BMI</th>
                                    <th scope="col" class="bg-success text-white">เวลาบันทึกข้อมูล</th>
                                </tr>
                            </thead>
                            </thead>
                                        <tbody class="table-white table-striped-columns" style="font-size:14px">
                                           <?php 
                                           $j=0;        
                                            if($query->rowCount() > 0) {
                                                
                                                foreach($result as $row){
                                                    $j++;
                                                $n1=$row['w'];
                                                $h1=$row['h'];
                                                $m=$n1/(($h1/100)*($h1/100));

                                                if($m==0){
                                                    $pr="";
                                                }elseif($m<15){
                                                    $pr="ผอมมาก";
                                                }elseif($m<17){
                                                    $pr="ผอม";
                                                }elseif($m<18){
                                                    $pr="เริ่มผอม";
                                                }elseif($m<25){
                                                    $pr="สมส่วน";
                                                }elseif($m<30){
                                                    $pr="เริ่มอ้วน";
                                                }else {
                                                    $pr="อ้วน";
                                                }
                                            
                                        ?>
                                            <tr class="p-2">
                                                <th scope="row"><?= $j?></th>
                                                <td class=""><?= $row['noid']?></td>
                                                <td><?= $row['room']?></td>
                                                <td><?= $row['no']?></td>
                                                <td><?= $row['nn'].$row['fname']?>&nbsp;&nbsp;<?=$row['lname'] ?></td>
                                                <td><?php echo printf('%.1f',$m);?></td>
                                                <td><?= $row['date1']?></td>

                                            </tr>
                                            <?php }
                                            
                                        }?>
                                        </tbody>
                            </table>
                        </div>
                            <br>
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