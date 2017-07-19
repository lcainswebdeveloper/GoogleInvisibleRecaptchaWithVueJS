<?php

namespace Classes;

class Form
{
    protected $errors = [];
    protected $name;
    protected $email;
    protected $message;

    public function __construct($inputs)
    {
        $this->name = $this->clean($inputs['name']);
        $this->email = $this->clean($inputs['email']);
        $this->message = $this->clean($inputs['message']);
    }

    public function validate()
    {
        if ($this->name == ''):
            $this->errors['name'][] = 'Please give your name';
        endif;
        if ($this->email == ''):
            $this->errors['email'][] = 'Please give your email';
        endif;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false):
            $this->errors['email'][] = 'Please enter a valid email address';
        endif;
        if ($this->message == ''):
            $this->errors['message'][] = 'Please provide a message';
        endif;
    }

    public function errors()
    {
        return $this->errors;
    }

    protected function clean($item)
    {
        return trim(htmlentities($item, ENT_QUOTES, 'UTF-8', false));
    }
}
