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
                        Item
                    </h1>
                </section>
                <section class="content">
                    <?php
                    if(($_SESSION['role'] == "Administrator") || isset($_SESSION['Donor']))
                    {
                        ?>

                        <div class="row">
                            <div class="box">
                                <div class="box-body table-responsive">
                                <ul class="nav nav-tabs" id="myTab">
                                      <li class="active"><a data-target="#new" data-toggle="tab">Donation Added by Donor</a></li>
                                      <li><a data-target="#approved" data-toggle="tab">Donation Received by Rider</a></li>
                                      <li><a data-target="#disapproved" data-toggle="tab">Donation Not Received by Rider</a></li>
                                </ul>
                                <form method="post">
                                
                                <div class="tab-content">
                                    <div id="new" class="tab-pane active in">
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item ID</th>
                                                    <th>Donor ID</th>
                                                    <th>Type of Donation</th>
                                                    <th>Total Item</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(!isset($_SESSION['Donor']))
                                                    {

                                                        $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                
                                                                <td>'.$row['item_id'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donation_type'].'</td>
                                                                <td>'.$row['quantity_item'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                    }
                                                    else{
                                                        $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'New'") or die('Error: ' . mysqli_error($con));
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['item_id'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donation_type'].'</td>
                                                                <td>'.$row['quantity_item'].'</td>
                                                            </tr>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="approved" class="tab-pane">
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <?php 
                                                    if(!isset($_SESSION['Donor']))
                                                    {
                                                    ?>
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Item ID</th>
                                                    <th>Donor ID</th>
                                                    <th>Type of Donation</th>
                                                    <th>Total Item</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if(!isset($_SESSION['Donor']))
                                                {

                                                    $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'Item Received'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            
                                                            <td>'.$row['item_id'].'</td>
                                                            <td>'.$row['donor_id'].'</td>
                                                            <td>'.$row['donation_type'].'</td>
                                                            <td>'.$row['quantity_item'].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                                }
                                                else{
                                                    $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'Item Received'") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['item_id'].'</td>
                                                            <td>'.$row['donor_id'].'</td>
                                                            <td>'.$row['donation_type'].'</td>
                                                            <td>'.$row['quantity_item'].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="disapproved" class="tab-pane">
                                        <table id="table1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <?php 
                                                    if(!isset($_SESSION['Donor']))
                                                    {
                                                    ?>
                                                    <?php
                                                        }
                                                    ?>
                                                    <th>Item ID</th>
                                                    <th>Donor ID</th>
                                                    <th>Type of Donation</th>
                                                    <th>Total Item</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if(!isset($_SESSION['Donor']))
                                                {

                                                    $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'Item Not Received' ") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['item_id'].'</td>
                                                            <td>'.$row['donor_id'].'</td>
                                                            <td>'.$row['donation_type'].'</td>
                                                            <td>'.$row['quantity_item'].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                                }
                                                else{
                                                    $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'Item Not Received' ") or die('Error: ' . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$row['item_id'].'</td>
                                                            <td>'.$row['donor_id'].'</td>
                                                            <td>'.$row['donation_type'].'</td>
                                                            <td>'.$row['quantity_item'].'</td>
                                                        </tr>
                                                        ';
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
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <th>Item ID</th>
                                                <th>Donor ID</th>
                                                <th>Type of Donation</th>
                                                <th>Total Item</th>
                                                <th style="width: 25% !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT *,p.id as pid FROM item p left join donor r on r.id = p.donor_id where status = 'New'") or die('Error: ' . mysqli_error($con));
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['pid'].'" /></td>
                                                    <td>'.$row['item_id'].'</td>
                                                    <td>'.$row['donor_id'].'</td>
                                                    <td>'.$row['donation_type'].'</td>
                                                    <td>'.$row['quantity_item'].'</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" data-target="#approveModal'.$row['pid'].'" data-toggle="modal"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Donation Received</button>
                                                        <button class="btn btn-danger btn-sm" data-target="#disapproveModal'.$row['pid'].'" data-toggle="modal"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Donation Not Received</button>
                                                    </td>
                                                </tr>
                                                ';
                                                include "approve_modal.php";
                                                include "disapprove_modal.php";
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
                                <div style="padding:10px;">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reqModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Donate Item</button>  
                                </div>
                            </div>
                            <div class="box-body table-responsive">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a data-target="#new" data-toggle="tab">New Item</a></li>
                                    <li><a data-target="#approved" data-toggle="tab">Donation Received</a></li>
                                    <li><a data-target="#disapproved" data-toggle="tab">Donation Not Received</a></li>
                                </ul>
                                <form method="post">
                                    <div class="tab-content">
                                        <div id="new" class="tab-pane active in">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Item ID</th>
                                                        <th>Donor ID</th>
                                                        <th>Type of Donation</th>
                                                        <th>Total Item</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $squery = mysqli_query($con, "SELECT * FROM item p left join donor r on r.id = p.donor_id where r.id = ".$_SESSION['userid']." and status = 'New' ") or die('Error: ' . mysqli_error($con));
                                                    if(mysqli_num_rows($squery) > 0)
                                                    {
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['item_id'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donation_type'].'</td>
                                                                <td>'.$row['quantity_item'].'</td>
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
                                        <div id="approved" class="tab-pane">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Item ID</th>
                                                        <th>Donor ID</th>
                                                        <th>Type of Donation</th>
                                                        <th>Total Item</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $squery = mysqli_query($con, "SELECT * FROM item p left join donor r on r.id = p.donor_id where r.id = ".$_SESSION['userid']." and status = 'Item Received'  ") or die('Error: ' . mysqli_error($con));
                                                    if(mysqli_num_rows($squery) > 0)
                                                    {
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['item_id'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donation_type'].'</td>
                                                                <td>'.$row['quantity_item'].'</td>
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

                                        <div id="disapproved" class="tab-pane">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Item ID</th>
                                                        <th>Donor ID</th>
                                                        <th>Type of Donation</th>
                                                        <th>Total Item</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $squery = mysqli_query($con, "SELECT * FROM item p left join donor r on r.id = p.donor_id where r.id = ".$_SESSION['userid']." and status = 'Item Not Received'  ") or die('Error: ' . mysqli_error($con));
                                                    if(mysqli_num_rows($squery) > 0)
                                                    {
                                                        while($row = mysqli_fetch_array($squery))
                                                        {
                                                            echo '
                                                            <tr>
                                                                <td>'.$row['item_id'].'</td>
                                                                <td>'.$row['donor_id'].'</td>
                                                                <td>'.$row['donation_type'].'</td>
                                                                <td>'.$row['quantity_item'].'</td>
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
                                    <?php include "req_modal.php";?>
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
            if(!isset($_SESSION['Donor']))
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