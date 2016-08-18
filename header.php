<div class="col-md-12">
    
    <div class="col-md-4">
        <li class="shopcart ">
		<a href="shopcart.php">
		<span >
	<?php 
		if (empty($_SESSION['dem'] )==False){
			echo '<span class="maudoo"> Bạn có '.$_SESSION['dem'].' sản phẩm </span>' ;
		}else {echo 'GIỎ HÀNG';}
	?>
		</span>
			
		</a>
        </li>
        <?php 
		if (empty($_SESSION['TKhoan'] )==False){
			echo '<li class=" helone1a">
				<a href="myinfo.php" style="text-align: left;"> Xin chào, <span class="helone1aa">'.$_SESSION['TKhoan'].' </span> <span class="themchune"  style="margin-left:21px"></span></a>
                                <a href="php/logout.php" style="">Logout</a>    
				</li>
				' ;
			}else {echo '<li class="" onclick="clickLogin()">
				<a href="dangnhap.php"><i class="glyphicon glyphicon-user"></i> ĐĂNG NHẬP</a>
				</li>';}
	?>
    </div>
    <div class="col-md-4">
      <form id="searchbox"action="#">
        <input type="search" name="googlesearch" style="width:240px; height:30px; font-style:italic" value="Nhập sản phẩm cần tìm">
        <input type="Submit" value="Search" style="width:70px; height:30px;background: -webkit-gradient(linear, left top, left bottom, from(#47AFAF), to(#47AFAD));
   border-color:#FFF;border: solid 1px #0076a3;">
      </form>
    </div>
    <div class="col-md-4" id="headerright">
      <ul id="call">
        <li>
          <h3><span class="glyphicon glyphicon-hand-right"></span> Tư vấn miễn phí.</h3>
        </li>
        <li>
          <h2><a href="" style="text-decoration:none"><span class="glyphicon glyphicon-earphone"></span> 0511 3 123 666</a></h2>
        </li>
      </ul>
    </div>
  </div>