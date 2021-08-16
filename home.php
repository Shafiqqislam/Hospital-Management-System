<?php include "./model/cookies.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./views/css/style.css" />
    <link rel="stylesheet" href="./views/css/admin-nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="./views//images//hms.svg" type="image/x-icon">
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Home</title>
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1>Hospital Management System</h1>
      </div>
      <div class="navigation">
        <nav class="menu">
          <ul id="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="./views/pharmacist-login.php">Login</a> </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="banner-area" id="home">
      <div class="canvas">
        <img src="./views/images/1.jpg" alt="" />
        <div class="title1">
          <h3>Caring for better life</h3>
          <h1>Caring for better life Leading the way in medical excellence</h1>
          <h3>
            Earth greater grass for good. Place for divide evening yielding them
          </h3>
          <h3>that. Creeping beginning over gathered brought.</h3>
         
        </div>
        <div class="apointment">
          <a href="./views/pharmacist-login.php">Make Appointment</a>
        </div>
      </div>
    </div>


    <div class="about" id="about">
      <div class="left-area">
        <h1>About Us</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
          cumque at tempora fuga magnam corrupti corporis obcaecati, inventore
          atque blanditiis perferendis harum quos est illo recusandae. Voluptate
          fuga consectetur nobis. Lorem ipsum dolor sit amet, consectetur
          adipisicing elit. Saepe, pariatur dolore debitis temporibus obcaecati
          magni voluptate ipsam minus autem placeat sunt, tempora atque, sint
          incidunt in delectus quos ipsa beatae!
        </p>
        <div class="button">
          <a href="">Read More</a>
        </div>
      </div>
      <div class="right-area">
        <img src="images/1.jpg" alt="" />
      </div>
    </div>

    <div class="service" id="service">
      <div class="container">
        <div class="service-title">
          <h1>Our Service</h1>
        </div>
        <div class="col33 grid1">
          <h2>1</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis enim
            soluta in qui culpa, eligendi molestiae quia voluptatibus iure sint
            neque aut aliquid autem temporibus recusandae beatae. Distinctio,
            reprehenderit consectetur!
          </p>
          <div class="service-button">
            <a href="">Read More</a>
          </div>
        </div>
        <div class="col33 grid2">
          <h2>2</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis enim
            soluta in qui culpa, eligendi molestiae quia voluptatibus iure sint
            neque aut aliquid autem temporibus recusandae beatae. Distinctio,
            reprehenderit consectetur!
          </p>
          <div class="service-button">
            <a href="">Read More</a>
          </div>
        </div>
        <div class="col33 grid3">
          <h2>3</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis enim
            soluta in qui culpa, eligendi molestiae quia voluptatibus iure sint
            neque aut aliquid autem temporibus recusandae beatae. Distinctio,
            reprehenderit consectetur!
          </p>
          <div class="service-button">
            <a href="">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="emergency" >
      <div class="container">
        <div class="inner-content">
          <h2>Emergency hotline</h2>
          <h1>(+01) – 256 567 550</h1>
          <p>
            We provide 24/7 customer support. Please feel free to contact us for
            emergency case.
          </p>
        </div>
      </div>
    </div>
   

        <footer style="background-color: rgb(165, 24, 24);color:white;padding:30px">
          <p style="text-align: center;">Copyright 1999-2021 by hms. All Rights Reserved.</p>
        </footer>
<script src="./views/js/script.js"></script>
  </body>
</html>
