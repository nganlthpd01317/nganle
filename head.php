<?php
     if(!isset($_SESSION)) 
    { 
        session_start(); 
        include ('admin/conn.php');
        $_SESSION['LH']="" ;
        $_SESSION['ThongB']="";
    } 
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/templates.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8" name=”viewport” content=”width=device-width, initial-scale=1.0″>
<link rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="Css/style.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>XCODE APPLE SHOP</title>
<script>

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
</script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>