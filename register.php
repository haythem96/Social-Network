<?php
    session_start();
    include("filters/guest_filter.php");
    include("filters/init.php");
    require("includes/functions.php");
    require("includes/constants.php");
    require("models/registerModel.php");
    require_once("config/PHPMailer/PHPMailerAutoload.php");
    require("config/PHPMailer/class.phpmailer.php");

    $user = new registerModel();

    if(isset($_POST['register'])){
        //If all field are not empty
        if(not_empty(['name', 'username', 'email', 'password', 'confirmPassword'])){
            $errors= [];        //errors table
            extract($_POST);
            //Check username validity
            if(mb_strlen($name) < 4){
                $errors[] = "Pseudo trop court! (Minimum 3 caracteres)";
            }
            //Check email validity
            if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Adresse email invalid!";
            }
            if(mb_strlen($password) < 6){
                $errors[] = "Mot de passe  trop court! (Minimum 6 caractères)";
            }
            if($password != $confirmPassword){
                    $errors[] = "Les deux mots de passe ne concordent pas!";
            }
            if($user->is_already_in_use('username', $username, 'users')) {
                $errors[] = "Pseudo deja utilise!";
            }
            if($user->is_already_in_use('email', $email, 'users')){
                $errors[] = "Adresse Email deja utilise!"
;           }
            if(count($errors) == 0){
                /*Send activation mail PHPMailer Object
                $to = $email;
                $subject = WEBSITE_NAME. " - ACTIVATION DE COMPTE";
                $token = sha1($username.$email);
                ob_start();
                require("templates/emails/activation.php");
                $content = ob_get_clean();
                $mail = new PHPMailer();
                $mail->From = "sellamipentester@gmail.com";
                $mail->FromName = "Social Network Team";
                $mail->addAddress($to);
                $mail->addReplyTo("noreply@socialnetwork.com", "Reply");
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $content;
                $mail->AltBody = $content;
                if(!$mail->send())
                {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
                else
                {
                    echo "Message has been sent successfully";
                }

                Send activation mail via mail function
                $to = $email;
                $subject = WEBSITE_NAME. "-ACTIVATION DE COMPTE";
                $token = sha1($username.$email);
                ob_start();
                require('templates/emails/activation.php');
                $content = ob_get_clean();
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                mail($to, $subject, $content, $headers);*/

                $user->register($name,$username,$email,$password);
                header('location: login.php');
                //Message de bienvenue
                //Rederiger ers profile
            }
        }
        else{
            $errors[] = "Veuillez SVP remplir tous les champs!";
        }
    }
    include("views/register.view.php");
?>