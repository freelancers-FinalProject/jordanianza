
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="index.php"><img src="img/brand4.png" alt=""></a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="category.php"><i class="fas fa-tag"></i>Tag <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload_photo_video.php"><i class="fas fa-upload"></i>Upload</a>
      </li>
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <?php 
            $array= getImageSubAdmin($conn,$_SESSION['id2']);
           if($array['profile_pic'] != ""){
            echo' <img src="images/'.$array['profile_pic'].'" alt="" class="pic_profile" style=" width: 33px;  border: 1px solid;
             border-radius: 15px; height: 33px;">';
            }else{
            echo' <img src="img/avater2.png" alt="" class="pic_profile" style=" width: 33px;  border: 1px solid;
             border-radius: 15px; height: 33px;">';
            }
          ?>
        <?php echo $_SESSION['username_subAdmin']?> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -71px;  margin-top: -3px;">
          <a class="dropdown-item" href="editprofile.php">Edit Profile </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    
      
    </ul>
  </div>
  
</nav> 