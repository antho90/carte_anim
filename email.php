<?php

if (!empty($_POST['email'])) {


    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"PrimFX.com"<support@primfx.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $to = $_POST['email'];
    if (filter_var($to, FILTER_VALIDATE_EMAIL)) {


        $subject = 'Vous avez reçu une carte de voeux';

        $message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
    body {
        margin: 0;
        background-color: #e4e4e4;
    }
    table {
        border-spacing: 0;
    }
    td {
        padding: 0;
    }
    img {
        border: 0;
        display: block;
    }
    a{
        color: #e4e4e4;
    }
    .wrapper{
        width: 100%;
        table-layout: fixed;
        background-color: #333333;
        padding-bottom: 40px;
    }

    .w {
        background-color:#e4e4e4 ;
    }
    
    .main{
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
        border-spacing: 0;
        font-family: sans-serif;
        color: #e4e4e4;
        background-color: #333333;
        height: 100vh;
    }
    .button{
        background-color: rgb(209, 68, 68);
        color: #e4e4e4;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 5px;
        font-weight: bold;
    }
</style>
</head>
<body>

    <center class="weapper">

        <table class="main" width="100%">

<!--EMAIL TITLE-->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="text-align: center;padding: 15px;">
                                <p style="font-size: 24px; font-weight: bold;">
                                    Tu as reçu une carte de voeux !!
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

<!-- BANNER IMAGE -->
            <tr>
                <td>
                    <img src="https://image.freepik.com/free-vector/various-santa-claus-character-gifts_23-2148789044.jpg" alt="bannière" width="600" style="max-width: 100%;">
                </td>
            </tr>


<!-- TITLE, TEXT & BUTTON -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                <td style="text-align: center;padding: 45px;">
                                    <p style="font-size: 18px; line-height: 24px; padding-bottom: 30px;">
                                    Clique sur ce bouton pour découvrir ta carte de voeux !
                                    </p>
                                    <a href="https://anthonyc541.promo-45.codeur.online/carte_anim/carte.html" class="button"><strong style="color: #e4e4e4;font-size: 24px">Voir la carte de voeux</strong></a>
                                </td>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

<!-- FOOTER SECTION -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                <td style="text-align: center;padding-left: 45px;padding-right: 45px;padding: 15px;">
                                    <p style="font-size: 14px; line-height: 18px;">Et bonnes fêtes également de la part de <a href="https://www.accesscodeschool.fr/">l\'Access Code School</a>.</p>
                                </td>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>

';
        if (mail($to, $subject, $message, $header)) {
            echo json_encode(['message' => 'Votre mail a bien été envoyé']);
            // header("Location: index.php");
        } else {
            echo json_encode(['error' => 'Il y eu une erreur lors de l\'envoie du mail']);
        }
    } else {
        echo json_encode(['error' => 'Vous devez rentrer une adresse mail valide']);
    }
}
