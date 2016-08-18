<?php
session_start();
include('admin/conn.php');
$_SESSION['LH'] = "";
$_SESSION['ThongB'] = "";
?>
<?php include 'head.php'; ?>
<body onLoad="setup();">

    <div class="container">

        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>

        <div class="ct-chitiet" id="giohang">
            <h3> <i class="glyphicon glyphicon-shopping-cart"></i> GIỎ HÀNG</h3>
            <div class="chitietgh">
                <div class="col-md-1 obj1">STT</div>
                <div class="col-md-4 obj1">SẢN PHẨM</div>
                <div class="col-md-2 obj1">ĐƠN GIÁ</div>
                <div class="col-md-2 obj1">SỐ LƯỢNG</div>
                <div class="col-md-2 obj1">THÀNH TIỀN</div>
                <div class="col-md-1 obj1">XÓA</div>

                <div style="clear:both"></div>
            </div>


            <?php
            $i = 1;
            $TongTien = 0;
            //Duyệt qua mảng Giỏ
            $kiemtra = 1;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $masp => $soluong) {
                    if (isset($masp)) {
                        $kiemtra = 2;
                    }
                }
            }
            if ($kiemtra == 2) {
                foreach ($_SESSION['cart'] as $masp => $soluong) {
                    $end = strlen($masp);
                    $GetSP = substr($masp, 0, 6);

                    //$item[]=$demo1; $item1[]=$demo2;
                    //echo $demo1.'-'; echo $demo2.'<br>';echo $soluong.'<br>';
                    //   IN SẢN PHẨM RA
                    $query = mysqli_query($conn, "SELECT * FROM sanpham WHERE MaSP='$GetSP'");
                    while ($sanpham = mysqli_fetch_array($query)) {
                        $MaSP = $sanpham[0];
                        $TenSP = $sanpham[1];
                        $DGia = $sanpham[2];
                        $KM = $sanpham[3];
                        $HinhAnh = $sanpham[4];
                        if ($i % 2 == '1') {
                            echo '	
														<div class="chitietgh1">
															<div class="col-md-1 obj2">' . $i . '</div>
															<div class="col-md-4 obj22">
																<div class="col-md-4 dtsp1"><img src="images/sanpham/' . $HinhAnh . '" alt="" style="width:100%" /></div>
																<div class="col-md-8 dtsp1" style="padding-left:15px">
																	<a href="chitiet.php?id=' . $MaSP . '"><h4>' . $TenSP . '</h4></a>';


                            echo '
															</div>
																</div>';
                            // ĐƠN GIÁ SẢN PHẢM
                            if ($KM != 0) {
                                echo'	<div class="col-md-2 obj2">' . number_format($KM) . ' đ</div>';
                            } else {
                                echo'	<div class="col-md-2 obj2">' . number_format($DGia) . ' đ</div>';
                            }

                            echo '
																<div class="col-md-2 obj2">
																<form action="cart/capnhatsl.php" method="GET" id="' . $masp . '" class="CNSLNE">
																	<input type="text" name="SLCN" value="' . $soluong . '">
																	<input type="hidden" name="MAGH" value="' . $masp . '">
																	<button form="' . $masp . '"><i class="glyphicon glyphicon-plus"></i></button>
																</form>
																</div>';
                            // TÍNH THÀNH TIỀN
                            if ($KM != 0) {
                                $TTien = $KM * $soluong;
                            } else {
                                $TTien = $DGia * $soluong;
                            }
                            echo '
																<div class="col-md-2 obj2">' . number_format($TTien) . ' đ</div>
																<div class="col-md-1 obj2 acxoa"><a href="cart/delcart.php?id=' . $masp . '"  onclick="return xacnhan()"><i class="glyphicon glyphicon-remove"></i></a></div>
																<div style="clear:both;padding:0"></div>
															</div>';

                            // LẤY GIÁ TIỀN TỔNG
                            $TongTien = $TongTien + $TTien;
                        } else {
                            echo '	
														<div class="chitietgh1 sochan">
															<div class="col-md-1 obj2">' . $i . '</div>
															<div class="col-md-4 obj22">
																<div class="col-md-4 dtsp1"><img src="images/sanpham/' . $HinhAnh . '" alt="" style="width:100%" /></div>
																<div class="col-md-8 dtsp1" style="padding-left:15px">
																	<a href="chitiet.php?id=' . $MaSP . '"><h4>' . $TenSP . '</h4></a>';


                            echo '
																	</div>
																</div>';
                            // ĐƠN GIÁ SẢN PHẢM
                            if ($KM != 0) {
                                echo'	<div class="col-md-2 obj2">' . number_format($KM) . ' đ</div>';
                            } else {
                                echo'	<div class="col-md-2 obj2">' . number_format($DGia) . ' đ</div>';
                            }

                            echo '
																<div class="col-md-2 obj2">
																<form action="cart/capnhatsl.php" method="GET" id="' . $masp . '" class="CNSLNE">
																	<input type="text" name="SLCN" value="' . $soluong . '">
																	<input type="hidden" name="MAGH" value="' . $masp . '">
																	<button form="' . $masp . '"><i class="glyphicon glyphicon-plus"></i></button>
																</form>
																</div>';
                            // TÍNH THÀNH TIỀN
                            if ($KM != 0) {
                                $TTien = $KM * $soluong;
                            } else {
                                $TTien = $DGia * $soluong;
                            }
                            echo '
																<div class="col-md-2 obj2">' . number_format($TTien) . ' đ</div>
																<div class="col-md-1 obj2 acxoa"><a href="cart/delcart.php?id=' . $masp . '"  onclick="return xacnhan()"><i class="glyphicon glyphicon-remove"></i></a></div>
																<div style="clear:both;padding:0"></div>
															</div>';

                            // LẤY GIÁ TIỀN TỔNG
                            $TongTien = $TongTien + $TTien;
                        }
                        $i++;
                    } // END WHILE
                } // END FOREACH
                //$str=implode("','",$item); $str1=implode("','",$item1);
            } else {
                echo '<p class="ghnull">Giỏ hàng rỗng</p>';
                $_SESSION['dem'] = 0;
            }
            ?>
            <div class="tongtien">
                <div class="col-md-4 ttien2">Tổng tiền : <span class="sotientong"><?php
                        if ($TongTien != "") {
                            echo number_format($TongTien);
                        } else {
                            echo "0";
                        }
                        ?> đ</span></div>
                <div style="clear:both;"></div>
            </div>

            <div class="mttt" style=" margin-top:15px;display:<?php
            if (empty($_SESSION['dem']) == False) {
                echo 'block';
            } else {
                echo "none";
            }
            ?>" id="ancainutnaydi">
                <div class="col-md-6 muatiep"></div>
                <div class="col-md-6 thanhtoan">
                    <?php
                    if (empty($_SESSION['TKhoan']) == True) {
                        echo '<a href="#" onclick="clickLogin()">Thanh toán</a>';
                    } else {
                        echo '<a href="#TTDonHang" onclick="clickThanhtoan()">Thanh toán</a>';
                        $namene = $_SESSION['TKhoan'];
                        $sql = mysqli_query($conn, "SELECT * FROM thanhvien WHERE Username='$namene'");
                        while ($row = mysqli_fetch_array($sql)) {
                            $HoTen = $row[3];
                            $DiaChi = $row[6];
                            $DienThoai = $row[7];
                        }
                    }
                    ?>
                    <a href="./">Quay lại</a>
                </div>
                <div class="ct-chitiet slideUp" id="TTDonHang" style="display:none;padding-bottom:0;">
                    <div class="col-md-6 ThanhToanTT">
                        <h3> <i class="glyphicon glyphicon-plane"></i> <span style="color:#2389D4">THANH TOÁN </span> KHI GIAO HÀNG</h3>
                        <p class="lueunni1">Thanh toán khi giao hàng. Thời gian giao hàng từ 3 - 5 ngày. Quý khách vui lòng xác nhận thông tin trước khi thanh toán.</p>
                        <p class="lueunni2">Thông tin người nhận</p>
                        <form action="cart/thanhtoan.php" method="POST" id="thanhtoanForm">
                            <p class="lueunni11"><span>Họ Tên </span>: <input type="text" name="HTen" value="<?php echo $HoTen; ?>" required><input type="hidden" name="TongTien" value="<?php echo $TongTien; ?>" ></p>
                            <p class="lueunni11"><span>Địa Chỉ</span>: <input type="text" name="DChi" value="<?php echo $DiaChi; ?>" required></p>
                            <p class="lueunni11"><span>Điện Thoại</span>: <input type="text" name="DThoai" value="<?php echo $DienThoai; ?>" required></p>
                            <p class="lueunni112" style="margin-top:20px;">Số lượng : <strong style="color:#2389D4"><?php echo $_SESSION['dem']; ?></strong>  x sản phẩm</p>
                            <p class="lueunni112" style="border-bottom: 5px ridge #CCCCCC;">Số tiền cần thanh toán : <strong style="color:#2389D4"><?php echo number_format($TongTien); ?> </strong> đ</p>
                            <p class="lueunni3"><button id="ButTTForm" form="thanhtoanForm">Thanh toán</button></p>
                        </form>
                    </div>

                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>


    <!--Quang Cao-->

</div>
</body>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<!-- InstanceEnd --></html> 
