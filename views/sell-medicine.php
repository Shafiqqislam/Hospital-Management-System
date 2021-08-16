<?php include "../model/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:./pharmacist-login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Admin Styling -->
    <link rel="stylesheet" href="./css/admin-nav.css" />
    <link rel="stylesheet" href="./css/admin.css" />
    <link rel="stylesheet" href="./css/pharmacist.css">
    <title>Sell Medicine</title>
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
                <h2 class="page-title">Sell Medicine</h2>

                <div class="search-btn">
                    <div>
                        <input type="text" class="text-inputMedium" placeholder="Search medicine...">
                    </div>

                    <div>
                        <button name="search" class="btn btn-big search">Search</button>
                    </div>
                </div>

                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                    <td>
                        Medicine
                        <select name="Medicine">
                        <option value="">Napa</option>
                        <option value="">Ace</option>
                        <option value="">Alatrol</option>
                        <option value="">Vitabion</option>
                        <option value="">Aceclofenac. Flexi® NSAIDs.</option><br>
                        </select>
                    </td>
                        <td>

                            <span onclick="decrease()" class="minus">-</span>
                            <input type="text" value="1" id="product" class="searchinput" />
                            <span onclick="increase()" class="plus">+</span>


                        </td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td> <a href="./checkout.php" class="btn btn-big">Continue</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<!-- javascript plus minus -->

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

function increase() {

    quan = document.getElementById("product").value;
    var a = parseInt(quan)

    document.getElementById("product").value = a + 1;
}
function decrease() {
    quan = document.getElementById("product").value;
    var a = parseInt(quan)
    document.getElementById("product").value = a - 1;
    a--

    if (a <= 1) {

        document.getElementById("product").value = 1;
    }
}
</script>
