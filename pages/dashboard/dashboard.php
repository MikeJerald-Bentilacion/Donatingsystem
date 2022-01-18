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
          <aside class="right-side">
              <section class="content-header">
                <h1>
                  Dashboard
                </h1>  
              </section>
              <section class="content">
                <div class="row">
                  <div class="box">     
                    <div class="col-md-3 col-sm-6 col-xs-12"><br>
                      <div class="info-box">
                        <a href="../item/item.php"><span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span></a>
                      <div class="info-box-content">
                      <span class="info-box-text">Total Items</span>
                        <span class="info-box-number">
                          <?php
                            $q = mysqli_query($con,"SELECT * from item");
                            $num_rows = mysqli_num_rows($q);
                            echo $num_rows;
                          ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12"><br>
                    <div class="info-box">
                      <a href="../donor/donor.php"><span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span></a>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Donor</span>
                        <span class="info-box-number">
                          <?php
                            $q = mysqli_query($con,"SELECT * from donor");
                            $num_rows = mysqli_num_rows($q);
                            echo $num_rows;
                          ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12"><br>
                    <div class="info-box">
                      <a href="../schedule/schedule.php"><span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span></a>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Schedule</span>
                        <span class="info-box-number">
                          <?php
                            $q = mysqli_query($con,"SELECT * from schedule");
                            $num_rows = mysqli_num_rows($q);
                            echo $num_rows;
                          ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12"><br>
                    <div class="info-box">
                      <a href="../rider/rider.php"><span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span></a>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Rider</span>
                        <span class="info-box-number">
                          <?php
                            $q = mysqli_query($con,"SELECT * from rider");
                            $num_rows = mysqli_num_rows($q);
                            echo $num_rows;
                          ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </aside>
      </div>
      <?php }
        include "../footer.php"; ?>
      <script type="text/javascript">
          $(function() {
              $("#table").dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
              });
          });
      </script>
    </body>
</html>