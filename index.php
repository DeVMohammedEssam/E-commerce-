<?php include("incs/templates/DBconnection.php");?> <!--connecting to database-->

<?php session_start();?> <!--session starting-->

<?php include ("incs/templates/header.php")?> <!--header-->
<?php include('incs/templates/navbar.php')?><!--navbar-->
        
     <!--start section-->
        <div id="contents">
        <div class="featured">
			<h2>الاكثر مبيعا</h2>
			<ul class="clearfix">
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/p/15.jpg" alt="Img" height="132" width="199">
						</div>
					</div>
					<ul>
                            <li>NAME : كاس </li>
                            <li>TYPE : فخار</li>
                            <li>COST : 90 L.E</li>
                            <li>QUANTITY : 15</li>
                        </ul>
                    <button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/g/8.jpeg" alt="Img" height="130" width="197">
						</div>
					</div>
					<ul>
                            <li>NAME :  فواحة مجسمة</li>
                            <li>TYPE : زجاج</li>
                            <li>COST : 15 L.E</li>
                            <li>QUANTITY : 3</li>
                        </ul>
					<button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>

				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/m/10.jpeg" alt="Img" height="130" width="197">
						</div>
					</div>
					<ul>
                            <li>NAME : قلب مزخرف</li>
                            <li>TYPE : منسوجات</li>
                            <li>COST : 35 L.E</li>
                            <li>QUANTITY : 15</li>
                        </ul>
                    <button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/m/15.jpeg" alt="Img" height="130" width="197">
						</div>
					</div>
					<ul>
                            <li>NAME : حذاء اطفالى صغير</li>
                            <li>TYPE : منسوجات</li>
                            <li>COST : 40 L.E</li>
                            <li>QUANTITY : 5</li>
                        </ul>
                    <button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>
				</li>
			</ul>
		</div>
        </div>
        <div id="contents">
        <div class="featured">
			<h2>المفضلة</h2>
			<ul class="clearfix">
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/g/1.jpg" alt="Img" height="132" width="199">
						</div>
					</div>
					<ul>
                            <li>NAME : كوب مزخرف</li>
                            <li>TYPE : زجاج</li>
                            <li>COST : 20 L.E</li>
                            <li>QUANTITY : 5</li>
                        </ul>
                    <button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/m/1.jpeg" alt="Img" height="130" width="197">
						</div>
					</div>
					<ul>
                            <li>NAME : بلوفر</li>
                            <li>TYPE : منسوجات</li>
                            <li>COST : 130 L.E</li>
                            <li>QUANTITY : 50</li>
                        </ul>
				<button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>

				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/g/11.jpeg" alt="Img" height="130" width="197">
						</div>
					</div>
					<ul>
                            <li>NAME : اناء</li>
                            <li>TYPE : زجاج</li>
                            <li>COST : 30 L.E</li>
                            <li>QUANTITY : 50</li>
                        </ul>
                    <button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="img/p/1.jpg" alt="Img" height="130" width="197">
						</div>
					</div>
					<ul>
                            <li>NAME : ديكور فخارى</li>
                            <li>TYPE : فخار</li>
                            <li>COST : 200 L.E</li>
                            <li>QUANTITY : 5</li>
                        </ul>
                    <button type="button" class="btn btn-danger"><a href="buyitem.php">شراء</a></button>
				</li>
			</ul>
		</div>
        </div>
        <!--end seaction-->
           
    <?php

//closing connection
        mysqli_close($connect);
?>    
        
<?php include ("incs/templates/footer.php")?>