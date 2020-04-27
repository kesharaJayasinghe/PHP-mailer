<?php
$result = "";

if (isset($_post['submit'])) {
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Username = 'your-email-address';
  $mail->Password = 'your password'; // generate an application specific password for more security.

  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('your-email-address');
  $mail->addReplyTo($_POST['email'], $_POST['name']);

  $mail->isHTML(true);
  $mail->Subject = 'Form Suubmission: ' . $_POST['subject'];
  $mail->Body = '<h1 align=center>Name :' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . $_POST['msg'] . '</h1>';

  if (!$mail->send()) {
    $result = "Opps!! Something went wrong. Please try again.";
  } else {
    $result = "Thank you " . $_POST['name'] . " for contacting me. I'll get back to you soon!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="main.css" />
</head>

<body>
  <header>
    <div class="header-text">
      <h1>Contact Form</h1>
      <h6>With PHPMailer</h6>
      <h3 class="sdwn">Scroll down to view contact form</h3>
    </div>
  </header>

  <!-- ******Contact Form****** -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="section-heading">
        <h1>Contact</h1>
        <h6>Contact for more information</h6>
      </div>
      <form action="">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your name" required />
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required />
        <label for="subject">Subject</label>
        <input type="text" name="subject" class="form-control" placeholder="Enter subject" required />
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" placeholder="Write your message" cols="10" rows="10" required></textarea>
        <input type="submit" name="submit" id="submit" value="send" />
      </form>
      <div>
        <h5><?= $result; ?></h5>
      </div>
      <!-- Contact PopUp -->
      <div id="cntpop" class="cntpop">
        <!-- popup content -->
        <div class="cntpop-content">
          <span class="close">&times;</span>
          <p><?= $result; ?></p>
        </div>
      </div>
  </section>
</body>

</html>