<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact@bcools.me";
    $email_subject = "Contact - CB";

    function died($error) {
        // your error code can go here
        echo "Nous sommes désolé, mais il y a eu des erreurs avec le formulaire que vous avez soumis. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Veuillez revenir en arrière et corriger ces erreurs.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Nous sommes désolés, mais il semble y avoir un problème avec le formulaire que vous avez soumis.');
    }



    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'L\'adresse électronique que vous avez saisie ne semble pas être valide.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Le prénom que vous avez entré ne semble pas être valide.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Le nom de famille que vous avez entré ne semble pas être valide.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'Le message que vous avez entré ne semblent pas être valide.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->
<html>
<head>
<title>Message envoyé</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<style>
.error-template {padding: 200px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>
</head>
<body>

  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="error-template">


          				<a style="height: 60px" "width: 60px" href="http://bcools.me"><img src="http://bcools.me/img/LogoError.png"></a>

                  <h2>Message envoyé, merci !</h2>
                  <div class="error-details">
                      <h4>Je reviendrai vers vous dans les plus brefs délais.</h4>
                  </div>
                  <div class="error-actions">
                      <a href="http://bcools.me" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                          Retour sur Bcools.me </a>
                  </div>
              </div>
          </div>
      </div>
  </div>



<!--<div class="col-md-6">
  <br>
<div class="alert alert-success">
  <strong>Message envoyé!</strong> Je reviendrai vers vous dans les plus brefs délais.
</div>

<a class="btn btn-primary" href="http://cools-baptiste.be">Retour au site web</a>
</div>-->

</body>
</html>
<?php

}
?>
