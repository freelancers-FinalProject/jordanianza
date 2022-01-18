<?php


// funcation insert data in table sub_category
function insertData($name,$sub_Admin){
    global $conn;
    $fetchData = "SELECT id,name FROM sub_category WHERE subAdmin_id =$sub_Admin";
    $fetchData_result = $conn->query($fetchData); 
    
    $sql = "INSERT INTO sub_category (name,subAdmin_id )
    VALUES ('".$name."', $sub_Admin)";

     if( !isEmpty($fetchData_result)) {
           
            if(!isMatching($fetchData_result ,$name)){ 

                if (mysqli_query($conn, $sql)){
                    echo '<div class="alert alert-success" role="alert">
                        New record created successfully
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                        </div>';
                  } else {
                    echo "<div class='alert alert-danger'role='alert'>Error: " . $sql . "<br>" . mysqli_error($conn)."
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                    </div>";
                  }

            }else{ 
                echo "<div class='alert alert-danger'role='alert'>
                the name is already existed 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
                </div>"; 
            }
       
    }else { 
        if (mysqli_query($conn, $sql)){
            echo '
            <div class="container">
            <div class="alert alert-success" role="alert">
                New record created successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                </div>';
          } else {
            echo "<div class='alert alert-danger'role='alert'>Error: " . $sql . "<br>" . mysqli_error($conn)."
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
            </div>
            </div>
            ";
          }

    }
   
}
// funcation fectch data  table sub_category
function fetchData($subAdmin_id){
    global $conn;
    $sql = "SELECT * FROM sub_category WHERE subAdmin_id=$subAdmin_id ";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0) {
      return $data;
    }

}




function isMatching( $fetchData_result ,$name){ 
$bol =false  ;  

    if($fetchData_result->num_rows > 0 ){ 
        while($fetchData_row = $fetchData_result->fetch_assoc()){ 
         if ($fetchData_row['name']==$name){ 
             $bol=true;
              
         }
        
        }
}
return $bol ;
}


function isEmpty($fetchData_result){ 
    $empty=true;
    if($fetchData_result->num_rows > 0 ){ 
    $empty=false;
    }
    return $empty ;
}
function updataData($name,$id){
    global $conn;
    $sql = "UPDATE sub_category SET name='$name' WHERE sub_category.id='$id' ";

    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
}
function deleteData($id){
    global $conn;
    $sql = "DELETE FROM sub_category WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
}
function insertImageandVideo($img,$video,$id){
  global $conn;
    $sql = "INSERT INTO content (images,video,subCate_id)
           VALUES ('$img','$video',$id)";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

// function Posts 
function getSubCategory($con ,$id, $category_name ){ 
  $subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' and name='$category_name' " ;
$subCate_result =$con->query($subCate_sql); 
$subCate_row = $subCate_result->fetch_assoc(); 
$subCate_id = $subCate_row['id']; 
 
return getPost($con,$subCate_id);
}

function getPost($con,$subCate_id ){ 
 
  $content_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
  $content_result = $con->query($content_sql); 
 
  return $content_result;
}

function updatePost($con, $image , $image_id){
  $sql = "UPDATE content SET images='$image' WHERE id = '$image_id' ";
  $result = $con->query($sql); 
  echo "<pre>"; print_r($result); echo "</pre>"; 
  
  
}
function updatePostVideo($con, $video , $video_id){
  $sql = "UPDATE content SET video='$video_id' WHERE id = '$video_id' ";
  $result = $con->query($sql); 
  echo "<pre>"; print_r($result); echo "</pre>"; 
  
  
}


function DeletePostImage($con, $image_id){ 
$sql = "DELETE FROM content WHERE id='$image_id'"; 
$result= $con->query($sql); 
echo "deleted successfully" ;
}
function DeletePostVideo($con, $video_id){ 
  $sql = "DELETE FROM content WHERE id='$video_id'"; 
  $result= $con->query($sql); 
  echo "deleted successfully" ;
  }




function fetechDatalast ($id){
  global $conn;
  $sql ="SELECT sub_category.id , name , images , video
  FROM sub_category
  INNER JOIN content ON sub_category.id=content.subCate_id 
  WHERE subAdmin_id='$id'
  ORDER BY content.id DESC
   LIMIT 7 " ; 

 
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if (mysqli_num_rows($result) > 0) {
    return $data;
  }
  

}


function fetchData_subAdmin($subAdmin_id){
  global $conn;
  $sql = "SELECT * FROM sub_admin WHERE id=$subAdmin_id";
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

function update_info_profile($username,$email,$pass,$id,$phon,$fas,$inast){
  global $conn;
  $sql = "UPDATE sub_admin SET username='$username',email='$email',password='$pass',phone='$phon',facebook='$fas',instagram='$inast' WHERE id='$id'";

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
  $sql = "UPDATE sub_admin SET profile_pic='$profile_pic' WHERE id='$id'";

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

function getImageSubAdmin($con,$id) {
  $sql ="SELECT profile_pic  FROM  sub_admin WHERE id='$id'  ";
  $result = $con->query($sql);  
  $row = $result->fetch_assoc(); 
  return $row ;
 }
?>