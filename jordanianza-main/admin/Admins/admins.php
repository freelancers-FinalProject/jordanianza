<header>
<link rel="stylesheet" href="../assets/css/stylec.css">
</header>
<?php 
include("../template/header-side.php");
include("../config.php");
?>
<div class="container">
                    <div class="table-title">
                    <h4>Admins</h4>
                    <div class="row">
                    <div class="col-sm-12">
                    <?php
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM sub_admin";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-striped table-hover">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>phone</th>";
                                        echo "<th>image</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" ; ?> <img src="../../sub-admin/images/<?php echo $row["profile_pic"];?>" height="100" width ="100"> <?php echo "</td>";
                                        echo "<td>";
                                        echo '<a href="../Admins/read.php?id='. $row['id'] .'&email='. $row['email'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';

                                        if ($row['type']==1) {
                                            echo '<a href="../Admins/makeAdmin.php?id='. $row['id'] .'&type='. $row['type'] .'" class="mr-3" title="Remove Admin" data-toggle="tooltip"><span class="fa fa-check "></span></a>'; 
                                         }
                                         else {
                                             echo '<a href="../Admins/makeAdmin.php?id='. $row['id'] .'" class="mr-3" title="Make Admin" data-toggle="tooltip"><span class="fa fa-user "></span></a>'; 
                                         }

                                        echo '<a href="../Admins/deletesub.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                    </div>
                  </div>
                  </div>
                  </div>
