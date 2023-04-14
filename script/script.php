<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  $to = 'dylan.sauvat@laplateforme.io';
  $subject = 'Nouveau message depuis le formulaire de contact';

  $headers = array(
    'From: ' . $name . ' <' . $email . '>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
  );

  $body = 'Nom : ' . $name . "\n\n" .
          'Email : ' . $email . "\n\n" .
          'Téléphone : ' . $phone . "\n\n" .
          'Message : ' . $message;

  if (mail($to, $subject, $body, implode("\r\n", $headers))) {
    http_response_code(200);
    echo 'success';
  } else {
    http_response_code(500);
    echo 'error';
  }


}

?>
