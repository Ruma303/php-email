    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true); //? Assegnare true abilita le eccezioni

    try {
        //* Impostazioni server
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'Your username';
        $mail->Password = 'Your password';

        //? Headers
        $mail->setFrom('pinco@mittente.com', 'Nome mittente'); // Mittente
        $mail->addAddress('pallino@destinatario.com', 'Nome destinatario 1'); // Destinatario 1
        $mail->addAddress('tizio@example.com');  // Destinatario 2, il nome è opzionale
        $mail->addReplyTo('caio@example.com');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        //? Allegati
        $mail->addAttachment('./img/pizza-small.png'); // Allegato 1
        $mail->addAttachment('./img/roma.jpg', 'Immagine di Roma'); // Allegato 2, il nome è opzionale

        //? Contenuti
        $mail->isHTML(true); // Imposta il formato dell'email a HTML
        $mail->Subject = 'Oggetto della mail'; // Oggetto mail
        $mail->Body    = '<h1>Corpo della mail</h1>'; // Corpo della mail
        $mail->AltBody = 'Contenuto in plain text per mail clients non-HTML'; // Corpo alternativo

        $mail->send(); // Invio email

        echo 'Messaggio inviato';
    } catch (Exception $e) {
        echo "Messaggio non inviato: {$mail->ErrorInfo}";
    }

