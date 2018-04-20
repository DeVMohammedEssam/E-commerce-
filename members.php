<?php
ob_start(); //to prevent header calling Error
/*
 ============================
==>adding|deleting|Editing members
 ============================ 
 */
session_start();
include 'incs/templates/DBconnection.php';

include 'incs/templates/header.php';
$searchNon=TRUE;
include 'incs/templates/navbar.php';
$do='';$Err="";$done="";
if (isset($_GET['do'])){
    $do=$_GET['do'];
} else {
    $do='Manage';
}

if($do==='Manage'){
    if(isset($_SESSION['state']) && $_SESSION['state']==='admin'){
        //retreaving the data of users from DB and inserting them inside <td>
        $q='SELECT *FROM `users`';
        $res= mysqli_query($connect, $q);
        
          ?>
   <!-- //Managing page-->
    <div class="container">
        <h2 class="text-center display-4 mt-5 mb-5" style="color:#666">MANAGE USERS</h2>
  <table class="table table-dark table-striped managing-table table-responsive-sm">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>procedures</th>
      </tr>
    </thead>
    <tbody>
        <?php
         while($row=mysqli_fetch_assoc($res)){
            $emails=$row['e-mail'];
            $IDs=$row['userID'];
            $names=$row['name'];
            if($row['state']!='admin'){
            
                echo"
                    
                    <tr>
                        <td>$IDs</td>
                            <td>$names </td>
                        <td>$emails</td>
                        
                         <td>
                        <form method='POST' action=".$_SERVER["PHP_SELF"]."?do=Manage". ">
                            <input type='hidden' name='ID'  value='".$IDs."'>
                            <button type='submit' name='submit'  class='btn btn-danger mt-2 mt-sm-0 confirm'>Delete</button>
                        </form>
                        </td>
                  </tr>
            ";

            }
        }
                                  if(isset($_POST['submit'])){
                    $qq="DELETE FROM `users` WHERE userID=$IDs";
                    $rr= mysqli_query($connect, $qq);
                    if(!$rr){echo "false";}
                    header("Refresh:0");
                } 
 
        ?>
    </tbody>
  </table>
</div>
    <?php
    }else{echo '<div class="alert alert-danger text-danger text-center display-4">you are not authorized to enter this page </div>';}
}elseif ($do==='Edit'){ 
    //Editing page
    if (isset($_SESSION['userID'])){
        $q='SELECT * FROM `users` WHERE `userID` ='.$_SESSION["userID"];
        $res= mysqli_query($connect, $q);if(!$res)    echo 'query Err';
        $row= mysqli_fetch_assoc($res);
        $name=$row['name'];
        $email=$row['e-mail'];
        $address=$row['address'];
        $phone=$row['phone'];
    ?>
<div class="container">
    <h2 class="text-center  mt-5 display-4" style="color:#666">Edit your profile</h2>
    <form class="form-horizontal text-center edit-profile-form " action="?do=Update"method="POST">
            <div class="row">
                <div class="offset-sm-1"></div>
                <label class="col-2 text-primary">Full Name:</label>
                <input type="text" class="form-control col-10 col-sm-5  mb-4" name="fullname" required="required" value="<?php echo $name;?>">
            </div>
        
            <div class="row">
                <div class="offset-sm-1"></div>
                <label class="col-2 text-primary"> Email:</label>
                <input type="text" class="form-control col-10 col-sm-5 mb-4" name="email" required="required"  value="<?php echo $email;?>">
            </div>
        
            <div class="row">
                <div class="offset-sm-1"></div>
                <label class="col-2 text-primary">password:</label> 
                <input type="password" class="form-control col-10 col-sm-5 mb-4" name="password" autocomplete="new-password"  required="required" >
            </div>
        
            <div class="row">
                <div class="offset-sm-1"></div>
                <label class="col-2 text-primary">address:</label>
                <input type="text" class="form-control col-10 col-sm-5 mb-4" name="address"  required="required" value="<?php echo $address;?>">
            </div>
        
            <div class="row">
                <div class="offset-sm-1"></div>
                <label class="col-2 text-primary">Phone Number:</label>
                <input  type="mobile" class="form-control col-10 col-sm-5 mb-4" name="phone" required="required"  value="<?php echo $phone;?>">
            </div>
        
            <div class="row">
                <div class="offset-sm-1"></div>
                <div class="offset-2"></div>
                <input type="submit" class="btn btn-outline-primary col-2 mb-4" name="submit"  value="save">
            </div>
    </form>
    
</div>
    
<?php 
    }else{
        echo '<h1 style="color:red ;margin-top: 300px" class="text-center">please sign in first</h1>';
    }
        }elseif ($do=='Update') { //Update page
            
            //setting user entry
              if (! empty($_POST["fullname"])) {
    $Nname = test_input($_POST["fullname"]);
  }

  if ( ! empty($_POST["email"])) {
    $Nemail = test_input($_POST["email"]);
  }
  
  if ( !empty($_POST["password"])) {
    $Npassword = test_input($_POST["password"]); 
  }
  
  
  if (!empty($_POST["phone"])) {
    $Nphone = test_input($_POST["phone"]);
  } 

    if (!empty($_POST["address"])) {
    $Naddress = test_input($_POST["address"]);
  }
    //updating page
            if($_SERVER["REQUEST_METHOD"]==='POST'){
                if(!empty($Nname) && !empty($Nemail) && !empty($Npassword)&& !empty($Nphone)&& !empty($Naddress)){
            $q="UPDATE `users` SET name='$Nname' , `e-mail`='$Nemail',address='$Naddress', phone= $Nphone ,password='$Npassword'"
                    . "WHERE userID=".$_SESSION['userID']; 
            $res= mysqli_query($connect, $q);
            if(!$res){echo 'query Err';}else{
                $done="data changed successfully..you'll be redirected to sign in";
                header("REFRESH:3 logout.php");
                }
                }
            }else{
                //redirecting to Edit page when trying to access without submitting
               
            }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

    ?>

<h2 class="text-center text-success mt-5"><?php echo $done;?></h2>
<p class="text-danger text-center display-4"><?php echo $Err;?></p>

<?php
mysqli_close($connect);
ob_end_flush();//to prevent header calling Error
?>


    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    
<script>
    $(".confirm").click(function(){
        'use strict';
        return confirm("are you sure you wanna delete this !");
    });
</script>
	</body>
</html>
