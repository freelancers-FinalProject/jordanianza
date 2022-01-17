<header>
    <link rel="stylesheet" href="../assets/css/stylec.css">
</header>
<?php 
include("../template/header-side.php");
include("../config.php");
?>
<div class="container">
                    <div class="table-title">
                    <h4>Users</h4>

                    <div class="row">
                    <div class="col-sm-12">
                    <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-striped table-hover">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Email</th>";
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
                                        echo "<td>" ; ?> <img src="../../user_interface/images/<?php echo $row["profile_pic"];?>" height="100" width ="100"> <?php echo "</td>";
                                        echo "<td>";
                                          
                                            echo '<a href="deleteuser.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
