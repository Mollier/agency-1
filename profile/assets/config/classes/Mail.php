<?php


class Mail
{
    public function __construct()
    {
        $this->message = new Alert();
    }
    function sendMail() {

     // Plusieurs destinataires
     $to  = 'teddy.boirin@bai-bao.fr'; // notez la virgule

     // Sujet
     $subject = strip_tags(trim($_POST['object']));
     $name = strip_tags(trim($_POST['name']));
     $mail = strip_tags(trim($_POST['mail']));
      $message = str_replace("\n", '<br/>', strip_tags($_POST['message']));

  if(!empty($subject) OR !empty($name) OR !empty($mail) OR !empty($message)) {
      // message
      $message = '
    <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>'.$subject.' de '.$name.'</title>

      </head>
      <body>
      <div>
      <h1 style="font-size: 20px;color: black;">'.$subject.' de '.$name.' ('.$mail.')</h1>
       <p>'.$message.'</p>
       </div>
      </body>
     </html>
     ';


      // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';

      // En-têtes additionnels
      $headers[] = 'To: Baï-Bao <teddy.boirin@bai-bao.fr>';
      $headers[] = 'From: '.$name.' <'.$mail.'>';

      // Envoi
      mail($to, $subject, $message, implode("\r\n", $headers));
      $this->message->createAlert("Votre message a été envoyé !", 'green');
  } else {
      $this->message->createAlert("Veuillez remplir tout les champs", 'red');
  }
    }


}