<?php
include "config.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT id , profile_pic, username FROM sub_admin WHERE username LIKE '%$Name%' LIMIT 5";
//Query execution
   $ExecQuery = MySQLi_query($conn, $Query);
//Creating unordered list to display result.
   echo '
   <ul class="list-group list-group-flush position-absolute">
   ';
   
   //Fetching result from database.
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
         


   <li  class="list-group-item" onclick='fill("<?php echo $Result["username"]; ?>") '>
   <div class="container" >
  <a  href="subAdmin_profile.php?id=<?= $Result['id']; ?>" class="d-flex">
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
   <?php  
   if(isset($Result['profile_pic'])){
  echo' <div class="w-25 pr-2">
      <img class="w-100 rounded-circle " src="../sub-admin/images/' .$Result['profile_pic'].'" alt="prof">
   </div>';
}  ?>
      <div><?= $Result['username']; ?></div>
   </li></a></div>
 

 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. --><?php }}?>
</ul>