<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
	<title>Writing data</title>
	<style>
		*{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}
		input,select{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 300px;
			height: 35px;
			box-sizing: border-box;
		}
		.left{
			float: left;
			clear: below;
			height: 530px;
			width: 20%;
		}
		.head{
			height: 120px;
			width: 100%;
		}
		/*.clearfix::after{
			content: " ";
			clear: both;
			display: table;
		}*/
		#mydiv1{
			width: auto;
			
		text-align: center;
	}
	#mydiv2{
			width: auto;
			
		text-align: center;
			
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
		width: 160px;
		height: 60px;
	}
	#mydiv1{

	}
	#mydiv2{}

		
	</style>
</head>
<body style="background-color: aqua">

<!-- <h1 style="text-align: center; font-size: 250%; background-color:green;">File Writing</h1> -->
<div class="head" style="background-color: green; color: white; font-size: 225%; text-align: center;
padding-top: 35px;">
	Wecome to IITG Students Coding Club
</div>
<div class="left" style="background-color: red; text-align: center;" >
	<button onclick="show()" class="buttonStyle" style="margin-top: 100px;">
		About us
	</button>	
	<br>
	<button onclick="myFun()" class="buttonStyle" style="margin-top: 30px;">
		Register
	</button>
</div>
<br>
<div class="container" id="mydiv1" style="display:none;">
	<br>
	<br>
<form action="" method="post" style="text-align: center;" onsubmit="call()">
	<label style="font-size: 150%;">First Name</label><br><input type="text" name="fname" id="fname" placeholder="first name.." required="required" 
 pattern="\S+$" title="No Spaces allowed"><br>
	<br>
	<label style="font-size: 150%">Last Name</label><br><input type="text" name="lname" placeholder="last name.." required="required"
	><br> 
	<label style="font-size: 150%">Email id </label><br><input type="email" name="email" placeholder="email.." required="required"><br>
	<br>
	<label style="font-size: 150%">Gender </label><br>
	<br>
	<input style="width: 20px;height: 14px;" type="radio"  name="gender" value="male" required="required">
	<span for="gender">Male</span>
	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	<input style="width: 20px;height: 14px;" type="radio"  name="gender" value="female" required="required">

	<span for="gender">Female</span>
	<!-- <label style="font-size: 150%">Grade : </label><br><input type="text" name="grade" placeholder="grades.." required="required"> --><br>
	<br>
	<br>
	<input type= "submit" name= "submit" value = "Register" required="required" style="background-color: #008CBA"><br>

	</form>
	</div>
<div id="mydiv2"><p style="font-size: 150%; text-align: center;  padding-left: 400px; padding-right: 100px; padding-top: 110px">Welcome to students coding club here we will learn about new things in web development. You know web development is future of coding, as you know people don't like to install app for a certain work, that why demant of web develope keeps increasing
........</p></div>
<script>
	var x = document.getElementById("mydiv2");
	var y = document.getElementById("mydiv1");
	function show(){
		if(x.style.display=='none'){
			x.style.display="block";
			y.style.display = "none";
		}

	}
	function myFun(){
		
		if(y.style.display=='none'){
			y.style.display="block";
			x.style.display = "none";
		}else{
			y.style.display = "none";
		}
		
	}

</script>
</body>
</html>

<?php

if( isset($_POST['submit']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) &&isset($_POST['gender'])){
	$fn=$_POST['fname'];
	$ln = $_POST['lname'];
	$email =$_POST['email'];
	$gender = $_POST['gender'];
	valid($_POST['fname']);
	$fn = str_replace(' ', '_', $fn);
	$ln = str_replace(' ', '_', $ln);

	$fp = fopen("data.txt", "r") or  exit('<p>Error in opening file</p>');
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
	$fp2 = fopen("data.txt", "a") or  exit('<p>Error in opening file</p>');
	 fwrite($fp2, "$fn, $ln, $email, $gender\n");
	fclose($fp2);
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
function valid($line){
	if(strpos($line," ")){
		myAlert("space not allowed");
		exit();
	}
}
?>

