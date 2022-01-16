<?php 
require 'template/header.php';
$navbarTrans = true;
require 'template/navbar.php';
// $pageTitle = "Home";
?>


<!--Carousel Wrapper-->
<div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#video-carousel-example" data-slide-to="1"></li>
    <li data-target="#video-carousel-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <video class="video-fluid" autoplay loop muted>
        <source src="video_interface/production ID_4508061.mp4" type="video/mp4" style=" background-size: cover" />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source src="video_interface/pexels-karolina-grabowska-7720775.mp4" type="video/mp4" tyle=" background-size: cover"  />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source src="video_interface/video (2).mp4" type="video/mp4" />
      </video>
    </div>
  </div>
 
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#video-carousel-example" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#video-carousel-example" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--Carousel Wrapper-->
<section class="pt-5 pb-5 ">
  <div class="container">
    <div class="row">
    <div class=" col-sm-12 col-md-6 ">
            <h3 class="mb-3" id="<?php echo $_SESSION['photographers']?>"><?php echo $_SESSION['photographers']?></h3>
        </div>
    <div class=" col-sm-12 col-md-6   col-lg-6  text-right">
        <a href="card-profilesubAdmin.php?name_category=<?php echo $_SESSION['photographers']?>"  class="btn btn-primary btn-show"><i class="far fa-eye"></i> Show All</a>
        </div>
        <div class="container">
        <div class="row align-middle">
<?php

   $array = lastgetSubAdmin($conn,$_SESSION['photographers']);
  if(isset($array)) {
   foreach($array as $val){

    echo'
    
      <div class="col-md-6 col-lg-4 column">
        <div class="card gr-1">
          <div class="txt">
            <h1>'.$_SESSION['photographers'] .'</br>
 '.$val['username'].'</h1>
            <div>

            </div>
          </div>
          <a href="subAdmin_profile.php?id='.$val['id'].'">more</a>
          <div class="ico-card">
          <i class="fas fa-camera"></i>
        </div>
        </div>
      </div>
      
 
      
 
';    } }?>
     </div>
     </div>
    </div>   
  </section>
                    
        
  
             

<section class="pt-5 pb-5  ">
  <div class="container">
    <div class="row">
    <div class=" col-sm-12 col-md-6 ">
            <h3 class="mb-3" id="<?php echo $_SESSION['designers']?>"><?php echo $_SESSION['designers']?></h3>
        </div>
    <div class=" col-sm-12 col-md-6   col-lg-6  text-right">
        <a href="card-profilesubAdmin.php?name_category=<?php echo $_SESSION['designers']?>"  class="btn btn-primary btn-show"><i class="far fa-eye"></i> Show All</a>
        </div>
        <div class="container">
        <div class="row align-middle">
        <?php
 $array = lastgetSubAdmin($conn,$_SESSION['designers']);
 if(isset($array)){
   foreach($array as $val){

    echo'
    
      <div class="col-md-6 col-lg-4 column">
        <div class="card gr-1">
          <div class="txt">
            <h1>'.$_SESSION['designers'] .'</br>
 '.$val['username'].'</h1>
          </div>
          <a href="subAdmin_profile.php?id='.$val['id'].'">more</a>
          <div class="ico-card">
          <i class="far fa-object-group"></i>
        </div>
        </div>
      </div>
      
 
      
 
';    }   }?>
        </div>
     </div>
    </div>
</div>
</section>


<section class="pt-5 pb-5  ">
  <div class="container">
    <div class="row">
    <div class=" col-sm-12 col-md-6 ">
            <h3 class="mb-3" id="<?php echo $_SESSION['makeup artists']?>"><?php echo $_SESSION['makeup artists']?></h3>
        </div>
    <div class=" col-sm-12 col-md-6   col-lg-6  text-right">
        <a href="card-profilesubAdmin.php?name_category=<?php echo $_SESSION['makeup artists']?>"  class="btn btn-primary btn-show"><i class="far fa-eye"></i> Show All</a>
        </div>
        <div class="container">
        <div class="row align-middle">
        <?php
   $array = lastgetSubAdmin($conn,$_SESSION['makeup artists']);
   if(isset($array)){
   foreach($array as $val){

    echo'
    
      <div class="col-md-6 col-lg-4 column">
        <div class="card gr-1">
          <div class="txt">
            <h1>'.$_SESSION['makeup artists'] .'</br>
 '.$val['username'].'</h1>
          </div>
          <a href="subAdmin_profile.php?id='.$val['id'].'">more</a>
          <div class="ico-card">
          <i class="fas fa-paint-brush"></i>
        </div>
        </div>
      </div>
      
 
      
 
';  }  }?>
        </div>
     </div>
    </div>
</div>
</section>



<?php

require 'template/footer.php';

?>
