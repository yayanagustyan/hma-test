<?php 


//From PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Psr\Http\Message\ResponseInterface;

class Email {

	public static function send($payload){
		// $email = "yayanagustyan@gmail.com";
		$email = "marketing@vdc.id";
		$result = array(
			"status" 	=> true,
			"code"		=> 200,
			"message"	=> "Email sent",
			"data"		=> $payload,
		);

		$mail = new PHPMailer(true);

		try {
	    // $mail->SMTPDebug 		= 1;
	    $mail->SMTPDebug 		= SMTP::DEBUG_SERVER;       
	    $mail->isSMTP();

	    // $mail->SMTPSecure  	=	"ssl";
	    $mail->SMTPAuth			=	true;

	    /**/
	    $mail->SMTPSecure  	=	"tls";
	    $mail->Port 				= 587;
	    $mail->Host 				= "smtp.office365.com";
	    $mail->Username 		=	"noreply@vdc.id";
	    $mail->Password     = "N0r3plyVDC20!8*";
	    /*/
	    $mail->SMTPSecure 	= PHPMailer::ENCRYPTION_SMTPS;
	    $mail->Port 				= 465;
	    $mail->Host 				= "mail.mookaps.com";
	    $mail->Username 		=	"noreply@mookaps.com";
	    $mail->Password     = "BAxP4Chc4t";
	    /**/

	    $mail->isHTML(true);
	    $mail->addAddress($email,"Marketing VDC");

	    $template = file_get_contents(__DIR__ . '/../core/email/simple_email.phtml');
    	foreach($payload as $k=>$v){
    		$template = str_replace('{'.$k.'}', $v, $template);
    	}
    	$template = str_replace('{total}', number_format($payload['ord_total']), $template );
    	$template = str_replace('{produk}', $payload['product'], $template );

	    $mail->Subject 			=	"Pesanan ". $payload['product'] . " dari " . $payload['ord_name'];
	    $mail->Body 				= $template;
	    $mail->From 				= "noreply@vdc.id";
	    $mail->FromName 		=	"System VDC";

	    $mail->send();

			$result = array(
				"status" 	=> true,
				"code"		=> 200,
				"message"	=> "Email sent",
				"data"		=> $payload,
			);

			
		} catch (Exception $e) {

			$result = array(
				"status" 	=> false,
				"code"		=> 400,
				"message"	=> "Email unable to send",
				"data"		=> $mail->ErrorInfo,
			);
			
		}

    return $result;
	}

}


?>