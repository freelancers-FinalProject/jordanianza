<?php
require 'template/header.php';
require 'template/navbar.php';
if(isset($_SESSION['id2'])) {
require 'config.php';
if(isset($_POST['insertCate'])){
if($_SERVER['REQUEST_METHOD']=='POST'){
  $cateName = $_POST['cateName'];
  if(isset($cateName) && !empty($cateName) ){
    insertData($cateName,$_SESSION['id2']);
  }else{
    echo '<div class="alert alert-warning" role="alert">
          Pleas Enter Name Category!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>';
  }
}}
if(isset($_POST['updateCate']))
{
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $id   = $_POST['id'];
  $name = $_POST['cateName'];
  updataData($name,$id);
 header("location:category.php");}
}
?>
<div class="container">
 <button type="submit" class="btn btn-primary edit-submit" data-toggle="modal" data-target="#addCategory" data-whatever="@getbootstrap"><i class="fas fa-plus"></i>New Tag</button>
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <form ation="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <div class="modal-body">
     
          <div class="form-group">
            <label for="nameCate" class="col-form-label">Name Tag:</label>
            <input type="text" class="form-control" id="nameCate" name="cateName">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="insertCate">Save</button>
      </div>
   </form>
    </div> 
  </div> 
  </div> 

  <div class="row">
<?php
    $data =fetchData($_SESSION['id2']);
    if(isset($data)){   
     for ($i=0; $i <count($data) ; $i++) { 
 echo ' 
 
 <div class="col-sm-6 col-lg-4">
 <div class="card eidt_card">
     <div class="card-body ">
       <h4 class="card-text pb-3 "><i class="fas fa-icons"></i> '.$data[$i]['name'].'</h4>
       <div class="container">
       <a href="posts.php?category_name='.$data[$i]['name'].'"class="btn btn-info"><i class="far fa-eye"></i> View</a>
       <button  class="btn btn-success" data-toggle="modal" data-target="#editCategory'.$data[$i]['id'].'" data-whatever="@getbootstrap"><i class="far fa-edit"></i> Update</button>
       <div class="modal fade" id="editCategory'.$data[$i]['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Eidt Category</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
         <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
            <div class="modal-body">
           
               <div class="form-group">
                            <label for="nameCate" class="col-form-label">Name Category:</label>
                  <input type="hidden"  name="id" value="'.$data[$i]['id'].'">
                  <input type="text" class="form-control" id="nameCate" name="cateName" value="'.$data[$i]['name'].'">
               </div>
              
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary" name="updateCate">Save</button>      
             
             </div>
      </form>
           </div> 
         </div>
       </div>
       <a href="delete.php?id='.$data[$i]['id'].'"class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
       </div>
     </div>
   </div> 
 </div>

 ';}}?>  
 </div>
 </div>
<?php
}else{
  header("location:../login/index.php");
  exit();
}
require 'template/footer.php';
?>

