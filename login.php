<?php
include('server.php');

$msg='';
if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];

  $result=mysqli_query($con, "SELECT * from user where email='$email'");
  $check=mysqli_num_rows($result);
  if ($check>0) {
    $msg="Email is already existed.";
  }else{
    $varification_id = rand(111111111,999999999);

    mysqli_query($con, "INSERT into user(name,email,password,varification_id, varification_status) values('$name','$email','$password','$varification_id',0)");

    $msg="We just sent you a varification link to <strong>$email</strong>. Please check your inbox and click on the link to get started. If you don't find the link please, request a new one.";

    $mailHtml = "Please, confirm your acount registration by clicking the button or link below: <a href='http://localhost/Email%20varification%20with%20SMTP/check.php?id=$varification_id'>http://localhost/Email%20varification%20with%20SMTP/check.php?id=$varification_id</a>";

    smtpMailer($email,'Verification Code',$mailHtml);
  }
}
function smtpMailer($toMail, $subject, $body){
  include "smtp\class.phpmailer.php";

  $mail= new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPDebug = 1;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.sendgrid.net';
  $mail->Port = 587; //587
  $mail->IsHTML(true);
  $mail->CharSet= 'UTF-8';
  $mail->Username = 'programminglife3@gmail.com';
  $mail->Password = 'Mim85530381';
  $mail->SetFrom("programminglife3@gmail.com");
  // $mail->SMTPOptions=array('ssl'=>array(
  //   'verify_peer'=>false,
  //   'verify_peer_name'=>false,
  //   'allow_self_signed'=>false,
  // ));

  //$mail->addAttachment("example.pdf");
  $mail->Subject = $subject;
  $mail->Body= $body;
  $mail->AddAddress($toMail);

  if (!$mail->Send()) {
    return 0;
  }else {
    return 1;
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create your account</title>
    <!--Font awesome CDN-->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body class="oen">

    <header>
      <div class="container">

        <!--Navigation Bar starts-->
        <nav class="nav">
          <div class="menu-toggle">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times"></i>
          </div>

            <!--Navigation Bar logo-->
          <a href="web.html" class="logo"><img src="images/nasalogo.png" alt=""></a>

            <!--Navigation Bar Lists e.g. menu, home etc-->
          <ul class="nav-list" onclick="myFunction(e)">
            <li class="nav-item">
              <a href="web.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Quiz</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Learn</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">News</a>
            </li>
            <li class="nav-item">
              <a href="signup.php" class="nav-link active">Login/Create Account</a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">Contact</a>
            </li> -->
          </ul>
            <!--Completing Navigation Bar lists-->
        </nav>
          <!--Navigation Bar ends-->


      </div>
    </header>
      <!--Header ends-->

      <!-- nasahero starts -->
      <section class="hero" id="hero">


        <div class="container">
          <h1 class="headline">The Space Explorer</h1>
          <div class="headline-description">
            <div class="separator">
              <div class="line line-left"></div>
              <div class="asterisk"><i class="fas fa-asterisk"></i></div>
              <div class="line line-right"></div>
            </div>
            <div class="single-animation">
              <h5>Ready to Explore</h5>
              <a href="#" class="btn cta-btn">Learn</a>
            </div>
          </div>
        </div>
      </section>
      <!-- hero ends -->

      <!-- Create your account starts-->
      <section class="discover-our-story">
        <div class="container">
          <div class="restaurant-info">

            <!-- account description -->
            <div class="restaurant-description padding-right animate-left">
              <div class="global-headline">
                <h2 class="sub-headline">
                  <span class="first-letter">D</span>iscover
                </h2>
                <h1 class="headline headline-dark">Login your account</h1>
                <div class="asterisk"><i class="fas fa-asterisk"></i></div>
              </div>

              <p>
                Login your account and explore the heaven of the beautiful space.<br>
                Don't have any account?
              </p>
              <a href="signup.php" class="btn body-btn">Click here to signup</a> <!-- About us -->
            </div>
            </div>

          <!-- Signup form option -->
          <div class="login-box animate-right">
            <div class="left">
              <h1>Login</h1>

              <input type="text" name="email" placeholder="E-mail" />
              <input type="password" name="password" id="password" placeholder="Password" />

              <input type="submit" name="submit" value="login" />
            </div>
            <div class="right">
              <br><br><br>
              <button class="social-signin facebook">Log in with facebook</button>
              <button class="social-signin twitter">Log in with Twitter</button>
              <button class="social-signin google">Log in with Google+</button>
            </div>
            <div class="or">OR</div>
          </div>
        </div>
      </section>
    <!-- Create your account ends-->





    <footer>
      <div class="container">
        <div class="back-to-top">
          <a href="#hero"><i class="fas fa-chevron-up"></i></a>
        </div>
        <div class="footer-content">
          <div class="footer-content-about animate-top">
            <h4>About Space Explorer</h4>
            <div class="asterisk"><i class="fas fa-asterisk"></i></div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>

          <div class="footer-content-divider animate-bottom">

            <div class="media">
              <h4>Follow along</h4>
              <ul class="social-icons">
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-tripadvisor"></i></a>
                  </li>
              </ul>
            </div>

            <div class="newsletter-container">
              <h4>NewsLetter</h4>
              <form class="newsletter-form" action="">
                <input type="text" class="newsletter-input" placeholder="Your email address..." name="" value="">
                <button class="newsletter-btn" type="submit">
                  <i class="fas fa-envelope"></i>
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </footer>

<script src="main.js"></script>
  </body>
</html>
