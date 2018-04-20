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
            {background:#EEE;}
            input:focus{outline: none;}
            .form-control:focus{box-shadow: none;}
            form{width: 300px; margin: 50px auto;}   
            input{margin-bottom: 20px;}
            .row h1{color: #FFF; margin: 10px auto;}
            p{color: #fbffc9;}
            .message{text-align: center;color:red;width: 300px;margin: 100px auto 0px auto;}
        </style>
        <!-- [if lt IE 9]>
            <script scr="html5shiv.min.js"></script>
        <![end if]-->
    </head>
    
    <body>

<?php
$nameErr=$phoneErr="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	
if ( ! empty($_POST["email"]) && isset($_POST["email"])) {
$email= test_input($_POST["email"]);
}else{$phoneErr="please Enter your name";}

if ( !empty($_POST["phone"])&& isset($_POST["phone"])) {
$phone = test_input($_POST["phone"]);
}else{$addressErr="please Enter your phone number";}

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name_check=false;
$phone_check=false;
$Err="";
if(isset($_POST['submit']) ){
    if(! empty($_POST["email"]) && !empty($_POST["phone"]))
    {
	
	//checking username
	$q="SELECT `e-mail` FROM `users` WHERE `e-mail`='$email'";
	$res=mysqli_query($connect,$q); if(!$res){echo "error in query 1";}
	if(mysqli_num_rows($res)>0){$name_check=true;} 
	
		//checking password
	$q="SELECT `phone` FROM `users` WHERE phone='$phone'";
	$res=mysqli_query($connect,$q); if(!$res){echo "error in query 2";}
	if(mysqli_num_rows($res)>0){$phone_check=true;}
	
	if($name_check ===true && $phone_check===true){
		

		$q="SELECT userID FROM `users` WHERE `e-mail` = '$email' ";
		$res=mysqli_query($connect,$q);
		$row=mysqli_fetch_assoc($res);
		$_SESSION['userID']=$row['userID'];


	}else $Err="Incorrect email or phone; please try again";
	}
}
        
        if(isset($_SESSION['userID'])){
header("LOCATION: index.php");
}
?>
        
   
        
                <div class="row text-center">
                    <h1><span><span style="color:red">EGY</span><span style="color:#FFF">PT</span><span style="color:#000">IAN</span></span>
                        <br>HANDMADES </h1>
                </div>
        
        <div class="message">
            if you forgot your password..please enter your phone number instead of it
        </div>
                <form class="form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        Email:<input type="email" class="form-control" placeholder="E-mail" name="email">
                        phone:<input  type="text" class="form-control" placeholder="enter your phone number"  name='phone'>
                        <input  type="submit" class="btn btn-danger" name='submit' value="sign In">
                    </div>
	<div style="color: #ffb100;font-size: 20px;text-align: center"><?php echo $Err;?></div>
                </form>
                
        
        <?php
            mysqli_close($connect);
        ?>
    </body>
</html>
