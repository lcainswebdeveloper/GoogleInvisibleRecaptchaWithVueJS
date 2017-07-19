<?php
require 'vendor/autoload.php';

use Classes\SendEnquiry;

$postData = json_decode(file_get_contents('php://input'), true);

$enquiry = new SendEnquiry($postData);

if($enquiry->captchaValidationNeeded()):
	if(!$enquiry->captchaValid()):
		http_response_code(401);
		echo json_encode([
			'feedback' => ['Captcha check failed, please try again']
		]);
		exit();
	endif;
endif;

return $enquiry->handle();