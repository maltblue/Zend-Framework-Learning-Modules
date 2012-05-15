<?php

class Forms_IndexController extends Zend_Controller_Action
{
    public function init()
    {

    }
    
    public function indexAction()
    {
        $formConfig = new Zend_Config_Xml(
            APPLICATION_PATH . '/modules/forms/config/forms/form.xml', 
            'simpleForm'
        );
        $form = new Forms_Form_SimpleForm($formConfig);

        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if ($form->isValid($_POST)) {
                $formInput = $form->getValues();
                Zend_Debug::dump($formInput);
            }
        }
        $this->view->form = $form;
    }

}



