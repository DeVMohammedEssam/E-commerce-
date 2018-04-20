<?php session_start();
    include 'incs/templates/DBconnection.php';
    include('incs/templates/header.php');
     $type="منسوجات";
    include('incs/templates/navbar.php');
   

?>

<?php //retrieving data from DB , and printing them inside page
$nores="";
    $q="SELECT * FROM `dbo.product` WHERE type='منسوجات'";
    $res= mysqli_query($connect, $q);
    if(isset($_POST['search']) && !empty($_POST['entery'])){ //selecting serched items only
        $q=$qS;
        $res=$resS;
        if(mysqli_num_rows($res)==0)  $nores="<div class='alert alert-danger display-4 text-danger text-center'>Sorry no such item</div>"  ;
    }
    $IMGarr=array();
   $i=0;$j=0;$k=0;
    while ( $row= mysqli_fetch_assoc($res)){
       
        $IMGarr[$i]=$row['SRC'];
        $nameArr[$i]=$row['name'];
        $typeArr[$i]=$row['type'];
        $costArr[$i]=$row['cost'];
        $quantArr[$i]=$row['quantity'];
        $proID[$i]=$row['ID_pro'];
        $i++;
    }
    for($t=1;$t<5;$t++){
        

        ?>
      
        <!--start section-->
        <div id="contents">
        <div class="featured ">
	<ul class="clearfix ">
            <?php
                   
            for(;$j<$k+4;$j++){
              if($j>=$i)    break;  
            ?>
            
                    <li class="">
                                 <div class="frame1">
                                       <div class="box">
                                           <img src="<?php echo $IMGarr[$j];?>" alt="Img" height="132" width="199">
                                        </div>
                                 </div>
                                 <ul>
                                     <li>NAME :<?php echo  $nameArr[$j]?></li>
                                    <li>TYPE : <?php  echo  $typeArr[$j]?></li>
                                     <li>COST : <?php echo  $costArr[$j]?></li>
                                     <li>QUANTITY : <?php echo $quantArr[$j]?></li>
                                 </ul>
                                <form action="buyitem.php" method="POST">
                                    <input type="hidden" name="productID" value="<?php echo $proID[$j];;?>">
                                    <button type="submit" name="submit" class="btn btn-danger">شراء</button>
                                </form>
                            </li>
                            
            <?php
                 
            }
            $k=$j;
            ?>
                   </ul>
        </div>
</div>
 <?php
    }
    $type="";
//End of retrieving data from DB , and printing them inside page
?>
             
                <!--end section-->
        
<?php
echo $nores;
//closing connection
        mysqli_close($connect);
?>
<?php include ("incs/templates/footer.php")?>