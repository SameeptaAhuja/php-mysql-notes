<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Abhishek</title>
	<style>
		/**{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}*/
		input[type=button], input[type=reset], input[type=submit] {
    background-color: #8842d5;
    border: none;
    color: white;
     text-decoration: none;
    margin: 5px 4px;
    cursor: pointer;  
    font-size: 15px;
    border-radius: 5px;
}
		input,select,textarea{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 300px;
			height: 35px;
			box-sizing: border-box;

		}
		.submit{
			width: 220px;
		}
		.left{
			float: left;
			clear: below;
			height: 500px;
			width: 280px;
			margin-top: 10px;
			border-radius: 25px;
		}
		.head{
			height: 130px;
			width: 100%;
			border-radius: 25px;
		}
		/*.clearfix::after{
			content: " ";
			clear: both;
			display: table;
		}*/
			
	}
	.buttonStyle{
		border:none;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		padding: 12px 28px;
		width: 100px;
		height: 60px;
		border-radius: 10px;
	}
	.form{
		margin-top: 12px;
		height: 460px;
		width: 400px;
		float: right;
		border-radius: 25px;
	}
	#mydiv1{

	}
	#mydiv2{

	}
	div{
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	}
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		
	</style>
</head>

<body style=" font-family: Arial;">
	<div class="head" style="background-color: #20417A">
		<h1 style="padding:20px; padding-bottom: 0px; margin-bottom: 0px; font-size: 275%; text-align: middle; color: white;">Coding Club</h1>
		<h1 style="padding-left:20px; padding-top: 0px; margin-top: 0px; font-size: 275%; color: white;">IITG</h1>
	</div>
	<div class="left" style="background-color: #2069e0; text-align: center;">
		<button onclick="about()" class="buttonStyle" style="margin-top: 100px; height: 60px; width: 160px; border-radius: 10px;" >About us</button><br>
		<button onclick="res()" class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Register</button><br>
		<button onclick="login()" class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Login</button>
	</div>


	<div style="background-color: white; display: none;" class="form" id="mydiv1">
		<h1 style="text-align: center;">Register</h1>
		<br>
		<form  action="" method="post" style="text-align: center;">
	<input class="w3-input w3-border w3-round" type="text" name="fname" id="fname" placeholder="First Name.." required="required" 
 pattern="\S+$" title="No Spaces allowed"><br>
	<input type="text" name="lname" placeholder="Last Name.." required="required"><br> 
	<input type="email" name="email" placeholder="Email-id.." required="required"><br>
	<input type="Password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="must content atleast 1 upper & 1 lower character and 1 number & 1 special character, min length : 8" name="password" placeholder="Password.." required="required"><br>
	<input type='text' id="matchText" name="confirm" placeholder="Confirm Password.." required="required" ><br>
	<input style="width: 20px;height: 14px;" type="radio"  name="gender" value="male" required="required">
	<span for="gender" style="font-size: 15px;">Male</span>
	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	<input style="width: 20px;height: 14px;" type="radio"  name="gender" value="female" required="required">

	<span for="gender" style="font-size: 15px;">Female</span>
	<br>
	<br>
	<input type="submit" name= "submit" value = "Register" required="required" style="background-color: #008CBA; " class="submit"><br>

	</form>
	<br>
	<a href="" style="float: right; margin-right: 10px;">forget Password?</a>
	</div>


	<div style="background-color: white; height: 400px;" class="form" id="mydiv2">
		<h1 style="text-align: center;">Login</h1>
		<br>
		<form action="" method="post" style="text-align: center;">
	<input type="email" name="loginEmail" placeholder="Email-id.." required="required"><br>
	<input type="password" id='input2' name="loginPass" placeholder="Password.." required="required"><br>
	<br>
	<br>
	<input type="submit" name= "Login" value = "Login" required="required" style="background-color: #008CBA; " class="submit"><br>

	</form>
	<br>
	<a href="" style="float: right; margin-right: 10px;">forget Password?</a>
	</div>


	<div id="mydiv3" style="display: none;"><p style="font-size: 150%; text-align: center;  padding-left: 400px; padding-right: 100px; padding-top: 50px; padding-bottom: 50px;">Welcome to students coding club here we will learn about new things in web development. You know web development is future of coding, as you know people don't like to install app for a certain work, that why demant of web develope keeps increasing
........</p></div>
	<script>
	var x = document.getElementById("mydiv2");
	var y = document.getElementById("mydiv1");
	var z = document.getElementById("mydiv3");
	function login(){
		if(x.style.display=='none'){
			x.style.display="block";
			y.style.display = "none";
			z.style.display = "none";
		}

	}
	function res(){
		
		if(y.style.display=='none'){
			y.style.display="block";
			x.style.display = "none";
			z.style.display = "none";
		}else{
			y.style.display = "none";
		}
		
	}
	function about(){
		if(z.style.display=='none'){
			z.style.display="block";
			x.style.display = "none";
			y.style.display = "none";
		}else{
			z.style.display = "none";
		}
	}

</script>
</body>
</html>
<?php

if( isset($_POST['submit']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) &&isset($_POST['gender']) 
	&&isset($_POST['password'])) {
	$fn=$_POST['fname'];
	$ln = $_POST['lname'];
	$email = strtolower($_POST['email']);
	$gender = $_POST['gender'];
	if($_POST['confirm']!=$_POST['password']){
		exit();
	}
	$pass = md5($_POST['password']);
	$fn = str_replace(' ', '_', $fn);
	$ln = str_replace(' ', '_', $ln);

	$fp = fopen("members.txt", "r") or  exit('<p>Error in opening file</p>');
	while (!feof($fp)) {
	fscanf($fp,"%s %s %s %s",$s,$c,$g,$a);
	$checkEmail = substr($g,0,strlen($g)-1);
	
	if($email==$checkEmail){
		fclose($fp);
		// exit('Email id already exists');
		myAlert('Email id already exists');
		exit();
	}
	}
	$fp2 = fopen("members.txt", "a") or  exit('<p>Error in opening file</p>');
	$fp3 = fopen("password.txt", "a") or  exit('<p>Error in opening file</p>');
	 fwrite($fp2, "$fn, $ln, $email, $gender\n");
	 fwrite($fp3, "$email, $pass\n");
	fclose($fp2);
	fclose($fp3);
	// echo 'User successfully register';
	myAlert('User successfully register');
	
}
?>
 <?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}
?>

<?php
if(isset($_POST['loginEmail']) && isset($_POST['loginPass']) && isset($_POST['Login'])){
	$em = $_POST['loginEmail'];
	$ps = md5($_POST['loginPass']);
	$fp4 = fopen("password.txt", "r") or  exit('<p>Error in opening file</p>');
	while (!feof($fp4)) {
	fscanf($fp4,"%s %s",$s,$c);
	$checkEmail = substr($s,0,strlen($s)-1);
	$checkPass = $c;
	
	if($em==$checkEmail && $ps ==$checkPass){
		fclose($fp4);
		myAlert('login Successfully');
		exit();
	}
	if($em==$checkEmail && $ps !=$checkPass){
		fclose($fp4);
		myAlert('Password is Incorrect');

		exit();
	}

	}
	fclose($fp4);
		myAlert("$em is wrong or User is not Registered");
		exit();

}
?>
<script>
	var password = document.getElementById("pass"), confirm_password = document.getElementById("matchText");

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
