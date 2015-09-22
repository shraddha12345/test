<?php 
 namespace Application\Model;
 // Add these import statements

 use Zend\Form\Form;
 use Zend\InputFilter\Input;
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\Factory as InputFactory;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Application implements InputFilterAwareInterface
 {
     public $num1;
     public $num2;
     protected $inputFilter;                       // <-- Add this variable
	 public function exchangeArray($data)
     {
         $this->num1     = (isset($data['num1']))     ? $data['num1']     : null;
         $this->num2 = (isset($data['num2'])) ? $data['num2'] : null;
         //$this->title  = (isset($data['title']))  ? $data['title']  : null;
     }

	
     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'num1',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));
			$inputFilter->add(array(
                 'name'     => 'num2',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));
             $this->inputFilter = $inputFilter;
         }
         return $this->inputFilter;
     }
 }
 ?>