<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer/src/Exception.php";
require "./PHPMailer/src/PHPMailer.php";
require "./PHPMailer/src/SMTP.php";

$email_owner = "";
$email_pass = "";

$site_name = "Bikcraft";
$site_url = "www.bikcraft.com";

$host_smtp = "";
$host_port = "";


$email = $_POST["email"];
$name = $_POST["name"];

$body_content = "";
foreach( $_POST as $field => $value) {
  if( $field !== "leaveblank" && $field !== "dontchange" && $field !== "sendmail") {
    $sanitize_value = filter_var($value, FILTER_SANITIZE_STRING);
    $body_content .= "$field: $value \n";
  }
}

$notbot = ($_POST["leaveblank"] === "") || ($_POST["dontchange"] === "http://");

if ($notbot) {

$mail = new PHPMailer(true);

try {
  $mail->CharSet = "UTF-8";
  
  $mail->isSMTP();
  $mail->Host = $host_smtp;
  $mail->SMTPAuth = true;
  $mail->Username = $email_owner;
  $mail->Password = $email_pass;
  $mail->Port = $host_port; 
  $mail->SMTPSecure = "tsl";
  
  $mail->setFrom($email_owner, "Contact form - ". $name);
  $mail->addAddress($email_owner, $site_name);
  $mail->addReplyTo($email, $name);
  
  $mail->WordWrap = 70;
  $mail->Subject = "Contact form - " . $site_name . " - " . $name;
  $mail->Body = $body_content;
  
  $mail->send();
?>

  <html>
    <head>
      <title>Success!</title>
      <meta http-equiv="refresh" content="10;URL="./"">
    </head>
    <body>
      <!-- Success Message -->
      <div class="form-content" id="form-send">
        <h2>Success!</h2>
        <p>I will contact you soon.</p>
      </div>
    </body>
  </html>

<?php } catch (Exception $e) { ?>

  <html>
    <head>
      <title>An error occurred</title>
      <meta http-equiv="refresh" content="10;URL="./"">
    </head>
    <body>
      <!-- Error Message -->
      <div class="form-content" id="form-error">
        <h2>An error occurred!</h2>
        <p>An error ocurred, please send your message to batheus.dev@gmail.com or get in touch through my social networks.</p>
      </div>
    </body>
  </html>

<?php
  }}
?>