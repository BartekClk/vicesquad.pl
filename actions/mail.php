<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPmailer/src/Exception.php';
require 'PHPmailer/src/PHPMailer.php';
require 'PHPmailer/src/SMTP.php';

$mail = new PHPMailer(true);

$title = "Zmiana hasła";

$code = $_GET['code'];

$email = $_GET['email'];

$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;font-family:\'open sans\', \'helvetica neue\', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>New message</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        
        .ExternalClass {
            width: 100%;
        }
        
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }
        
        .es-button {
            text-decoration: none!important;
        }
        
        a[x-apple-data-detectors] {
            color: inherit!important;
            text-decoration: none!important;
            font-size: inherit!important;
            font-family: inherit!important;
            font-weight: inherit!important;
            line-height: inherit!important;
        }
        
        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
        }
        
        [data-ogsb] .es-button {
            border-width: 0!important;
            padding: 15px 30px 15px 30px!important;
        }
        
        @media only screen and (max-width:600px) {
            p,
            ul li,
            ol li,
            a {
                line-height: 150%!important
            }
            h1,
            h2,
            h3,
            h1 a,
            h2 a,
            h3 a {
                line-height: 120%!important
            }
            h1 {
                font-size: 32px!important;
                text-align: center
            }
            h2 {
                font-size: 26px!important;
                text-align: center
            }
            h3 {
                font-size: 20px!important;
                text-align: center
            }
            .es-header-body h1 a,
            .es-content-body h1 a,
            .es-footer-body h1 a {
                font-size: 32px!important
            }
            .es-header-body h2 a,
            .es-content-body h2 a,
            .es-footer-body h2 a {
                font-size: 26px!important
            }
            .es-header-body h3 a,
            .es-content-body h3 a,
            .es-footer-body h3 a {
                font-size: 20px!important
            }
            .es-menu td a {
                font-size: 16px!important
            }
            .es-header-body p,
            .es-header-body ul li,
            .es-header-body ol li,
            .es-header-body a {
                font-size: 16px!important
            }
            .es-content-body p,
            .es-content-body ul li,
            .es-content-body ol li,
            .es-content-body a {
                font-size: 16px!important
            }
            .es-footer-body p,
            .es-footer-body ul li,
            .es-footer-body ol li,
            .es-footer-body a {
                font-size: 16px!important
            }
            .es-infoblock p,
            .es-infoblock ul li,
            .es-infoblock ol li,
            .es-infoblock a {
                font-size: 12px!important
            }
            *[class="gmail-fix"] {
                display: none!important
            }
            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3 {
                text-align: center!important
            }
            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3 {
                text-align: right!important
            }
            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3 {
                text-align: left!important
            }
            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
                display: inline!important
            }
            .es-button-border {
                display: inline-block!important
            }
            a.es-button,
            button.es-button {
                font-size: 16px!important;
                display: inline-block!important
            }
            .es-btn-fw {
                border-width: 10px 0px!important;
                text-align: center!important
            }
            .es-adaptive table,
            .es-btn-fw,
            .es-btn-fw-brdr,
            .es-left,
            .es-right {
                width: 100%!important
            }
            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
                width: 100%!important;
                max-width: 600px!important
            }
            .es-adapt-td {
                display: block!important;
                width: 100%!important
            }
            .adapt-img {
                width: 100%!important;
                height: auto!important
            }
            .es-m-p0 {
                padding: 0px!important
            }
            .es-m-p0r {
                padding-right: 0px!important
            }
            .es-m-p0l {
                padding-left: 0px!important
            }
            .es-m-p0t {
                padding-top: 0px!important
            }
            .es-m-p0b {
                padding-bottom: 0!important
            }
            .es-m-p20b {
                padding-bottom: 20px!important
            }
            .es-mobile-hidden,
            .es-hidden {
                display: none!important
            }
            tr.es-desk-hidden,
            td.es-desk-hidden,
            table.es-desk-hidden {
                width: auto!important;
                overflow: visible!important;
                float: none!important;
                max-height: inherit!important;
                line-height: inherit!important
            }
            tr.es-desk-hidden {
                display: table-row!important
            }
            table.es-desk-hidden {
                display: table!important
            }
            td.es-desk-menu-hidden {
                display: table-cell!important
            }
            .es-menu td {
                width: 1%!important
            }
            table.es-table-not-adapt,
            .esd-block-html table {
                width: auto!important
            }
            table.es-social {
                display: inline-block!important
            }
            table.es-social td {
                display: inline-block!important
            }
        }
    </style>
</head>

<body style="width:100%;font-family:\'open sans\', \'helvetica neue\', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
    <div class="es-wrapper-color" style="background-color:#EEEEEE">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
            <tr style="border-collapse:collapse">
                <td valign="top" style="padding:0;Margin:0">
                    <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-content-body" style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px">
                                            <!--[if mso]><table style="width:580px" cellpadding="0" cellspacing="0"><tr><td style="width:282px" valign="top"><![endif]-->
                                            <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="border-collapse:collapse;border-spacing:0px;float:left">
                                                <tr style="border-collapse:collapse">
                                                    <td align="left" style="padding:0;Margin:0;width:282px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td class="es-infoblock es-m-txt-c" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--[if mso]></td><td style="width:20px"></td><td style="width:278px" valign="top"><![endif]-->
                                            <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="border-collapse:collapse;border-spacing:0px;float:right">
                                                <tr style="border-collapse:collapse">
                                                    <td align="left" style="padding:0;Margin:0;width:278px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td align="right" class="es-infoblock es-m-txt-c" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC">

                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse"></tr>
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-header-body" style="border-collapse:collapse;border-spacing:0px;background-color:#044767;width:600px" cellspacing="0" cellpadding="0" bgcolor="#044767" align="center">
                                    <tr style="border-collapse:collapse">
                                        <td align="left" background="https://klenea.stripocdn.email/content/guids/CABINET_9d0cbea676db576720527cb4f7903070/images/bg_zdF.jpeg" style="Margin:0;padding-top:35px;padding-bottom:35px;padding-left:35px;padding-right:35px;background-image:url(https://klenea.stripocdn.email/content/guids/CABINET_9d0cbea676db576720527cb4f7903070/images/bg_zdF.jpeg);background-repeat:no-repeat;background-position:left top">
                                            <!--[if mso]><table style="width:530px" cellpadding="0" cellspacing="0"><tr><td style="width:340px" valign="top"><![endif]-->
                                            <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="border-collapse:collapse;border-spacing:0px;float:left">
                                                <tr style="border-collapse:collapse">
                                                    <td class="es-m-p0r es-m-p20b" valign="top" align="center" style="padding:0;Margin:0;width:340px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td class="es-m-txt-c" align="left" style="padding:0;Margin:0">
                                                                    <h1 style="Margin:0;line-height:36px;font-family:\'open sans\', \'helvetica neue\', helvetica, arial, sans-serif;font-size:36px;font-style:normal;font-weight:bold;color:#ffffff">Vice Squad</h1>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--[if mso]></td><td style="width:20px"></td><td style="width:170px" valign="top"><![endif]-->
                                            <table cellspacing="0" cellpadding="0" align="right" style="border-collapse:collapse;border-spacing:0px">
                                                <tr class="es-hidden" style="border-collapse:collapse">
                                                    <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:170px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td style="padding:0;Margin:0">
                                                                    <table cellspacing="0" cellpadding="0" align="right" style="border-collapse:collapse;border-spacing:0px">
                                                                        <tr style="border-collapse:collapse">
                                                                            <td align="center" style="padding:0;Margin:0;display:none"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                    <tr style="border-collapse:collapse">
                                        <td style="Margin:0;padding-bottom:35px;padding-left:35px;padding-right:35px;padding-top:40px;background-color:#1d1d20" bgcolor="#1d1d20" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                                                <tr style="border-collapse:collapse">
                                                    <td valign="top" align="center" style="padding:0;Margin:0;width:530px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:20px">
                                                                    <h3 style="Margin:0;line-height:22px;font-family:\'open sans\', \'helvetica neue\', helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:bold;color:#e8e8e8">Twój kod zmiany hasła to:</h3>
                                                                </td>
                                                            </tr>
                                                            <tr style="border-collapse:collapse">
                                                                <td class="es-m-txt-c" align="center" style="padding:25px;Margin:0">
                                                                    <h1 style="Margin:0;line-height:36px;font-family:\'open sans\', \'helvetica neue\', helvetica, arial, sans-serif;font-size:36px;font-style:normal;font-weight:bold;color:#ffffff">'.$code.'</h1>
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
                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-footer-body" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                    <tr style="border-collapse:collapse">
                                        <td align="left" bgcolor="#2e2e32" style="Margin:0;padding-top:35px;padding-left:35px;padding-right:35px;padding-bottom:40px;background-color:#2e2e32">
                                            <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                                                <tr style="border-collapse:collapse">
                                                    <td valign="top" align="center" style="padding:0;Margin:0;width:530px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center" style="padding:0;Margin:0;padding-bottom:15px;font-size:0px"><img src="https://klenea.stripocdn.email/content/guids/CABINET_9d0cbea676db576720527cb4f7903070/images/logo.png" alt="Beretun logo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                        title="Beretun logo" width="142"></td>
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
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse">
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-content-body" style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px">
                                            <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                                                <tr style="border-collapse:collapse">
                                                    <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center" style="padding:0;Margin:0;display:none"></td>
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
                </td>
            </tr>
        </table>
    </div>
</body>

</html>';

try {
    //Server settings
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vicesquad.mta@gmail.com';                     //SMTP username
    $mail->Password   = 'ViceSquad123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('vicesquad.mta@gmail.com', 'Vice Squad');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('vicesquad.mta@gmail.com', 'Vice Squad');

    //Content
    $mail->isHTML(true);                
    $mail->Subject=mb_encode_mimeheader($title,"UTF-8", "B", "\n");
    $mail->Body    = $body;
    $mail->AltBody = 'Twój kod zmiany hasła to: ';

    $mail->send();
    echo '<script>window.close()</script>';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}