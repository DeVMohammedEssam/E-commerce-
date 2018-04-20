<?php 
//making connection with student DB
$host='localhost';
$user='root';
$password='1112';
$database='ecommerce';
    $connect= mysqli_connect($host, $user, $password, $database);
            if(mysqli_connect_errno()){
            die('connection Error! ' . mysqli_connect_error());
            
            }else {}
            mysqli_query($connect,"SET NAMES 'utf8' ");//to read and write Arabic data
?>

<?php
//starting a session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="this is my description for my life for evry things ">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.css"> 
        <link rel="stylesheet" href="css/style.css">
        <style>
            body
            {background-image: url('img/wood_background.jpg');}
            input:focus{outline: none;}
            .form-control:focus{box-shadow: none;}
            form{width: 300px; margin: 200px auto;}   
            input{margin-bottom: 20px;}
            .row h1{color: #FFF; margin: 10px auto;}
            a{color: #fbffc9;}
        </style>
        <!-- [if lt IE 9]>
            <script scr="html5shiv.min.js"></script>
        <![end if]-->
    </head>
    
    <body>
       <!--start nav-->
       <nav style="opacity:0.7 " class="navbar navbar-expand-lg navbar-dark bg-dark navbar fixed-top  ">
             
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-            controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

          <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent" >
            
             <ul class="navbar-nav justify-content-center ">
                 
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  المنتجات
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="glasses.php">زجاج</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="wooliness.php">منسوجات</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="pottery.php">فخار</a>
                </div>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="sign up.php">الاشتراك <span class="sr-only">(current)</span></a>
              </li>
                
              <li class="nav-item active">
                <a class="nav-link" href="contact.php">اتصل بنا</a>
              </li>
                
                <li class="nav-item active">
                <a class="nav-link" href="about.php">حول</a>
              </li>
                
                
            </ul>
             <a class="navbar-brand" href="index.php">الرئيسية</a>
              
           </div>

        </nav>
        <!--end nav-->

<?php
$nameErr=$passwordErr="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	
if ( ! empty($_POST["email"]) && isset($_POST["email"])) {
$email= test_input($_POST["email"]);
}else{$passwordErr="please Enter your name";}

if ( !empty($_POST["password"])&& isset($_POST["password"])) {
$password = test_input($_POST["password"]);
}else{$passwordErr="please Enter your password";}

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name_check=false;
$pass_check=false;
$Err="";
if(isset($_POST['submit']) ){
    if(! empty($_POST["email"]) && !empty($_POST["password"]))
    {
	
	//checking username
	$q="SELECT `e-mail` FROM `users` WHERE `e-mail`='$email'";
	$res=mysqli_query($connect,$q); if(!$res){echo "error in query 1";}
	if(mysqli_num_rows($res)>0){$name_check=true;} 
	
		//checking password
	$q="SELECT `password` FROM `users` WHERE password='$password'";
	$res=mysqli_query($connect,$q); if(!$res){echo "error in query 2";}
	if(mysqli_num_rows($res)>0){$pass_check=true;}
	
	if($name_check ===true && $pass_check===true){
		
				echo "<h1 style='color:#FFF'>welcome<h1>";

		$q="SELECT userID,state FROM `users` WHERE `e-mail` = '$email' ";
		$res=mysqli_query($connect,$q);
		$row=mysqli_fetch_assoc($res);
		$_SESSION['userID']=$row['userID'];
                                      $_SESSION['state']=$row['state'];


	}else $Err="Incorrect email or password; please try again or reset your password !";
	}
}
        
        if(isset($_SESSION['userID'])){
header("LOCATION: index.php",TRUE);
}
?>
        
   
        
                <div class="row text-center">
                    <h1><span><span style="color:red">EGY</span><span style="color:#FFF">PT</span><span style="color:#000">IAN</span></span>
                        <br>HANDMADES </h1>
                </div>
                <form class="form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-mail" name="email">
                        <input  type="password" class="form-control" placeholder="password"  name='password'>
                        <input  type="submit" class="btn btn-danger" name='submit' value="sign In">
                    </div>
                    <a href="forgetpassword.php">forget password?</a>
	<div style="color: #ffb100;font-size: 20px"><?php echo $Err;?></div>
                </form>
                
        
        
<?php
//closing connection
mysqli_close($connect);
?>
        
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
	</body>