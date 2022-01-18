<?php
if(isset($_POST['btn_add'])){
    $txt_rider = $_POST['txt_rider'];
    $txt_name = $_POST['txt_name'];
    $txt_phone = $_POST['txt_phone'];
    $txt_uname = $_POST['txt_uname'];
    $txt_pass = $_POST['txt_pass'];

    $su = mysqli_query($con,"SELECT * from rider where username = '".$txt_uname."' ");
    $ct = mysqli_num_rows($su);

    if($ct == 0){
        $query = mysqli_query($con,"INSERT INTO rider (rider_id,name,phone_number,username,password) 
            values ('$txt_rider', '$txt_name', '$txt_phone','$txt_uname', '$txt_pass')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        } 
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}

if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_rider = $_POST['txt_edit_rider'];
    $txt_edit_name = $_POST['txt_edit_name'];
    $txt_edit_phone = $_POST['txt_edit_phone'];
    $txt_edit_uname = $_POST['txt_edit_uname'];
    $txt_edit_pass = $_POST['txt_edit_pass'];

    $su = mysqli_query($con,"SELECT * from rider where username = '".$txt_edit_uname."' and id not in (".$txt_id.") ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){
        $update_query = mysqli_query($con,"UPDATE rider set rider_id = '".$txt_edit_rider."', name = '".$txt_edit_name."', phone_number = '".$txt_edit_phone."', username = '".$txt_edit_uname."', password = '".$txt_edit_pass."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

        if($update_query == true){
            $_SESSION['edited'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblzone where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}
?>