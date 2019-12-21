<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailus extends Model
{
    public function prepMail($data){
        if(!empty($data['yemail'])){
            $to = $data['yemail'];
            $subject = "Synergy Node Recieved your Quote.";
            $header = $this->makeHeader('info@synergynode.com');
            $message = $this->makeMsg();
            $this->sendMail($to,$subject,$message,$header);

        }

        if(!empty($data['c_email'])){
            $to = $data['yemail'];
            $subject = "Synergy Node Recieved your Quote.";
            $header = $this->makeHeader('info@synergynode.com');
            $message = $this->makeMsg();
            $this->sendMail($to,$subject,$message,$header);
        }
    }

    function filter($data){
        // $data = trim($data);
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    function sendMail($to,$subject,$message,$headers)
    {
        $res = "";
        $secure_check = $this->sanitize_my_email($to);
        if ($secure_check == false) {
            return false;
        } else { //send email
            try{
                mail($to,$subject,$message,$headers);
                $res = true;
            }catch (Exception $exception){
                $res = $exception;
            }

            return $res;
        }
    }

    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    function makeMsg(){
        $htmlContent = "
                    <html>
                        <head>
                        </head>
                        <body>
                           
                            <table cellspacing='0' style=' width: 100%; height: 200px;'>
                                <tr>
                                    <td colspan='2'>
                                        Thank you for placing a quote with us at Synergy Node. We are enthusiast to inform you that 
                                        your quote is being looked at and we will contact you shortly to discuss your options.
                                        
                                        <br>
                                        
                                        you can contact us on the numbers
                                        <br>
                                        08128039141
                                        <br>
                                        08038623912
                                    </td>
                                </tr>

                            </table>
                        </body>
                    </html>";
        return "";
    }

    function makeHeader($fromMail){
        $headersMail = '';
        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: Synergy Node \r\n";
        $headersMail .= 'Return-Path: ' . $fromMail . "\r\n";
        $headersMail .= 'MIME-Version: 1.0' . "\r\n";
//        $headersMail .= "Content-Type: multipart/alternative; boundary = \"" . $boundary . "\"\r\n\r\n";
//        $headersMail .= '--' . $boundary . "\r\n";

        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
        $headersMail .= 'Content-Transfer-Encoding: base64' . "\r\n\r\n";
        return $headersMail;
    }
}
