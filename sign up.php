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
        <link rel="stylesheet" href="css/sign up.css"> 
        <style>
            .check
            {
                background: none;
            }
            .check input{
                
                    margin: 0;
                    border: none;
                    padding: 0;
                    font-size: 16px;
                    border-radius: 0;
                    display: inline-block;
                    height: 20px;
                    outline: none;
                    background: none;
            }
        </style>
    </head>


    <body>
<?php
//if already logged in

$message=$margin="";
$display="display:block;";
$logged="";
if(isset($_SESSION['userID'])){
    $display="display:none;";
    $message="you're already signed in <br> if you wanna sign up with another Email you've to log out first";
    $margin="364px";
$logged="تسجيل خروج";
} else {
    $logged="تسجيل دخول";
}

?>
         
        
        <!--start nav-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar fixed-top ">
             
          

          <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            
             <ul class="navbar-nav ">
                 
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
                  <a class="nav-link" href="logout.php"><?php echo $logged;?> <span class="sr-only">(current)</span></a>
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
        <!--end nav-->
        
        <?php
//form validation
$name = $email = $password=$password_confirm =$mobile =$address=$gender='';
        $nameErr=$emailErr=$passwordErr=$confirmErr=$mobileErr=$addressErr=$genderErr=$passmatched="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (! empty($_POST["name"])) {
    $name = test_input($_POST["name"]);
  }else{$nameErr="Name is required";}

  if ( ! empty($_POST["email"])) {
    $email = test_input($_POST["email"]);
  }else{$emailErr="Email is required";}
  
  if ( !empty($_POST["password"])) {
    $password = test_input($_POST["password"]); 
  }else{$passwordErr="Password is required";}
  
    if ( !empty($_POST["password_confirm"])) {
    $password_confirm = test_input($_POST["password_confirm"]);  
  }else {$confirmErr="please Confirm your password";} //watch
  
  
  if (!empty($_POST["mobile"])) {
    $mobile = test_input($_POST["mobile"]);
  }else{$mobileErr="Mobile is required";} 

    if (!empty($_POST["address"])) {
    $address = test_input($_POST["address"]);
  }else{$addressErr="Address is required";} 


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php //inserting user data into database
$existErr='' ;
$done="";$vuErr="";
 $queryOK=FALSE;
$background="#12D12C";
$opacity="0";
    if(isset($_POST['submit'])){
                    //state
         $state="";
            if(isset($_POST['vendor'])){$state="vendor";}
            if(isset ($_POST['customer'])){$state='customer';}
            if(isset ($_POST['customer']) && isset($_POST['vendor'])){$state='customer and vendor';}
     
        //checking if the user email is used && if pass confirmatin is not matched
        $q="SELECT `e-mail` FROM `users` WHERE `e-mail`='$email'";
        $res=mysqli_query($connect,$q);
        if(mysqli_num_rows($res)>0){$existErr= "<p style='color:orange;font-weight:bold;'> this Email is already exists </p>";}
         else if($password != $password_confirm)  {$confirmErr="passwords are not matched.. please try again!" ;}

        //inserting..
         elseif(!empty($name) && !empty($password) &&!empty($password_confirm) &&
           !empty($address) &&!empty($gender) &&!empty($email) &&!empty($mobile)){
            if(isset ($_POST['customer']) || isset ($_POST['vendor'])){
            $q="INSERT INTO `users` (name,address,phone,gender,`e-mail`,password,state) VALUES ('$name','$address', $mobile ,'$gender','$email','$password','$state')";
            $res=mysqli_query($connect,$q); 
            if($res){
                $done="done you've just signed up";
                $opacity="0.8";
                $queryOK=TRUE;
            } else{                echo 'first query ERr';}
            } else {
                $vuErr="<span style='color:red;'>choose customer or vandor or both please..!</span>";
            }
        }
    }

?>
        <h2 style="text-align:center;color: red;margin-top: 200px"><?php echo $message;?></h2>
        <div class="main_div" style="<?php echo $display;?>">
              <form class="main_form"  name="form"   method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="head_form">تسجيل الدخول</div>
                <div>
                     
                    <input type="text" id="name" name="name" placeholder="input your Name" value="<?php echo $name;?>">
                    <div id="nameerror" class="text-error"></div>
                    <span style="color:red;"><?php// echo $nameErr?></span>
                </div>
                <div>

                    <input type="email" name="email" placeholder="input your email" value="<?php echo $email;?>">
                    <div id="email_error" class="text-error"></div>
                    <span style="color:red;"><?php echo $existErr?></span>
                </div>
                
                <div class="pass">
                    <input type="password" name="password" id="pass" placeholder="input your password">
                    <span style="color:red;"><?php //echo $passwordErr?></span>
                </div>
                <div>
                    
                    <input type="password" name="password_confirm" id="passConf" placeholder="password confirmation">
                    <div id="password_error" class="text-error"></div>
                    <span style="color:red;" id="ms"><?php echo $confirmErr?></span>

                </div>
                 <div>
                  
                    <input type="tel" name="mobile" placeholder="input your mobile phone" value="<?php echo $mobile ;?>">
                    <div id="mobile_error" class="text-error"></div>
                     <span style="color:red;"><?php //echo $mobileErr?></span>
                </div>
                <div>
                     
                    <input type="text" name="address" placeholder="input your Address" value="<?php echo $address ;?>">
                    <div id="address_error" class="text-error"></div>
                    <span style="color:red;"><?php //echo $addressErr?></span>
                </div>
                <div class="gen">
                    <label>male</label>
                    <input type="radio" name="gender" value="ذكر"/>
                         <label>female</label>
                         <input type="radio" name="gender" value="انثى"/>
                    <span style="color:red;"><?php  $genderErr?></span>
                </div >
                <div class="check row">
                    <div class="offset-4"></div>
                    <label class="col-4 ">Vendor</label>
                    <input class="col-2" type="checkbox" name="vendor" value="vendor"> 
                </div>
                
                <div  class="check row">
                    <div class="offset-4"></div>
                    <label class="col-4 ">customer</label>
                    <input class="col-2" type="checkbox" name="customer" value="customer"> 
                </div>
                <div class="send"> 
                    <input type="submit" value="send" name='submit'>
                </div>
                <div><?php echo $vuErr ;?></div><!-- option Err-->
                
                <div class="Malert" style="opacity:<?php echo $opacity;?>;background: <?php echo $background;?>">
						<?php// echo $registerErr;?>
						<?php echo $done?>
	</div>
             </form>
        
        </div>

<?php
    //copying data from users table to customers' and vendors' 
    
if($queryOK){
    $q="SELECT state FROM `users` WHERE `e-mail`='$email'";
    $res= mysqli_query($connect, $q);if(!$res){    echo 'Error in query';}
 else {
    $row= mysqli_fetch_assoc($res);
    $ss=$row['state'];
    $email=$_POST['email'];
    echo "$email";
    if($ss==='customer'){
        $q="INSERT INTO `users` 
                SELECT userID,name
                FROM `users`
                WHERE `e-mail`= '$email' ";
        $res= mysqli_query($connect, $q); if(!$res){     echo 'qqq Err';}
        
    }elseif ($ss==='vendor') {
                $q="INSERT INTO `dbo.vendor` 
                SELECT userID,name
                FROM `users`
                WHERE `e-mail`= '$email' ";
        $res= mysqli_query($connect, $q); if(!$res){     echo 'qqq Err';}
            
        }elseif ($ss==='customer and vendor') {
                    $q="INSERT INTO `users` 
                SELECT userID,name
                FROM `users`
                WHERE `e-mail`= '$email' ";
                 $res= mysqli_query($connect, $q); if(!$res){     echo 'qqq Err';}
                 
                $q= "INSERT INTO `dbo.vendor` 
                SELECT userID,name
                FROM `users`
                WHERE `e-mail`= '$email' ";
        $res= mysqli_query($connect, $q); if(!$res){     echo 'qqq Err';}
        }
    
    
}
    
}
?>
        
        
        <!--start footer-->
       
        
        
        
        <footer style="margin-top: <?php echo $margin;?>">
           
            CopyRight © All right reserved


        </footer>
<?php

//closing connection
        mysqli_close($connect);
?>
        
        <!--end footer-->
        
        <script src="JS/jquery-3.3.1.min.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/signUp.js"></script>

    </body>
</html>


    