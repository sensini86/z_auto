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

        $viewModel = new ViewModel([
            'appName'           => $appName,
            'appDescription'   => $appDescription
        ]);

//        $viewModel->setTemplate('admin/index/index');

        return $viewModel;

    }
}
