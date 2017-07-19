<?php

namespace Classes;

use Classes\Captcha;
use Classes\Form;

class SendEnquiry{
	protected $data;
	public function __construct($data){
		$this->data = $data;
	}

	public function captchaValidationNeeded(){
		return !$this->data['captchaValidated'];
	}

	public function captchaValid(){
		return (new Captcha($this->data['captchaToken']))->check();
	}

	public function handle(){
		$form = new Form($this->data);
		$form->validate();
		if(count($form->errors()) > 0):
			http_response_code(422);
			echo json_encode($form->errors());
		else:
			http_response_code(200);
			echo json_encode([
				'message'  => 'Enquiry sent successfully'
			]);
		endif;
	}
}