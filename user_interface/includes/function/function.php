<?php
//  get title the function  is dynamic tilte all pages 
// function get_Tilte(){
//     global $pageTitle;
//     if(isset($pageTitle)){
//         echo $pageTitle;
//     }else{
//         echo "defult";
//     }
// }
function fetchData_Users($user_id){
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0) {
      return $data;
    }else {
echo"<div class='alert alert-warning' role='alert'>
      0 results
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
      </div>";
    }
}
function update_info_profile($username,$email,$pass,$id){
  global $conn;
  $sql = "UPDATE users SET username='$username',email='$email',password='$pass' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "<div class='alert alert-warning' role='alert'>
        Record updated successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
      </div>";
} else {
  echo "<div class='alert alert-warning' role='alert'>
  Error updating record: " . mysqli_error($conn)."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
  </div>";
}

}
function update_image($id,$profile_pic){
  global $conn;
  $sql = "UPDATE users SET profile_pic='$profile_pic' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  // echo "<div class='alert alert-warning' role='alert'>
  //       Record updated successfully
  //     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>&times;</span>
  //   </button>
  //     </div>";
} else {
  echo "<div class='alert alert-warning' role='alert'>
  Error updating record: " . mysqli_error($conn)."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
  </div>";
}

}



function getSubCategory($con , $id){ 
    
  $cate   = "SELECT * FROM sub_category WHERE subAdmin_id='$id' ";  
  $cate_result  = $con->query($cate); 
  return $cate_result ;
  }
  
  function getContent($con, $id){ 
      $sql ="SELECT sub_category.id , content.id,name , images ,rating
      FROM sub_category
      INNER JOIN content ON content.subCate_id=sub_category.id 
      WHERE subAdmin_id='$id' " ;
      $result = $con->query($sql);
      return $result ;
  }
  
  function getSubAdminInfo($con, $id){
  
      $sql ="SELECT category.id, name,
      sub_admin.id, username, email, address, phone, profile_pic, facebook, instagram 
      FROM category 
      INNER JOIN sub_admin 
      ON cate_id=category.id 
      WHERE sub_admin.id='$id' ";
  
      $result = $con->query($sql); 
      $row = $result->fetch_assoc(); 
      return $row ;
  }
  
  function getVideo($con, $id){
       
  
      $sql=" SELECT 
      sub_category.id,
      content.video
       FROM  sub_category 
       INNER JOIN content  
       ON content.subCate_id =sub_category.id
  
       WHERE sub_category.subAdmin_id= '$id' ";
       
       
  
       $result=$con->query($sql); 
  
        
        
       return $result ;
  
  
  }

  function lastgetSubAdmin($con,$nameCate){ 
  

    $sql ="SELECT category.id,name,sub_admin.id, username, email, address, phone, profile_pic, facebook, instagram 
    FROM category 
    INNER JOIN sub_admin 
    ON cate_id=category.id 
    WHERE type=0 AND category.name = '$nameCate'
    ORDER BY sub_admin.id DESC
   LIMIT 6 ";
    $result = $con->query($sql); 
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0) {
      return $data;
    }
}
function getSubAdmin($con,$nameCate){ 
  
  $sql ="SELECT category.id,name,sub_admin.id, username, email, address, phone, profile_pic, facebook, instagram 
  FROM category 
  INNER JOIN sub_admin 
  ON cate_id=category.id 
  WHERE type=0 AND category.name = '$nameCate'";
  $result = $con->query($sql); 
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if (mysqli_num_rows($result) > 0) {
    return $data;
  }
}
function getCategory($con){
  $sql ="SELECT category.id,name FROM category ";
  $result = $con->query($sql); 
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if (mysqli_num_rows($result) > 0) {
    return $data;
  }
}
 function getImageUser($con,$id) {
  $sql ="SELECT profile_pic  FROM  users WHERE id='$id'  ";
  $result = $con->query($sql);  
  $row = $result->fetch_assoc(); 
  return $row ;
 }
   

 function update_rating($id,$rating) {
  global $conn;
  $sql = "UPDATE content SET rating='$rating' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
} else {
  echo "<div class='alert alert-warning' role='alert'>
  Error updating record: " . mysqli_error($conn)."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
  </div>";
}

 }

 function getRating() {
  global $conn;
  $sql ="SELECT images, rating FROM content  ";
  $result = $conn->query($sql);  
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if (mysqli_num_rows($result) > 0) {
    return $data;
  }
 }

?>