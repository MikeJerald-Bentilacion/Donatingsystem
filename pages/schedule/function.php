<?php
if(isset($_POST['btn_add'])){
    $txt_schedule = $_POST['txt_schedule'];
    $txt_date = $_POST['txt_date'];
    $txt_time = $_POST['txt_time'];
    $txt_donor = $_POST['txt_donor'];
    $txt_donor_info = $_POST['txt_donor_info'];
    $txt_rider = $_POST['txt_rider'];
    $txt_item = $_POST['txt_item'];

    if($_SESSION['role'] == "Administrator")
    {
        $query = mysqli_query($con,"INSERT INTO schedule (schedule_id,date,time,donor_id,donor_info,rider_id,item_id) 
        values ('$txt_schedule', '$txt_date', '$txt_time', '$txt_donor', '$txt_donor_info', '$txt_rider', '$txt_item')") or die('Error: ' . mysqli_error($con));
    }
    else
    {
      $query = mysqli_query($con,"INSERT INTO schedule (schedule_id,date,time,donor_id,donor_info,rider_id,item_id) 
      values ('$txt_schedule', '$txt_date', '$txt_time', '$txt_donor', '$txt_donor_info', '$txt_rider', '$txt_item')") or die('Error: ' . mysqli_error($con));
    }
    if($query == true)
    {
        $_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}

if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_schedule = $_POST['txt_edit_schedule'];
    $txt_edit_date = $_POST['txt_edit_date'];
    $txt_edit_time = $_POST['txt_edit_time'];
    $txt_edit_donor = $_POST['txt_edit_donor'];
    $txt_edit_donor_info = $_POST['txt_edit_donor_info'];
    $txt_edit_rider = $_POST['txt_edit_rider'];
    $txt_edit_item = $_POST['txt_edit_item'];

    $update_query = mysqli_query($con,"UPDATE schedule set schedule_id = '".$txt_edit_schedule."', date = '".$txt_edit_date."', time = '".$txt_edit_time."', donor_id = '".$txr_edit_donor."', donor_info = '". $txt_edit_donor_info."', rider_id = '".$txt_edit_rider."',  rider_id = '".$txt_edit_item."'  where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

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
            $delete_query = mysqli_query($con,"DELETE from schedule where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}
?>