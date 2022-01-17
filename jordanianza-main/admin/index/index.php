<style>
.link {
  text-decoration:none;
  color:white;
}
  </style>
<?php
include("../template/header-side.php");
include("../config.php");
if(isset($_SESSION['username_Admin'])){
?>
        <!-- partial -->
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"> Users
                    </h4>
                    <a class="link" href="../User/users-service.php">
                    <h2 class="mb-5"><?php
                     $sql1="SELECT id FROM users ORDER BY id ";
                     $result1=mysqli_query($conn,$sql1);
                     $row1=mysqli_num_rows($result1);
                    ?>
              <span class="info-box-number"><?php echo"#" . $row1; ?></span></h2></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Categories
                    </h4>
                    <a class="link" href="../Category/cate2.php">
                    <h2 class="mb-5">
                      <?php $sql1="SELECT id FROM category ORDER BY id ";
                     $result1=mysqli_query($conn,$sql1);
                     $row1=mysqli_num_rows($result1);
                    ?>
              <span class="info-box-number"><?php echo"#" . $row1; ?></span></h2></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Admins
                    </h4>
                    <a class="link" href="../Admins/admins.php">
                    <h2 class="mb-5">
                      <?php $sql1="SELECT id FROM sub_admin ORDER BY id ";
                     $result1=mysqli_query($conn,$sql1);
                     $row1=mysqli_num_rows($result1);
                    ?>
              <span class="info-box-number"><?php echo"#" . $row1; ?></span></h2></a>
                  </div>
                </div>
              </div>
    <?php }else{
           header('location:index.php');
    }?>