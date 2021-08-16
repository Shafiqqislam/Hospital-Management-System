<?php include "../model/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../views/pharmacist-login.php");
  }
  $currentUser=$_SESSION['id'];
if(isset($_POST['update']))
{
    $update=$db->updateSingleRecord($_POST,"pharmacists",$currentUser);
    if($update)
    {
        echo "<script>alert('Updated succesfully');</script>";

        echo "<script>window.location.href = 'update-profile.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../views/css/admin-nav.css" />
    <link rel="stylesheet" href="../views/css/admin.css" />

    <title>Update Profile</title>
    <link rel="icon" href="../views/images/hms.svg">
</head>

<body>
    <header class="header-area">

        <div class="title">
            <h1>Hospital Management System</h1>
        </div>
        <div class="navigation">
            <nav class="menu">
                <ul>
                    <li>
                        <a href="#"><?php echo $_SESSION['username'];?></a> <li><a href="../views/logout.php">Logout</a></li>
                        <ul>
                           
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?php  ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <ul>
                <li><a href="../views/dashboard.php">Dashboard</a></li>
                <li><a href="../views/add-medicine.php">Add Medicine</a></li>
                <li><a href="../views/sell-medicine.php">Sell Medicine</a></li>
                <li><a href="../views/show-medicine.php">Show Medicine</a></li>
                <li><a href="../controller/update-profile.php?editid=<?php echo $currentUser; ?>">Update Profile</a></li>
            </ul>
        </div>
        <!-- // Left Sidebar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="content">
                <h2 class="page-title">Update Profile</h2>
        <?php
                    
         $data = $db->displaySingleRecord("pharmacists",$currentUser);
        if($data)
         {
        foreach($data as $value)
              {
            ?>
<form action="update-profile.php" method="post" name="pharmacistform" onsubmit="return Pharmacistvalidate()">
    <div>
    <label>Username</label>
    <input type="text" name="username" class="text-input"value="<?php echo $value['username']; ?>" />
   </div>
   <div>
   <label>Email</label>
    <input type="text" name="email" class="text-input" value="<?php echo $value['email']; ?>" />
   </div>
   <div>
   <label>Address</label>
   <input type="text" name="address" class="text-input" value="<?php echo $value['address']; ?>" />
    </div>
     <div>
    <label>Phone Number</label>
     <input type="text" name="phone" class="text-input" value="<?php echo $value['phone']; ?>" />
     </div>
     <div>
   <label>Gender</label>
   <select name="gender" class="text-input">
  <option value="NULL">-- Select Gender --</option>
    <option value="Male" <?php
        if($value['gender']=="Male")
        {
        echo "selected";
        }
        ?>>Male</option>
                            <option value="Female" <?php
        if($value['gender']=="Female")
        {
            echo "selected";
        }
        ?>>Female</option>
         </select>
        </div>
        <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input"
        value="<?php echo $value['password']; ?>" />
        </div>
        <div>
        <button type="submit" name="update" class="btn btn-big">Update</button>
        </div>
        </form>
        <?php } } ?>
        </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Page Wrapper -->
    <script src="../views/js/main.js"></script>
</body>

</html>