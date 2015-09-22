<?php
/**
 * Zend Framework 2 (http://framework.zend.com/)
 * ApplicationForm file to create a Form.
 */
 namespace Application\Form;
 use Zend\Form\Element\Text;
 use Zend\Form\Form;

 class ApplicationForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('Application');
		 $this->setAttribute('method', 'post');
		 $this->setInputFilter(new ApplicationFilter());
		 
		 $this->add(array(
             'name' => 'num1',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Enter First Number',
             ),
         ));
         $this->add(array(
             'name' => 'num2',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Enter Second Number',
             ),
         ));
         $this->add(array(
             'name' => 'addsubmit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Add',
                 'id' => 'addsubmit',
             ),       
         ));
		 $this->add(array(
             'name' => 'subsubmit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Substract',
                 'id' => 'subsubmit',
             ),
         ));
		 $this->add(array(
             'name' => 'mulsubmit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Multiply',
                 'id' => 'mulsubmit',
             ),
         ));
		 $this->add(array(
             'name' => 'divsubmit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Division',
                 'id' => 'divsubmit',
             ),
         ));
     }
 } // End of Class
 ?>