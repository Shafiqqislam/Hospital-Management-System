 <?php
    $cookie_name = "users";
    $cookie_value = "username";
    setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
?> 
<?php
// $username="";
// if(!isset($_COOKIE["username"])){
// header("Location: ../views/pharmacist-login.php");
// }
?>