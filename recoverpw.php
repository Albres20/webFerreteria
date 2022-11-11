<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);
    try {
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $pass = substr(md5(microtime()), 1, 10);
            $passhash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
            $email = $_POST['email'];

            //Conexion con la base
            $conn = new mysqli("localhost", "root", "", "hyt_trading");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "Update usuarios Set password='$passhash' Where email='$email'";

            if ($conn->query($sql) === TRUE) {
                echo "usuario modificado correctamente <br>";
            } else {
                echo "Error modificando: " . $conn->error;
            }

            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'hytserviceA@gmail.com';                     //SMTP username
            $mail->Password   = 'tbsqxbwywaplphax';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('hytserviceA@gmail.com', 'HyTSupport');
            $mail->addAddress($_POST['email'], 'Usuario');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'HyT-Trading - Recordar contraseña';
            
            $cuerpo ='
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="x-apple-disable-message-reformatting">
            <title></title>
            <style>
                table,
                td,
                div,
                h1,
                p {
                    font-family: Arial, sans-serif;
                }
            </style>
            </head>

            <body style="margin:0;padding:0;">
                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                    <tr>
                        <td align="center" style="padding:0;">
                            <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                                <tr>
                                    <td align="center" style="padding:40px 0 30px 0;background:#212549;">
                                        <img src="https://hyt-trading.com/wp-content/uploads/2021/03/nosotros-banner-2.2.png" alt="" width="150" style="height:auto;display:block;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:36px 30px 42px 30px;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                <td style="padding:0 0 36px 0;color:#153643;">
                                                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Recordar Contraseña</h1>
                                                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Buen día, usuario.</p>
                                                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Acaba de solicitar reestablecer su contraseña. Por lo tanto el sistema le asignó una contraseña temporal que es la siguiente :</p>
                                                    <p align="center" style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><strong>'.$pass.'</strong></p>
                                                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Por favor ingresar al sistema con esta contraseña y le recomendamos actualizar esta contraseña.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:30px;background:#d66e0c;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                            <tr>
                                                <td style="padding:0;width:50%;" align="left">
                                                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                                        &reg; Lima, Perú 2022<br/>
                                                    </p>
                                                </td>
                                                <td style="padding:0;width:50%;" align="right">
                                                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                                        <tr>
                                                            <td style="padding:0 0 0 10px;width:38px;">
                                                                <a href="https://www.facebook.com/hyttecnologia" target="_blank" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            </html>
            ';

            // $mail->Body    = 'El sistema le asigno la siguiente clave: '. $pass;
            //$mail->msgHTML(file_get_contents('correo_recordarpass.html'), dirname(__FILE__)); 
            $mail->Body    = $cuerpo;
            $mail->send();
            $mail->ClearAddresses();
            echo 'Correo enviado satisfactoriamente a ' . $_POST['email'].'<br>';
            echo 'Regresar a <a href="login" class="text-muted ms-1"><b>Iniciar Sesión</b></a>';
        } else
            echo 'Informacion incompleta';
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

?>