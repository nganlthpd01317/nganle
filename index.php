
<?php include 'head.php';?>
<body onLoad="setup();">

<div class="container">
  
   <?php include 'header.php';?>
   <?php include 'menu.php';?>
   <?php include 'slide.php';?>
  <article class="col-md-12">
  <!-- InstanceBeginEditable name="Chỉnh Sửa" -->
    <div class="col-md-12">
      <div class="panel panel-info">
        <div id="titlesp" class="panel-heading"><span class="glyphicon glyphicon-heart"></span><b> Sản Phẩm </b></div>
        <div class="panel-body">
            <?php
            $homnay = date("d/m/Y");
            $sql = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY NgayDang DESC LIMIT 12");
            while ($row = mysqli_fetch_array($sql)) {
                $NgayDang = date("d/m/Y", strtotime($row[8]));
                $NgayDang1 = date("d/m/Y", strtotime('+1 days', strtotime($row[8])));
                $NgayDang2 = date("d/m/Y", strtotime('+2 days', strtotime($row[8])));
                if ($row[3] == 0) {
                    echo '
                        <div class="col-md-3">
                        <div id="imgsp" class="thumbnail">
                          <span class="label label-danger">Hot</span>
                          <div id="imgsp"><a href="#"><img src="Images/'.$row[4].'" alt=""/></a></div>
                          <div class="caption">
                            <h4 style="color:#00ace9">'.$row[1].'</h4>
                            <h5 style="color:red">Giá : '.number_format($row[2]).'</h5>
                            <p align="right"><a href="chitiet.php?id='.$row[0].'"><button class="btn btn-default" value="Chọn"><span class="glyphicon glyphicon-plus"></span> Chi Tiết</button></a>
                            <form action="cart/addcart.php" method="POST" id="">
				<input type="hidden" name="MaSP" value="<?php echo $MaSP?>">
                                <button class="btn btn-info" value="Chọn"><span class="glyphicon glyphicon-shopping-cart"></span> Đặt Hàng</button></p>
                            </form>
                          </div>
                        </div> ';
                   
            
          echo'</div>';
                }
            }
            
          ?>
        </div>
      </div>
    </div>
    
   
  </article>
  <?php include 'footer.php';?>
</div>


<!--Quang Cao-->

</div>
</body>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<!-- InstanceEnd --></html>
    
    
    
