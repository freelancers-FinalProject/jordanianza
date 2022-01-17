<?php 
session_start();
//include("./template/header-side.php");
include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../sop.css" rel="stylesheet">
    <style>
    .btn {
        width:100%;
        margin-top:15%;
        
    }
    </style>

</head>
<body>
    
<?php

            $subAdmin_id = $_GET['id']; 
            $q = "SELECT * FROM sub_category WHERE subAdmin_id='$subAdmin_id' ";
            $q_result = $conn->query($q); 
            // $q_row = $q_result->fetch_assoc(); 
            if($q_result->num_rows > 0){ 
                while($q_row =$q_result->fetch_assoc() ){ 
            $q_row_id = $q_row['id']; 

            // Attempt select query execution
            
            $sql = "SELECT * FROM content WHERE subCate_id = '$q_row_id' ";
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $subCate_id = $row['subCate_id']; 
                        $subCate_sql = "SELECT * FROM sub_category WHERE id='$subCate_id' " ;
                        $subCate_result =$conn->query($subCate_sql); 
                        $subCate_row =$subCate_result->fetch_assoc();

                        ?>
<div class="container">
    
	<div class="row">
		<div class="col-md-4">
    <div class="profile-card-2">
    <div class="container1">
    <div class="overlay">
        <img src="../../sub-admin/uploads_image/<?php echo $row["images"];?>" class="img img-responsive">
         <div class="profile-icons">
        
             <a href="deleteimg.php?id=<?=$row['id']?>&subAdmin_id=<?=$subAdmin_id?>" title="Delete Record" data-toggle="tooltip"><span class="fa fa-times"></span></a>
            </div>
        <div class="profile-name"><?php echo $subCate_row['name']; ?></div>
        </div>
        </div>
       
        
    </div>
</div>
      
<?php } 

mysqli_free_result($result);
        }
    }
}
 }
    mysqli_close($conn);

?>
<div class="btn ">
<a href="admins.php" data-toggle="tooltip" title="back"><h1><span class="fa fa-arrow-circle-left"></span></a></h1></div>
<!-- <button class="btn btn-success" id="btn-add"><i class="fa fa-arrow-circle-left"></i></button> -->

</div>
</body>