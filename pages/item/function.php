<?php
if(isset($_POST['btn_add'])){
    $txt_item = $_POST['txt_item'];
    $txt_donation = $_POST['txt_donation'];
    $txt_no = $_POST['txt_no'];
    $txt_donor = $_POST['txt_donor'];

    if($_SESSION['role'] == "donor")
    {
    $query = mysqli_query($con,"INSERT INTO item (item_id,donor_id,donation_type,quantity_item,status) 
        values ('$txt_item', '$txt_donor', '$txt_donation', '$txt_no','Item Pickup')") or die('Error: ' . mysqli_error($con));
    }
    else
    {
      $query = mysqli_query($con,"INSERT INTO item (item_id,donor_id,donation_type,quantity_item,status) 
      values ('$txt_item', '$txt_donor', '$txt_donation', '$txt_no','New')") or die('Error: ' . mysqli_error($con));
    }
    if($query == true)
    {
        $_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}

if(isset($_POST['btn_req'])){
    $txt_item = $_POST['txt_item'];
    $txt_donation = $_POST['txt_donation'];
    $txt_no = $_POST['txt_no'];

    $reqquery = mysqli_query($con,"INSERT INTO item (item_id,donor_id,donation_type,quantity_item,status) 
    values ('$txt_item','".$_SESSION['userid']."', '$txt_donation', '$txt_no','New')") or die('Error: ' . mysqli_error($con));

    if($reqquery == true)
    {
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}

if(isset($_POST['btn_approve']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_donation = $_POST['txt_donation'];
    $txt_no = $_POST['txt_no'];

    $approve_query = mysqli_query($con,"UPDATE item set donation_type = '".$txt_donation."', quantity_item = '".$txt_no."', status = 'Item Received'  where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_disapprove']))
{
    $txt_id = $_POST['hidden_id'];

    $disapprove_query = mysqli_query($con,"UPDATE item set status = 'Item Not Received'  where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_busname = $_POST['txt_edit_busname'];
    $txt_edit_busadd = $_POST['txt_edit_busadd'];
    $ddl_edit_tob = $_POST['ddl_edit_tob'];
    $txt_edit_ornum = $_POST['txt_edit_ornum'];
    $txt_edit_amount = $_POST['txt_edit_amount'];

    $update_query = mysqli_query($con,"UPDATE tblpermit set businessName = '".$txt_edit_busname."', businessAddress = '".$txt_edit_busadd."', typeOfBusiness= '".$ddl_edit_tob."', orNo = '".$txt_edit_ornum."', samount = '".$txt_edit_amount."'  where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update Permit with business name of '.$txt_edit_busname;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblpermit where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>