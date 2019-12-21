<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;

class MailusController extends Controller
{
    public function prepMail(Request $request){


        $name = $this->filter($request->input("name"));
        $email = $this->filter($request->input("email"));
        $message = $this->filter($request->input("message"));

        $res['name'] = $name;
        $res['email'] = $email;
        $res['message'] = $message;

        $to = 'info@synergynode.com';
        //$to = 'icekidben@gmail.com';
        $subject = 'New Contact Info from '.$name.' with email: '. $email;
        $headers = 'From: '.$email;

        $process = $this->sendMail($to,$subject,$message,$headers);
        $res['success'] = true;
        $res['info'] = $process;
        return json_encode($res);

    }

    static function mailsender($mail){

//        return $mail;

        $to = $mail['email'];
        $message = $mail['message'];
        $link = $mail['link'];
        $sender = "noreply@synergynode.com";


        $htmlContent = "
                    <html>
                        <head>
                            <style>
                                html, body{
                                    background-color: #ee8109;
                                    color: rgba(51,51,51,0.15);
                                    font-family: sans-serif;
                                    font-weight: 100;
                                    margin: 0;
                                    height: 100%;
                                }
                            </style>
                        </head>
                        <body>
                           
                            <table cellspacing='0' style=' width: 100%; height: 200px;'>

                                <tr style='background-color: #2a2a2a;'>
                                    <th colspan='2' style='padding:20px;'><span style='font-size: 20px; color: #d6d6d6'>SYNERGY NODE PASSWORD</span></th>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                    <br>
                                    <br>
                                    <br>
                                        <p style='text-align: center;padding: 0 50px; margin-bottom:  50px;color: #fff;'>$message</p>
                                        
                                        <h1 style='text-align: center; margin-top: 100px'><a href='" . $link ."'><b>RESET PASSWORD</b></a></h1>
                                    </td>
                                </tr>

                            </table>
                        </body>
                    </html>";

        $separator = md5(time());
        $eol = "\r\n";

        $subject = $mail['subject'];

        $fromMail = "Synergy Node <$sender>";

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


            //send acknowledgement mail to sender

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

}
