<?php
//Special Class to set Error Message Templates.
namespace Application\Validator;

use Zend\Validator\AbstractValidator;
                    
class Special extends AbstractValidator
{
    const MSG_NUMERIC = 'numeric';
         
    protected $messageTemplates = array(
        self::MSG_NUMERIC => "Enter numeric value.",
		
    );
    public function isValid($value)
    {
       $this->setValue($value);
       if (!is_numeric($value)) {
		$this->error(self::MSG_NUMERIC);
            return false;
        }
       return true;
    }
} 