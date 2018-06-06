<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $appName        = 'HelloWorld';
        $appDescription = 'A sample application for the Using Zend Framework 3 book';

        // check if user has submitted the form
        if($this->getRequest()->isPost())
        {
            // retrieve form data from POST variables
            $data = $this->params()->fromPost();

            var_dump($data);
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
