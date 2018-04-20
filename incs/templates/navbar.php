
<?php
$searchNon;
$dSnon="";
$userID="";
$entout="";
$none="";
if(isset($_SESSION['userID']))
{
    $userID=$_SESSION['userID'];
    $entout="تسجيل خروج";
    if($_SESSION['state']!='admin'){
        $none="display:none";
    }
}else{
    $entout="تسجيل دخول";
}
 if(isset($searchNon)){$dSnon="display:none";}
?>
<?php
//seaech box setting
if (isset($_POST['search']) && !empty($_POST['entery'])){//selecting serched items only
   $entry= $_POST['entery'];
$op1="%$entry";
$op2="$entry%";
$op3="%$entry%";
$op4="$entry";
        $qS="SELECT * FROM `dbo.product` WHERE type='$type' AND name LIKE '$op1'|| name LIKE '$op2' || name LIKE '$op3' ||name LIKE '$op4' ";
    $resS= mysqli_query($connect, $qS); if(!$resS) echo "resS err";
}
?>
    <!--start nav-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar fixed-top ">
             
             <form class="form-inline my-2 " style="<?php echo $dSnon;?>" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
               
                <input class="form-control mr-sm-2 mt-xs-3" type="search" name="entery" placeholder="Search" aria-label="Search">
                
                <button class="btn btn-outline-success my-2 my-sm-0" name="search"  type="submit" value="search">بحث</button>
            </form>
             
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent"> <!--collapsed part-->
                 <ul class="navbar-nav ">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  userName
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="members.php?do=Edit">Edit profile</a>
                                  <div class="dropdown-divider" style="<?php echo $none;?>"></div>
                                    <a class="dropdown-item" href="members.php?do=Manage" style="<?php echo $none;?>">Delete</a>
                                    <div class="dropdown-divider"  style="<?php echo $none;?>"></div>
                                  <a class="dropdown-item" href="#">#</a>
                                </div>
                          </li>
                          
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
                             <a class="nav-link" href="logout.php"><?php echo $entout ;?> <span class="sr-only">(current)</span></a>
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
            </div> <!--end of collapsed part-->

        </nav>
        <!--end nav-->
