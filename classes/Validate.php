<?php

class Validate {
    private $_passed = false;
    private $_errors = array();
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {
                $value = $source[$item];
                $item = escape($item);

                if($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if (!empty($value)) {
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;

                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));

                            if($check->count()) {
                                $this->addError("{$item} already exists.");
                            }
                            break;
                    }
                }
            }
        }

        //Check if recaptcha box has been filled
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            // Google secret API
            $secretAPIkey = '6LfAKfgnAAAAAFPIbzYDV36oTSofW7ql9XzYblyA';

            // reCAPTCHA response
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

            // Decode JSON and check for fail
            $response = json_decode($verifyResponse);
            if(!($response->success)){
               $this->addError("reCaptcha failed, please try again.");
            }
        }
        else{
            $this->addError("Please fill in reCaptcha.");
        }

        if(empty($this->_errors)) {
            $this->_passed = true;
        }
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }
}
