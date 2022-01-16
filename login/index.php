<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	
    
</head>
<body>
<?php 

// sgin in users 
$con=mysqli_connect('localhost','root','','freelancer');
if(isset($_POST['login'])){
	$email=$_POST['Email'];
	$pass=$_POST['Password'];
	$hash_pass =sha1($pass);
	$query="select * from users where email='$email' && password='$hash_pass'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$total=mysqli_num_rows($result);
	
	if($total==1)
	{
	$_SESSION['id1'] =  $row['id'];
	$_SESSION['username'] =  $row['username']; 
		header("location:../user_interface/index.php");
		
	}
	else 
	{
		echo '
<div class="alert alert-warning alert-dismissible fade show" role="alert w-100">
  <strong>login failed!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}
	}
?>

<?php

if(isset($_POST['username']) && isset($_POST['Email']) && isset($_POST['Password']))
{
 $user= $_POST['username'] ;
 $email= $_POST['Email'] ;
 $pass= $_POST['Password'];
 $hash_pass = sha1($pass);
  
    $s="select * FROM users WHERE email ='$email'";
    $result = mysqli_query($con,$s);
    $num=mysqli_num_rows ($result) ;
    if( $num==1)
    {
      myFunction1($num);
    }
    else {
    	$reg="INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$user','$email','$hash_pass')";
    	mysqli_query($con,$reg); 
    	myFunction1($num);
    }
}
?>


<?php 
if(isset($_POST['login_as_admin'])){
	$email=$_POST['Email'];
	$pass=$_POST['Password'];
	$hash_pass=sha1($pass);
	$query="select * from sub_admin where email='$email' && password='$hash_pass' ";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$total=mysqli_num_rows($result);
	
	if($total==1)
	{
		if ($row["type"]==0) {
			$_SESSION['id2']=$row['id'];
			$_SESSION['username_subAdmin']=$row['username'];
			header("location:../sub-admin/index.php");
		}
		else if ($row["type"]==1){
			$_SESSION['id3']=$row['id'];
			$_SESSION['username_Admin']=$row['username'];
			header("location:../admin/index/index.php");
		}
		
		
	}
	else 
	{
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert w-100">
		<strong>login failed!</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	}
	}
?>

<?php

if(isset($_POST['signup_as_admin']))
{
 $user= $_POST['username'] ;
 $email= $_POST['Email'] ;
 $pass= $_POST['Password'];
 $cate_id = $_POST['selectCategory'];
 $hash_pass = sha1($pass);
  
    $s="SELECT * FROM sub_admin WHERE email ='$email'";
    $result = mysqli_query($con,$s);
    $num=mysqli_num_rows ($result) ;
    if( $num==1)
    {
      myFunction1($num);
    }
    else {
    	$reg="INSERT INTO `sub_admin`( `username`, `email`, `password`,`cate_id`) VALUES ('$user','$email','$hash_pass','$cate_id')";
    	mysqli_query($con,$reg); 
    	myFunction1($num);
    }
}
?>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post">
			<h3>Create Account</h3>
			<small>or use your email for registration</small>
			<input type="text" name="username" placeholder="username" required/>
			<input type="email" name="Email" placeholder="example@gmail.com" required pattern=".+@gmail\.com"  />
			<input type="password" name="Password" placeholder="Password"  id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
            <input type="password" placeholder="confirm Password" id="confirm_password" required />
			<small>Please choose the department you want to register in</small>
			 <select name="selectCategory" class="selectCategory">
				 <?php
				     $s="SELECT * FROM  category";
					 $result = mysqli_query($con,$s);
						
						  foreach($row =mysqli_fetch_all($result, MYSQLI_ASSOC) as $key =>$val){
							  
							echo' <option value="'.$val['id'].'">'.$val['name'].'</option>';
						 
					
					 }
				 
				 ?>
			 </select>
			<button>as User</button> 
			<br>
			<button name="signup_as_admin">as Talented</button>
					
		</form>
	</div>

<!-- sign-in  -->

	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" name="Email" placeholder="Email" required />
			<input type="password" name="Password" placeholder="Password" required />
			<a href="#">Forgot your password?</a>
			<button name="login" >as User</button>
			<br>
			<button name="login_as_admin">as Talented</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

                      <?php
                          function myFunction1($num) {
                          if($num==1)
                          {
                           echo" <script>  confirm('username already taken') </script>";
                          }
                          else
                          {
                              echo" <script>  confirm('registeration successful') </script>";
                              header("location:index.php"); 

                          }
                          }
                     ?>

<script>
	var password = document.getElementById("password")
	  , confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	</script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="javas.js"></script>

</body>
</html>