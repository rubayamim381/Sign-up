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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
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

      <!-- Discover Our Story starts-->
      <section class="discover-our-story" style="height: 120vh; width: 100%; margin: 15.5rem 0 0rem;">
        <div class="container">
          <div class="restaurant-info">

            <!-- Restaurant description -->
            <div class="restaurant-description padding-right animate-left">
              <div class="global-headline">
                <h2 class="sub-headline">
                  <span class="first-letter">D</span>iscover
                </h2>
                <h1 class="headline headline-dark">Create your account</h1>
                <div class="asterisk"><i class="fas fa-asterisk"></i></div>
              </div>

              <p>
                Create your account. It's free and only takes a minute.<br>
                Already have an account?
              </p>
              <a href="login.php" class="btn body-btn">Login</a> <!-- About us -->
            </div>


              <div class="signup-form animate-right">
                  <form method="post">
              		<!-- <h2>Register</h2>
              		<p class="hint-text">Create your account. It's free and only takes a minute.</p> -->

                      <!-- <div class="form-group">
              			<div class="row">
              				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
              				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
              			</div>
                      </div> -->

                      <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" id="name" required>
                      </div>


                      <div class="form-group">
                      	<input type="email" class="form-control" name="email" placeholder="Email" id="email" required>
                      </div>


              		<div class="form-group">
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password"  required>
                      </div>


              		<!-- <div class="form-group">
                          <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                      </div>


                      <div class="form-group">
              			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
              		</div> -->


              		<div class="form-group">
                          <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
                      </div>

                      <div class="message">
                        <?php
                        echo $msg;
                        ?>
                      </div>

                  </form>

              	<!-- <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div> -->

              </div>

          </div>
        </div>
      </section>
    <!-- Discover Our Story ends-->





    <footer>
      <div class="container">
        <div class="back-to-top">
          <a href="#hero"><i class="fas fa-chevron-up"></i></a>
        </div>
        <div class="footer-content">
          <div class="footer-content-about animate-top">
            <h4>About Rosa</h4>
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
