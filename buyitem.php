<?php
session_start();
ob_start();//to prevent header calling Error
include 'incs/templates/DBconnection.php';

include('incs/templates/header.php');
$searchNon=TRUE;
include 'incs/templates/navbar.php';?>
<?PHP   
$btndis="";
$soldOutMessage="";

if(isset($_POST['productID']))$_SESSION['productID']=$_POST['productID'];

$q="SELECT * FROM `dbo.product` WHERE ID_pro=".$_SESSION['productID'];
$res=mysqli_query($connect,$q); if(!$res)     echo 'Error';
$row=mysqli_fetch_assoc($res);
if($row['quantity']<=0){
$btndis="disabled";
$soldOutMessage="Sorry this item is sold out";
}
?>
<h1 style=" margin:50px auto;color: #FFF ; background: #666; width: 300px" class="text-center"> your product </h1>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-img bg-dark  ">
            <img src="<?php echo $row['SRC'];?>" class="img-fluid img-thumbnail">
            </div>
        </div>
    </div>
            <ul class="row text-center">
                <li class="col-12"><span class="key">Name:</span><?php echo $row['name'];?></li>
                <li class="col-12"><span class="key">Type:</span> <?php echo $row['type'];?></li>
                <li class="col-12"><span class="key">Cost:</span> <?php echo  $row['cost'];?></li>
                <li class="col-12"><span class="key">Quantity:</span> <?php echo $row['quantity'];?></li>
            </ul>
    <form class="row mr-auto" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="slidercontainer mr-auto col-md-4 col-sm-8 col-12">
            <input class="slider mr-auto" id="myRange"  type="range" name="quant" value="1" min=1 max="<?php echo  $num=(int) $row['quantity'];?>">
            <h2 class="text-center d-inline-block badge badge-dark text-light" id="currentVal"></h2>
        </div>
        <div class=" offset-md-7 "></div>
        <input class="btn btn-success col-md-2 col-sm-6 slider-btn" type="submit" name="buy" value="buy" <?php echo $btndis;?>> 
        <input   type="hidden" name="productID" value="<?php echo $_SESSION['productID'];?>"><!-- holds product ID-->
        <input   type="hidden" id="productCost" name="productCost" value="<?php echo $row['cost']?>"><!-- holds product cost-->
        <input   type="hidden" name="resultantCost" id="resultantCost" value=""><!-- holds chosen cost-->
    </form>

</div>
<?php
if( isset($_SESSION['userID'])){
/* retrieving user's data from database*/
$userID= $_SESSION['userID'];
$productID=$_SESSION['productID'];
$q2="SELECT * FROM users WHERE userID=$userID";
$res2= mysqli_query($connect, $q2); if(!$res2) echo "query Err";
$row2= mysqli_fetch_assoc($res2);

if(isset($_POST['buy']) &&$row['quantity']>0){
    if($row2['credit']>=$_POST['resultantCost'] && $row2['credit'] >=$row['cost']){
    /* Updating product's data from database*/
    $newQuant=$row['quantity']-$_POST['quant'];
    $newCredit=$row2['credit']-$_POST['resultantCost'];
    $q3="UPDATE `dbo.product` 
            SET  quantity=$newQuant
            WHERE `ID_pro` =".$_SESSION['productID'];
    $res3= mysqli_query($connect, $q3); if(!$res3)    { echo 'query Err';}
    
    /* Updating user's data from database*/
     $q3="UPDATE `users` 
            SET  credit=$newCredit
            WHERE `userID` =".$_SESSION['userID'];
    $res3= mysqli_query($connect, $q3); if(!$res3)     echo 'query Err';
 
 if($res3) 
 {
     header("LOCATION: buyitemconf.php");
 }

    }else {
        echo '<div class="alert alert-danger text-danger text-center mr-auto"><h3>Sorry you do not have enough credit !</h3></div>';
        }
    
}//only if isset submit button

?>
<div class="container">
    <h4 id="overallCost" class="text-left bg-dark text-light badge" ></h4>
    <h4 class="text-center text-danger"><?php echo $soldOutMessage;?></h4>
    <h3 class="text-center text-warning" >you have <?php echo $row2['credit'] ;?> LE</h3>
    <?php
     if(isset($_GET['done'])){
         echo $_GET['done'];
     }
}//if only user logged in
else {
    echo "<div class='alert alert-warning text-center'>Sorry you can't buy an item without signing in</div>";
}
    ?>
    
</div>
            <script>
                /*slider and price showing*/
            var slider = document.getElementById("myRange");
            var output = document.getElementById("currentVal");
            var oC=document.getElementById("overallCost");
            var quant=document.getElementById("myRange");
            var cost=document.getElementById("productCost");
            var resCost=document.getElementById("resultantCost");
            
            oC.innerText=cost.value + " LE";
            
            output.innerHTML = slider.value; // Display the default slider value

            // Update the current slider value (each time you drag the slider handle)
            slider.oninput = function() {
                output.innerHTML = this.value;
                oC.innerText=(quant.value*cost.value) + " LE";
                resCost.value=(quant.value*cost.value) ;
            }
            </script>




<?php

//closing connection
        mysqli_close($connect);
        
?>
<?php include ("incs/templates/footer.php");
    ob_end_flush();
?>
