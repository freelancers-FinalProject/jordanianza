<?php 

// require "conection.php";
// require "functions.php";

if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 
  // $sub_category    = $_GET['sub-category'] ;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<link rel="stylesheet" href="style.css">



</head>
<body>

 <div class="container">
         
<?php $cate_result = getSubCategory($con, $id); 
if($cate_result->num_rows >0 ) {  ?>
         <div class="portfolio-menu mt-2 mb-4">
           
         <ul>
              <li class="btn btn-outline-warning active" data-filter="*">All</li>
            
            
            <?php 
while($cate_row = $cate_result->fetch_assoc()) { 
  if($cate_row['name']!="") { 

?>
    <li class="btn btn-outline-warning" data-filter=".<?= $cate_row['name']; ?>"><?= $cate_row['name']; ?></li>

    <?php }} ?>
    </ul>
    <?php
     }else { 
    ?> 

<!-- When RESULT EMPTY  -->
<div class="alert alert-warning" role="alert">
 0 result .
</div>



<?php } ?>
</div>

         </div>



         <div class="container">
         <div class="portfolio-item row">
      
    <?php 

    
$result = getContent($con, $id);

if($result->num_rows > 0 ) { 
  while($row=$result->fetch_assoc()){ 
    if($row['images']!= "") { 

    
?>

            <div class="item <?= $row['name']; ?> col-lg-3 col-md-4 col-6 col-sm">
               <a href="<?= $row['images']; ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
               <img class="img-fluid" src="<?= $row['images']; ?>" alt="">
               </a>
            </div>
       
            <?php
    }}} ?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>



<script src="main.js"></script>
</body>
</html>