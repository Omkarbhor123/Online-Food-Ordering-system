<?php
//include constants.php file here 
include('../config/constants.php');
//get the id of the admin to be deleted

$id = $_GET['id'];
// create sql query to delete admin

$sql = "DELETE FROM tbl_admin WHERE id = $id";

//Execute the query 

$res = mysqli_query($conn,$sql);
// redirect to manage admin page with message (success/error)

//check whether the query executed successfullly or not

if($res==TRUE)
{
    //Query executed successfully and admin deleted
    // echo "Admin deleted";

    //create session variable to display message 
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //failed to delete admin

    // echo "Failed to delete admin";
    $_SESSION['delete']="<div class='error'>Failed to Delete Admin . try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

?>