<?php include "../model/Database.php" ?>
<?php 
 
$db = new Database();
  if(isset($_POST['submit']))
  {
    $login = $db->loginRecord($_POST,"pharmacists");
    if($login)
    {
      echo "<script>alert('Login succesful');</script>";
      echo "<script>window.location.href = './dashboard.php';</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Pharmacist Login</title>
    <link rel="icon" href="./images/hms.svg">
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1 class="head"><a href="../home.php">Hospital Management System</a> </h1>
      </div>
      <div class="navigation">
        <nav class="menu">
          <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="./registration.php">Registration</a></li>
            
          </ul>
        </nav>
      </div>
    </header>
    <?php
    require '../model/dbinsert.php';
  
      $username = $password =$email=$address=$phone=$gender= "";
      $usernameErr = $passwordErr =$emailErr=$addressErr=$phoneErr=$genderErr= "";
      $isValid = true;
       $successfulMessage = $errorMessage = "";

      
        if($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

       session_start();
	    	$_SESSION['username'] = $username;
	     	$_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['phone'] = $phone;
        $_SESSION['gender'] = $gender;

        if(empty($username)) {
         $usernameErr = "Field can not be empty";
      $isValid = false;
       }
       if(empty($password)) {
        $passwordErr = "Field can not be empty";
        $isValid = false;
       }
       if(empty($email)) {
        $emailErr = "Field can not be empty";
        $isValid = false;
       }
       if(empty($address)) {
        $addressErr = "Field can not be empty";
        $isValid = false;
       }
       if(empty($phone)) {
        $phoneErr = "Field can not be empty";
        $isValid = false;
       }
       if(empty($gender)) {
        $genderErr = "Field can not be empty";
        $isValid = false;
       }

       if ($isValid) {
         $res=register($username,$password,$email,$address,$phone,$gender);

         if($res) {
          $errorMessage = "saving error";
         }
         else {
        $successfulMessage = "Sucessfully saved";
        }
       }
}


        function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
        return $data;
}

?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <!-- <fieldset>
      <legend>Register</legend> -->

      <label for="username">User Name:</label>
      <input type="text" name="username" id="username" >
       <span style="color: red;">  <?php echo  $usernameErr;?></span>
      <br><br>

      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
       <span style="color: red;">  <?php echo  $passwordErr;?></span>
      <br><br>
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
      <span style="color: red;">  <?php echo  $emailErr;?></span>
      <br><br>
      <label for="address">Address</label>
      <input type="text" name="address" id="address">
      <span style="color: red;">  <?php echo  $addressErr;?></span>
      <br><br>
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone">
      <span style="color: red;">  <?php echo  $phoneErr;?></span>
      <br><br>
      <label for="gender">Gender</label>
      <input type="radio" name="gender" value="Male" id="gender">Male
      <input type="radio" name="gender" value="Female" id="gender">Female
      <span style="color: red;">  <?php echo  $genderErr;?></span>
      <br>
      <input type="submit" name="submit" value="Register">
  </form>
  <br>
   <p style="color:green" > <?php echo  $successfulMessage;?></p>
  <p style="color: red" > <?php echo  $errorMessage;?>   </p>
  <br>
  <a href="./pharmacist-login.php">Click to login</a>
</body>
</html>
