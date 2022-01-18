<!DOCTYPE html>
<html>
    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-black">
      <?php include "../connection.php";?>
      <?php include('../header.php'); ?>
      <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php include('../sidebar-left.php'); ?>
      <?php }
        include "../footer.php"; ?>
    <div class="" style="margin-top:80px">
          <div class="">
              <div class="">
            <div class="" style="text-align:center;">
                <img src="../../img/bg.png" style="height:400px;"/>
            </div>
          </div>
    </div>
    </body>
</html>