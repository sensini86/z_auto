<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Admin\Form\LoginForm;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $appName        = 'HelloWorld';
        $appDescription = 'A sample application for the Using Zend Framework 3 book';

        // Create login form
        $form = new LoginForm();


        // check if user has submitted the form
        if($this->getRequest()->isPost())
        {
            // retrieve form data from POST variables
            $data = $this->params()->fromPost();

            var_dump($data);die('q');
            $form->setData($data);

            // Validate form
            if($form->isValid())
            {
                // Get Filtered and validated data
                $data = $form->getData();

                // do sth with the validated data
                var_dump($data);
                die();

                return $this->redirect()->toRoute('admin', ['action' => 'index']);
            }

        }

        $viewModel = new ViewModel([
            'form'              => $form,
            'appName'           => $appName,
            'appDescription'    => $appDescription
        ]);

//        $viewModel->setTemplate('admin/index/index');

        return $viewModel;

    }
}
