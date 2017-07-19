<?php

namespace Classes;

class BaseController{
	protected $config;
	protected $settings;

	public function __construct(){
		$this->config = require_once(__DIR__.'/../config.php');
	}

}