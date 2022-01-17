<?php 

if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 
  // $sub_category    = $_GET['sub-category'] ;

}


?>

 <div class="container">
       
         <div class="portfolio-menu mt-2 mb-4">
            <ul>
               <li class="btn btn-outline-dark active" data-filter="*">All</li>
               <?php $cate_result = getSubCategory($conn, $id); 
                       if($cate_result->num_rows >0 ) {  
                  while($cate_row = $cate_result->fetch_assoc()) { 
                    if($cate_row['name']!="") { ?>
               <li class="btn btn-outline-dark" data-filter=".<?= $cate_row['name']; ?>"><?= $cate_row['name']; ?></li>
              
               <?php
    }
}
}else { 

?> 

<!-- When RESULT EMPTY  -->
<div class="alert alert-warning" role="alert">
 0 result .
</div>



<?php } ?>
            </ul>
         </div>
         <div class="portfolio-item row">
<?php 

    
$result = getContent($conn, $id);

if($result->num_rows > 0 ) { 
  while($row=$result->fetch_assoc()){ 
    if($row['images']!= "NULL") { 

    
?>
            <div class="item <?= $row['name']; ?> col-lg-3 col-md-4 col-6 col-sm  img-like">
               <img class="img-fluid w-100" src="../sub-admin/uploads_image/<?= $row['images']; ?>" alt=" <?= $row['name']; ?>" alt="">
               <?php if(isset($_SESSION['id1'])){?>
               <div class="eidt-btn text-center pt-1">
                  <button class="btn btn-danger" id="<?= $row['id']?>"  data-id="0" onclick="like(<?= $row['id']?>)">
                     <span class="icon_like<?= $row['id']?>"><i class="far fa-heart"></i></span> Like 
                     <span class="num_like<?= $row['id']?>"><?= $row['rating']?></span>
                  </button>
            </div>
 <?php  }?>
            </div>
            <?php    }
    } 
  }
       ?>
         </div>
      </div>
      
      
