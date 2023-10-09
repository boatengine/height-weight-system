<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
          <a class="navbar-brand" href="index.php"><span class="text-custom ">kanlayanee</span></a>
          <!-- <a class="navbar-brand" href="#"><span class="text-primary">Kanla</span>yanee</a> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <?php 
                if(!isset($_SESSION['admin'])) {
              ?>
              <li class="nav-item">
                <a class="nav-link bg-primary rounded-pill text-white px-3" href="logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;เข้าสู่ระบบ</a>
              </li>
              <?php }else {?>
              <li class="nav-item">
                <a class="nav-link bg-danger rounded-pill text-white px-3" href="logout.php"><i class="bi bi-box-arrow-right"></i>&nbsp;ออกจากระบบ</a>
              </li>
              <?php }?>

            </ul>
          </div>
        </div>
</nav>