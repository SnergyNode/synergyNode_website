<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function sendMails($mail, $data, $type){

        $to = $mail['email'];
        $sender = "support@synergynode.com";

        $htmlContent = $this->ProjectTeamNoticeTemplate($type, $data['pname'], $data['pclient'], $data['date'], $data['name']);

        $separator = md5(time());
        $eol = "\r\n";

        $subject = $mail['subject'];

        $fromMail = "Synergy Node Support <$sender>";

        $headersMail = '';

        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: Synergy Node Ltd \r\n";

        $headersMail .= 'MIME-Version: 1.0' . "\r\n";

        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .=  "Content-Type: text/html; charset=ISO-8859-1; boundary=\"" . $separator . "\"" . $eol;
//        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

        $headersMail .= 'Content-Transfer-Encoding: 7bit' . "\r\n";



        @mail($to,$subject,$htmlContent,$headersMail, "-f ". $sender);

    }

    public function ProjectTeamNoticeTemplate( $type, $pname, $pclient, $date, $name){
        $date = date('F d, Y', $date);
        if($type==='client'){
            $message = "<p>Your project <b>$pname</b> is being developed and is due on <b>$date</b>. <br> 
                           A link will be sent to you on request to monitor the project progress.
                           <br>
                           Thanks.
                        </p>";
        }else{
            $message = "<p>You have been added as a team member on the project <b>$pname</b> for the client <b>$pclient</b> and the project is due on <b>$date</b>. <br> 
                           Kindly visit your account to view details of the relevant task that are pending and the updates that may be available.
                           <br>
                           Thanks.
                        </p>
                        <table>
                            <tr>
                            <td align='center'>
                            <p>
                            <a href='https://synergynode.com/synergy-desk' class='button'>Login to Dashboard</a>
                            </p>
                            </td>
                            </tr>
                         </table>";
        }

        $html =
            "<html xmlns='http://www.w3.org/1999/xhtml'>

            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                <meta name='viewport' content='width=device-width' />
            
                <!-- For development, pass document through inliner -->
                
                <style type='text/css'>
                    * {
                        margin: 0;
                        padding: 0;
                        font-size: 100%;
                        font-family: 'Avenir Next', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                        line-height: 1.65;
                    }
            
                    img {
                        max-width: 100%;
                        margin: 0 auto;
                        display: block;
                    }
            
                    body,
                    .body-wrap {
                        width: 100% !important;
                        height: 100%;
                        background: #f8f8f8;
                    }
            
                    a {
                        color: #FF611D;
                        text-decoration: none;
                    }
            
                    a:hover {
                        text-decoration: underline;
                    }
            
                    .text-center {
                        text-align: center;
                    }
            
                    .text-right {
                        text-align: right;
                    }
            
                    .text-left {
                        text-align: left;
                    }
            
                    .button {
                        display: inline-block;
                        color: white;
                        background: #FF611D;
                        border: solid #FF611D;
                        border-width: 10px 20px 8px;
                        font-weight: bold;
                        border-radius: 4px;
                    }
            
                    .button:hover {
                        text-decoration: none;
                    }
            
                    h1,
                    h2,
                    h3,
                    h4,
                    h5,
                    h6 {
                        margin-bottom: 20px;
                        line-height: 1.25;
                    }
            
                    h1 {
                        font-size: 32px;
                    }
            
                    h2 {
                        font-size: 28px;
                    }
            
                    h3 {
                        font-size: 24px;
                    }
            
                    h4 {
                        font-size: 20px;
                    }
            
                    h5 {
                        font-size: 16px;
                    }
            
                    p,
                    ul,
                    ol {
                        font-size: 16px;
                        font-weight: normal;
                        margin-bottom: 20px;
                    }
            
                    .container {
                        display: block !important;
                        clear: both !important;
                        margin: 0 auto !important;
                        max-width: 580px !important;
                    }
            
                    .container table {
                        width: 100% !important;
                        border-collapse: collapse;
                    }
            
                    .container .masthead {
                        padding: 80px 0;
                        background: #FF611D;
                        color: white;
                    }
            
                    .container .masthead h1 {
                        margin: 0 auto !important;
                        max-width: 90%;
                        text-transform: uppercase;
                    }
            
                    .container .content {
                        background: white;
                        padding: 30px 35px;
                    }
            
                    .container .content.footer {
                        background: none;
                    }
            
                    .container .content.footer p {
                        margin-bottom: 0;
                        color: #888;
                        text-align: center;
                        font-size: 14px;
                    }
            
                    .container .content.footer a {
                        color: #888;
                        text-decoration: none;
                        font-weight: bold;
                    }
            
                    .container .content.footer a:hover {
                        text-decoration: underline;
                    }
                </style>
            </head>
            
            <body>
                <table class='body-wrap'>
                    <tr>
                        <td class='container'>
            
                            <!-- Message start -->
                            <table>
                                <tr>
                                    <td align='center' class='masthead'>
                                       <img src='https://www.synergynode.com/images/synergy.png' alt=\"synergy node logo\">
                                        <h1>synergy node</h1>
            
                                    </td>
                                </tr>
                                <tr>
                                    <td class='content'>
            
                                        <h2>Hi $name,</h2>
            
                                        $message
            
            
                                        <p>By the way, we hope you are doing fine and well where ever you are. If you have any challenges do contact us on <a href='mailto:support@synergynode.com'>support@synergynode.com</a>.</p>
            
                                        <p><em>– Synergy Node Ltd</em></p>
            
                                    </td>
                                </tr>
                            </table>
            
                        </td>
                    </tr>
                    <tr>
                        <td class='container'>
            
                            <!-- Message start -->
                            <table>
                                <tr>
                                    <td class='content footer' align='center'>
                                        <p>Sent by <a href='https://synergynode.com'>Synergy Node</a>, Abuja Nigeria</p>
                                        <p><a href='mailto:info@synergynode.com'>info@synergynode.com</a> | <a href='#notWorkingYet'>Unsubscribe</a></p>
                                    </td>
                                </tr>
                            </table>
            
                        </td>
                    </tr>
                </table>
            </body>
            
            </html>";

        return $html;
    }
}
