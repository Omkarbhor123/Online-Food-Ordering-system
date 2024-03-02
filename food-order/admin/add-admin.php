<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br><br>

<?php
if(isset($_SESSION['add'])) //checking whether the session is set or not
{
  echo $_SESSION['add'];//displaying session message if set
  unset($_SESSION['add']);//removing session message

}
?>


        <form action="" method="post" >

<table class="tbl-30">
    <tr>
       <td>Full Name:</td>
       <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
      
    </tr>
    <tr>
       <td>Username:</td>
       <td><input type="text" name="username" placeholder="Enter Your username"></td>
      
    </tr>
    <tr>
       <td>Password:</td>
       <td><input type="password" name="password" placeholder="Enter Your password"></td>
      
    </tr>
    <tr>
       <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary" ></td>
      
    </tr>
</table>



        </form>
    </div>
</div>


<?php include('partials/footer.php');?>

<?php 

//process the value from form and save in the database
//check wether the submit buttom is clicked or not

if(isset($_POST['submit']))
{
    // echo "button clicked";
    //get the data from form

    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password= md5($_POST['password']); //passward is encryption with md5

    //sql query to save the data into the database

    $sql = "INSERT INTO tbl_admin SET 
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

// Executing query and saving data into database
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

// check whether the (query is executed ) data is inserted or not and display appropriate message

if($res==TRUE)
{
    // data inserted
    // echo "data inserted";
    //create a session variable to display message

    $_SESSION['add'] = "Admin Added Successfullly";

    //redirect page to manage admin
    header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
    // faild to insert data
    // echo "faild to insert data";

    //create a session variable to display message

    $_SESSION['add'] = "Failed to Add Admin";

    //redirect page to ADD admin
    header("location:".SITEURL.'admin/add-admin.php');
}



}

?>