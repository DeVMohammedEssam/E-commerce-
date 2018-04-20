<?php include('incs/templates/DBconnection.php')?>
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description"content="this is my description for my life for evry things ">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.css"> 
        <link rel="stylesheet" href="css/contact.css">
		<style>
		*{direction: ltr;}
		.Malert{
			width: 300px;
			height: 75px;
			margin: auto;padding: 12px; text-align: center;
			border: 1px solid #FFF;border-radius:10px;
			background: #12D12C;
			color: #FFF;
		}
		</style>
        <script scr="file.js"></script>
        <!-- [if lt IE 9]>
            <script scr="html5shiv.min.js"></script>
        <![end if]-->
    </head>
    <body>
<?php
$searchNon=TRUE;
include('incs/templates/navbar.php');

?>
        

        <!--start form-->
        
    <div class="contenter">
        <div class="sidebar">
            <div>
                <h2>Contact Info</h2>
                <ul class="side">
                    <li class="address">
                        <p>
                            <span class="home">
                                Manes Winchester <br>Family Law Firm
                            </span><br>the address city, state 1111
                        </p>
                    </li>
                    <li>
                        <p class="phone">
                                Phone: (+20) 000 222 999
                        </p>
                    </li>
                    <li>
                        <p class="fax">
                                Fax: (+20) 000 222 988
                        </p>
                    </li>
                    <li>
                        <p class="mail">
                                Email: info@freewebsitetemplates.com
                        </p>
                    </li>
                </ul>
            </div>
        </div>
<?php

$Fname=$Lname=$email=$message="";
$FnameErr=$emailErr=$messageErr="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	
if (! empty($_POST["Fname"])) {
$Fname = test_input($_POST["Fname"]);
}else{$FnameErr="First Name is required";}

if ( !empty($_POST["Lname"])) {
$Lname = test_input($_POST["Lname"]); 
}

if ( ! empty($_POST["email"])) {
$email = test_input($_POST["email"]);
}else{$emailErr="Email is required";}



if ( !empty($_POST["message"])) {
$message = test_input($_POST["message"]);  
}else {$messageErr="please Enter your message";}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
;
?>

<?php //inserting user data into database
$done="";
//$registerErr="";
$background="#12D12C";
$opacity="0";
	    if(isset($_POST['send'])){
        //inserting..
         if(!empty($Fname) && !empty($message) &&!empty($email))
		 {
			$q="SELECT `e-mail` FROM `users` WHERE `e-mail` LIKE '$email'";
			$res=mysqli_query($connect,$q);
			if(!mysqli_num_rows($res)>0){
				$q="INSERT INTO `user_message`(firstname,lastname,`e-mail`,message) VALUES ('$Fname','$Lname','$email','$message')";
				$res=mysqli_query($connect,$q);
				if($res){$opacity="0.8";$done="your message has been sent successfully";}
				}
			else
			{
			$q="SELECT `userID` FROM `users` WHERE `e-mail` LIKE '$email'";
			$res=mysqli_query($connect,$q);
			$row= mysqli_fetch_assoc($res);
			$ID=$row['userID'];
            $q="INSERT INTO `user_message`(firstname,lastname,`e-mail`,message,`userID`) VALUES ('$Fname','$Lname','$email','$message',$ID)";
            $res=mysqli_query($connect,$q);
			if(!$res){echo "query ERR";}else{$opacity="0.8";$done="your message has been sent successfully";}
			}
        }
    }
?>
            <div class="main">
                    <h1>اتصل بنا</h1>
                    <h2>شاركنا تعليقاتك</h2>
                    <form style="text-align: center;" class="message" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <label>First Name</label>
                            <span style="color: red; opacity:0.9; text-align: center"><?php echo $FnameErr?></span>
                            <input type="text" name="Fname">

                            <label>Last Name</label>
                            <input type="text" name="Lname">

                            <label>Email Address</label>
                            <span style="color: red; opacity:0.9;"><?php echo $emailErr?></span>

                            <input name="email" type="text">
                            <label>Message</label>
                            <span style="color: red; opacity:0.9;"><?php echo $messageErr?></span>
                            <textarea name="message" maxlength="400"></textarea>
                            <input class="sub" type="submit" value="Send Message" name="send">
                            <div class="Malert" style="opacity:<?php echo $opacity;?>;background: <?php echo $background;?>">
                                    <?php// echo $registerErr;?>
                                    <?php echo $done?>
                            </div>

                    </form>
            </div>
	</div>
        <!--end form-->
        <!--start footer-->
        
        
        
        
        <footer>
            
            CopyRight © All right reserved


        </footer>
        
        
        <!--end footer-->


    
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
	</body>
</html>