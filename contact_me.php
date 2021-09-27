<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer;

// $conn = mysqli_connect("192.185.196.15","onemgcom_mail-en","5U)g3NOfYml;","onemgcom_mail-enquiry");

// $sql_query = "INSERT INTO samunnati(name, mobile, email, message, formname) VALUES ('$sender_name', '$sender_mobile', '$sender_email', '$message', '$formname')";

// $result = mysqli_query($conn,$sql_query) or die(mysqli_error($conn));

// if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
//	die('Sorry Request must be Ajax POST'); //exit script
//}

 
$sender_name = isset($_POST['name']) ? $_POST['name'] : "" ;

$sender_mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "" ;

$sender_email = isset($_POST['email']) ? $_POST['email'] : "" ;
  
$message = isset($_POST['message']) ? $_POST['message'] : "" ;

$formname = isset($_POST['formname']) ? $_POST['formname'] : "" ;





// if($result){

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.anandkumar.pro";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "info@anandkumar.pro";                 
$mail->Password = "D*Xk3-}r,-jn";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "info@anandkumar.pro";
$mail->FromName = "Anandkumar Website Enquiry";

$mail->addAddress("aanandkumar8@gmail.com", "Profile");
$mail->addCC('anandkumarcsebe@gmail.com');

$mail->isHTML(true);

$mail->Subject = "$sender_name";
$mail->Body = "<html>
<head>
<title>Anandkumar Website Enquiry</title>
<meta charset='UTF-8'>
<style>
p {
	font-family: 'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	color: #333333;
}


</style>
</head>
<body style='background: #f7f7f7; padding: 20px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='600' align='center' style='background:#ffffff;font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;line-height:1.7em'>
        <tbody>
            <tr>
                <td style='padding:0'>
                   
                    <table border='0' cellpadding='0' cellspacing='0' width='600' style='min-width:600px;border:none;border-left:1px solid #dedede; background: #ffffff;'>
                        <tbody>
                            <tr>
                                <td style='padding:0'>
                                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-bottom: 1px solid #c3c3c3;'>
                                        <tbody>
                                            <tr>
												<table cellpadding='10' cellspacing='0' width='100%' border='0' align='center' style='color:#000; padding:20px;'>
													
														<tr style='width:100%;'>
															<td style='width:30%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>From</td>	
															<td style='width:1%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>:</td>
															<td style='width:69%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>Email</td>	
														</tr>
													
														<tr style='width:100%;'>
															<td style='width:30%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>Name</td>	
															<td style='width:1%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>:</td>
															<td style='width:69%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>$sender_name</td>	
														</tr>
														<tr style='width:100%;'>
															<td style='width:30%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>Mobile Number</td>	
															<td style='width:1%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>:</td>
															<td style='width:69%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>$sender_mobile</td>	
														</tr>
														
														<tr style='width:100%;'>
															<td style='width:30%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>Email</td>	
															<td style='width:1%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>:</td>
															<td style='width:69%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>$sender_email</td>	
														</tr>
														
														<tr style='width:100%;'>
															<td style='width:30%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>Message</td>	
															<td style='width:1%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>:</td>
															<td style='width:69%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>$message</td>	
														</tr>
	
	
														<tr>
															<td style='width:30%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>Source</td>	
															<td style='width:1%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>:</td>
															<td style='width:69%; border-bottom: 1px dashed #1111114f;font-size: 14px;'>$formname</td>	
														</tr>
														
														

												</table>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>
        </tbody>
    </table>
    <body>
</html>";
$mail->AltBody = "Alternative Message For Enquiry.";

                             

							 
                             
if(!$mail->send()) 
{
   //  echo "Mailer Error: " . $mail->ErrorInfo;
    print json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));  
    	exit;
} 
else 
{
    // echo "Message has been sent successfully";
     print json_encode(array('type'=>'done', 'text' => 'Thank you for your email'));
     	exit;
}    

exit();


//}

?>