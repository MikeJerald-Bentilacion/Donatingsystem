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
        <?php 
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include('../sidebar-left.php'); ?>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Schedule
                    </h1>
                </section>
                <section class="content">
                    <?php
                    if(($_SESSION['role'] == "Administrator") || isset($_SESSION['Donor']))
                    {
                    ?>
                    <div class="row">
                        <div class="box">
                            <div class="box-header">
                                <div style="padding:10px;"> 
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Schedule</button>  
                                    <?php 
                                        if(!isset($_SESSION['Administrator']))
                                        {
                                    ?>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 
                                    <?php
                                        }
                                    ?>
                                </div>                                
                            </div>
                            <div class="box-body table-responsive">
                                <ul class="nav nav-tabs" id="myTab">
                                      <li class="active"><a data-target="#approved" data-toggle="tab">Schedule</a></li>
                                </ul>
                                <form method="post">
                                    <div class="tab-content">
                                        <div id="approved" class="tab-pane active in">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <?php 
                                                        if(!isset($_SESSION['Administrator']))
                                                        {
                                                        ?>
                                                        <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                        <?php
                                                            }
                                                        ?>
                                                        <th>Schedule ID</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Donor ID</th>
                                                        <th>Donor's Information</th>
                                                        <th>Rider ID</th>
                                                        <th>Item ID</th>
                                                        <th style="width: 40px !important;">Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if(!isset($_SESSION['Administrator']))
                                                    {
                                                        $squery = mysqli_query($con, "SELECT *,p.id as pid FROM schedule p left join donor r on r.id = p.donor_id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['pid'].'" /></td>
                                                                <td>'.$row['schedule_id'].'</td>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['time'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donor_info'].'</td>
                                                                <td>'.$row['rider_id'].'</td>
                                                                <td>'.$row['item_id'].'</td>
                                                                <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['pid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                            </tr>
                                                            ';
                                                            include "edit_modal.php";
                                                        }
                                                    }
                                                    else{
                                                        $squery = mysqli_query($con, "SELECT *,p.id as pid FROM schedule p left join donor r on r.id = p.donor_id") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['schedule_id'].'</td>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['time'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donor_info'].'</td>
                                                                <td>'.$row['rider_id'].'</td>
                                                                <td>'.$row['item_id'].'</td>
                                                                <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['pid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                            </tr>
                                                            ';
                                                            include "edit_modal.php";
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php include "../deleteModal.php"; ?>
                                </form>
                            </div>
                        </div>
                        <?php include "../edit_notif.php"; ?>
                        <?php include "../added_notif.php"; ?>
                        <?php include "../delete_notif.php"; ?>
                        <?php include "add_modal.php"; ?>
                        <?php include "function.php"; ?>
                    </div>
                    <?php
                    }
                    elseif($_SESSION['role'] == "Rider")
                    {
                    ?>
                    <div class="row">
                        <div class="box">
                            <div class="box-header">                             
                            </div>
                            <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Schedule ID</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Donor ID</th>
                                                <th>Donor's Information</th>
                                                <th>Rider ID</th>
                                                <th>Item ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT *,p.id as pid FROM schedule p left join donor r on r.id = p.donor_id") or die('Error: ' . mysqli_error($con));
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row['schedule_id'].'</td>
                                                    <td>'.$row['date'].'</td>
                                                    <td>'.$row['time'].'</td>
                                                    <td>'.$row['donor_id'].'</td>
                                                    <td>'.$row['donor_info'].'</td>
                                                    <td>'.$row['rider_id'].'</td>
                                                    <td>'.$row['item_id'].'</td>
                                                </tr>
                                                ';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php include "../deleteModal.php"; ?>
                                </form>
                            </div>
                        </div>
                        <?php include "function.php"; ?>
                    </div>
                    <?php 
                    }
                    else
                    {
                    ?>
                    <div class="row">
                        <div class="box">
                            <div class="box-header">  
                            </div>
                            <div class="box-body table-responsive">
                                <ul class="nav nav-tabs" id="myTab">
                                      <li class="active"><a data-target="#new" data-toggle="tab">Schedule</a></li>
                                </ul>
                                <form method="post">
                                    <div class="tab-content">
                                        <div id="new" class="tab-pane active in">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Schedule ID</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Donor ID</th>
                                                        <th>Donor's Information</th>
                                                        <th>Rider ID</th>
                                                        <th>Item ID</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $squery = mysqli_query($con, "SELECT * FROM schedule p left join donor r on r.id = p.donor_id where r.id = ".$_SESSION['userid']." ") or die('Error: ' . mysqli_error($con));
                                                    if(mysqli_num_rows($squery) > 0)
                                                    {
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['schedule_id'].'</td>
                                                                <td>'.$row['date'].'</td>
                                                                <td>'.$row['time'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donor_info'].'</td>
                                                                <td>'.$row['rider_id'].'</td>
                                                                <td>'.$row['item_id'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                    }
                                                    else{
                                                        echo '
                                                        <tr>
                                                        <td colspan="5" style="text-align: center;">No record found</td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php include "function.php";?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </section>
            </aside>
        </div>
        <?php }
        include "../footer.php"; ?>
        <script type="text/javascript">
            <?php 
            if(!isset($_SESSION['Administrator']))
            {
            ?>
                $(function() {
                    $("#table").dataTable({
                    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,7 ] } ],"aaSorting": []
                    });
                    $("#table1").dataTable({
                    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
                    });
                    $(".select2").select2();
                });
            <?php
            }
            else
            {
            ?>
                $(function() {
                    $("#table").dataTable({
                    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 6 ] } ],"aaSorting": []
                    });
                    $("#table1").dataTable({
                    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 3 ] } ],"aaSorting": []
                    });
                    $(".select2").select2();
                });
            <?php
            }
            ?>
        </script>
    </body>
</html>