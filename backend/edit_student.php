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
        $sql = "SELECT noid,room,no,nn,fname,lname,st1 FROM data_nn WHERE status = 1 ORDER BY id ASC" ; //เรียกข้อมูลจากฐานข้อมูลมาใช้งานและนับข้อมูลในฐานข้อมูล
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
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
                    <div class="d-grid gap-2 col-3 mx-auto m-3">
                        <a href="index.php" class="btn btn-primary form-control mb-8 rounded-pill btn-sm"><i class='bx bx-right-arrow-alt'></i>&nbsp;กลับหน้าแรก</a>
                    </div>
                    
                </div>
              <hr>
            <div class="row " >
                <!-- <div class="col-lg-2 col-md-12 col-12"></div> -->

                <div class="col-lg-12 col-md-12 col-12 mx-auto rounded-4 shadow p-5">
                    
                    
                    <div class="about-text">
                    <div class="table-responsive">    
                        <table class="table mt-3 table-hover display nowrap" id="myG" style="width:100%">
                            <thead class="p-2 mb-2 bg-primary text-white">
                                <tr>
                                    <th scope="col" class="bg-primary text-white">#</th>
                                    <th scope="col" class="bg-primary text-white" style="width:10%">เลขประจำตัว</th>
                                    <th scope="col" class="bg-primary text-white">ห้อง</th>
                                    <th scope="col" class="bg-primary text-white">เลขที่</th>
                                    <th scope="col" class="bg-primary text-white">ชื่อสกุล</th>
                                    <th scope="col" class="bg-primary text-white">สถานะ</th>
                                    <th scope="col" class="bg-primary text-white">แก้ไข</th>
                                    <!-- <th scope="col" class="bg-primary text-white">เวลาบันทึกข้อมูล</th> -->
                                </tr>
                            </thead>
                            </thead>
                                        <tbody class="table-white table-striped-columns" style="font-size:14px">
                                           <?php 
                                           $j=0;        
                                            if($query->rowCount() > 0) {
                                                
                                                foreach($result as $row){
                                                $j++;
                                            
                                        ?>
                                            <tr class="p-2">
                                                <th scope="row"><?= $j?></th>
                                                <td class=""><?= $row['noid']?></td>
                                                <td><?= $row['room']?></td>
                                                <td><?= $row['no']?></td>
                                                <td><?= $row['nn'].$row['fname']?>&nbsp;&nbsp;<?=$row['lname'] ?></td>
                                                <td><?php 
                                                    if($row['st1'] == NULL) {
                                                        echo "<strong class='text-danger'>ยังไม่ได้บันทึกข้อมูล</strong>";
                                                    }else {
                                                        echo "<strong class='text-success'>บันทึกข้อมูลแล้ว</strong>";
                                                    }
                                                ?></td>
                                                <td>
                                                    <form action="edit_student_profile.php" method="POST">
                                                        <input type="hidden" value="<?= $row['noid']?>" name="noid">
                                                        <button type="submit" class="btn btn-warning rounded-pill btn-sm" name="edit_student">แก้ไข</button>
                                                        <!-- <button type="button" class="btn btn-warning rounded-pill form-control editbtn"><i class="bi bi-pencil-square"></i></button> -->
                                                    </form>
                                                </td>

                                            </tr>
                                            <?php }
                                            
                                        }?>
                                        </tbody>

                            </table>
                        </div>
                            <br>
                            
                            <!-- modal -->
                            <!-- <div class="modal fade mt-5" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header bg-warning text-white">
                                            <h1 class="modal-title fs-5 " id="exampleModalLabel"><i class="bi bi-person-circle"></i>&nbsp;แก้ไขข้อมูลนักเรียน</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="" method="POST">
                                            <input type="hidden" name="noid" id="noid">
                                            <div class="input-group flex-nowrap mb-3">
                                                <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-list-ol"></i>&nbsp;เลขประจำตัว</span>
                                                <input type="number" id="noid" name="noid" class="form-control rounded-right-1"  readonly >
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-person-lines-fill"></i>&nbsp;ชื่อ</span>
                                                <input type="text" class="form-control" placeholder="กรุณากรอก.." id="fname" name="fname">
                                                <span class="input-group-text bg-secondary text-white " id="addon-wrapping"><i class="bi bi-person-lines-fill"></i>&nbsp;นามสกุล</span>
                                                <input type="text" class="form-control rounded-right-1" placeholder="กรุณากรอก.."  id="lname" name="lname">
                                            </div>

                                            <div class="input-group flex-nowrap mb-3">
                                            <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-house-check-fill"></i>&nbsp;ห้อง</span>
                                                <input type="text" class="form-control" placeholder="กรุณากรอก.." id="room" name="room">
                                                <span class="input-group-text bg-secondary text-white " id="addon-wrapping"><i class="bi bi-person-lines-fill"></i>&nbsp;เลขที่</span>
                                                <input type="text" class="form-control rounded-right-1" placeholder="กรุณากรอก.." id="no" name="no">
                                            </div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <span class="input-group-text bg-secondary text-white rounded-left-1" id="addon-wrapping"><i class="bi bi-key-fill"></i>&nbsp;รหัสผ่าน</span>
                                                <input type="password" placeholder="กรุณากรอก.."  name="password" class="form-control rounded-right-1"  required  id="password">
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
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
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbsp;ปิด</button>
                                            <button type="submit" class="btn btn-primary rounded-pill" name="add_admin_btn"><i class="bi bi-person-fill-add"></i>&nbsp;บันทึกข้อมูล</button>
                                        </div>
                                        </form>
                                        </div>
                                
                                    </div>
                            </div> -->
                            <!-- end modal -->



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
        // Aos fade
      AOS.init();

    
    </script>
<!-- modal script -->
<!-- <script>
            $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#noid').val(data[0]);
                $('#fname').val(data[1]);
                $('#lname').val(data[2]);
                $('#no').val(data[3]);
                $('#password').val(data[4]);
            });
            });
</script> -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>




<!--for getting the form download the code from download button-->