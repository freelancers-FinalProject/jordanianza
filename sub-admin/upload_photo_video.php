<?php
require 'template/header.php';
require 'template/navbar.php'; 
if(isset($_SESSION['id2'])) {
  $array =fetchData($_SESSION['id2']);
  if(isset($array)){

 
?>

<div class="section">
<div class="container">
<form action="upload.php" method="POST">
<div class="form-group">
    <label for="exampleFormControlSelect1">Please choose the section that likes photos and videos:</label>
    <select class="form-control"  name="sub_category" id="select" onchange="
    (this.value);">
      <?php
      foreach(fetchData($_SESSION['id2']) as $val){
        echo "<option value='".$val['id']."'>".$val['name']."</option>";
      }
     ?>
    </select>
  </div>
  </form>
<!-- Button trigger modal -->
<button id="alert" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Massage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     Image and Video uploaded successfully
      </div>
    </div>
  </div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div class="display-4 text-center ">
    <div id="drop_box" ondrop="upload_file(event)" ondragover="return false">
        <div id="drog_upload_file ">
        <i class='fas fa-cloud-upload-alt'></i>
            <p>Drop Image Or video here</p>
            <p>or</p>
            <p><input type="button" value="Select Image Or video" onclick="file_explorer();"></p>
            <input type="file" id="selectfile" multiple style="display: none" >
        </div>
    </div>
</div>
  </div>
</div>

<?php  }else{
  echo"
  <div class='container'>
  <div class='alert alert-warning' role='alert'>
              Please build a tag and then upload photos and videos
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
        </div>
        </div>";
  }?>
<?php
}else{
  header("location:../login/index.php");
  exit();
}
require 'template/footer.php';
?>