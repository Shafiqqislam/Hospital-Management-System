<?php
    include "../model/Database.php";
    $db = new Database();
    $deleteid = $_REQUEST['deleteid'];
    $delete = $db->delete($deleteid,"medicine");
    if($delete)
    {
        echo "<script>alert('Deleted succesfully');</script>";
        echo "<script>window.location.href = '../views/show-medicine.php';</script>";
    }
    else{
        echo "<script>alert('Database Empty!');</script>";
        echo "<script>window.location.href = '../views/show-medicine.php';</script>";
    }
?>