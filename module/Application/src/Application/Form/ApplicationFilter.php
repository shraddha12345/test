<?php
// ApplicationFilter class to add multiple validations to the Formfields.
namespace Application\Form;

use Application\Validator\Special;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
Class ApplicationFilter extends InputFilter
{
		public function __construct()
		{
			$num = new Input('num1');
			$num->setRequired(true)
				->getFilterChain()
				->attach(new StringTrim())
				->attach(new StripTags());
			$num->getValidatorChain()->attach(new NotEmpty());
			$num->getValidatorChain()->attach(new Special());
			$this->add($num);
			
			$num1 = new Input('num2');
			$num1->setRequired(true)
				->getFilterChain()
				->attach(new StringTrim())
				->attach(new StripTags());
			$num1->getValidatorChain()->attach(new NotEmpty());
			$num1->getValidatorChain()->attach(new Special());
			$this->add($num1);
		}
}


?>