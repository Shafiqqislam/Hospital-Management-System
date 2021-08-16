<?php include "../model/Database.php" ?>

<?php 
  //session_start();
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:./pharmacist-login.php");
  }
  $data = $db->displayRecord("medicine");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/admin-nav.css" />
    <link rel="stylesheet" href="./css/admin.css" />
    <title>Show Medicine</title>
    <link rel="icon" href="./images/hms.svg">
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
                        <a href="#"><?php echo $_SESSION['username'];?></a>  <li><a href="./logout.php">Logout</a></li>
                        <ul>
                          
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <?php $uid=$_SESSION['id']; ?>
    <div class="admin-wrapper">
        <!-- Left Sidebar -->
        <div class="left-sidebar">

            <ul>

                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="add-medicine.php">Add Medicine</a></li>
                <li><a href="sell-medicine.php">Sell Medicine</a></li>
                <li><a href="show-medicine.php">Show Medicine</a></li>
                <li><a href="../controller/update-profile.php?editid=<?php echo $uid; ?>">Update Profile</a></li>
            </ul>
        </div>
        <div class="admin-content">
            <div class="content">
                <h2 class="page-title">Manage Pharmacist</h2>
                <input type="text" name="search" onkeyup="showMedicine()" class="search-bar search-input" id="mname"
                    placeholder="Search">

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Medicine Name</th>
                        <th>Generic</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Images</th>
                        <th colspan="2" class="th-action">Action</th>
                    </thead>
                    <tbody id="table-data">

                    </tbody>
                </table>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <script>
    function fetchData() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table-data").innerHTML = this.responseText;
            } else {
                document.getElementById("table-data").innerHTML = this.status;
            }
        };
        xhttp.open("GET", "./load.php", true);
        xhttp.send();

    }
    fetchData()

    function showMedicine() {
        var mname = document.getElementById("mname").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table-data").innerHTML = this.responseText;
            } else {
                document.getElementById("table-data").innerHTML = this.status;
            }
        };
        xhttp.open("POST", "./search.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("mname=" + mname);
    }
    </script>
</body>

</html>