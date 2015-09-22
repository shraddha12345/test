<?php
/**
 * Zend Framework 2 (http://framework.zend.com/)
 * Controller file for Application.
 */	

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Application;          // <-- Add this import
use Application\Form\ApplicationForm;       // <-- Add this import

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$form = new ApplicationForm();
		$request = $this->getRequest();
		if ($request->isPost()) {
			$application = new Application();
             //$form->setInputFilter($application->getInputFilter());
			$form->setData($request->getPost()->toArray());
		    $addVal = $request->getPost('addsubmit');
		    $subVal = $request->getPost('subsubmit');
		    $mulVal = $request->getPost('mulsubmit');
		    $divVal = $request->getPost('divsubmit');
			$ans = "";
			if ($form->isValid()) {
				$application->exchangeArray($form->getData());
				if(!empty($addVal))
				{
					$ans = $form->get('num1')->getValue() + $form->get('num2')->getValue();
				}elseif(!empty($subVal))
				{
					$ans = $form->get('num1')->getValue() - $form->get('num2')->getValue();
				}elseif(!empty($mulVal))
				{
					$ans = $form->get('num1')->getValue() * $form->get('num2')->getValue();
				}elseif(!empty($divVal))
				{
					$ans = $form->get('num1')->getValue() / $form->get('num2')->getValue();
				}
				return new ViewModel(array('form'=>$form,'val'=>$ans,));
				
			}
			// print_r($form->getMessages());
			 return new ViewModel(array('form'=>$form));
        }else{
			return new ViewModel(array('form'=>$form));
		}
		
	} // End of Method
} // End of Class
