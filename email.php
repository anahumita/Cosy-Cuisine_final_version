<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->CharSet = "utf-8"; // Set charset to utf8
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted

        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->Port = 587; // TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isHTML(true); // Set email format to HTML

        $mail->Username = 'anamh2003@gmail.com'; // SMTP username
        $mail->Password = 'roxg ylzl wzbb uldb'; // SMTP password

        $mail->setFrom('anamh2003@gmail.com', 'John Smith'); // Your application NAME and EMAIL

        $mail->Subject = 'Test Test'; // Message subject
$mail->Body .= "
                <div style='margin-top: 20px;'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr height='20'>
                            <td  class='fontkink1'><b>Product Name:</b></td>
             
                        </tr>
                        <tr height='20'>
                            <td  class='fontkink1'><b>Product Price:</b></td>
                     
                        </tr>
                    </table>
                </div>
                    <div style='margin-top: 20px;'>
                            <p><b>Vă mulțumim pentru comanda dumneavoastră!</b></p>
                        </div>
            ";

        $mail->addAddress('ana.humita03@e-uvt.ro', 'John Smith'); // Target email

        // Attempt to send the email
        if ($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message could not be sent.';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
