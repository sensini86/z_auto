<?php
/**
 * Created by PhpStorm.
 * User: sensini
 * Date: 6/6/2018
 * Time: 10:32 PM
 */

namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class LoginForm extends Form
{
    public function __construct()
    {
        // define form name
        parent::__construct('login-form');

        // set POST method for this form
        $this->setAttribute('method', 'post');

        // (Optionally) set action for this form
        $this->setAttribute('action', '/admin/index');
        $this->setAttribute('class', 'form-signin');



        // Add form elements
        $this->addElements();

        // ... call this method to add filtering/validation rules
        $this->addInputFilter();

    }

    private function addElements()
    {
        $this->add([
            'type'      => 'email',
            'name'      => 'email',
            'required'  => true,
            'attributes' => [
                'id'            => 'inputEmail',
                'class'         => 'form-control',
                'placeholder'   => 'Email address',
                'autofocus'     => 'autofocus'
            ],
            'options' => [
                'label' => 'Email address',
                'attributes' => [
                    'for' => 'inputEmail'
                ]
            ],
        ]);

        $this->add([
            'type'  => 'password',
            'name'  => 'password',
            'required'  => true,
            'attributes' => [
                'id'            => 'inputPassword',
                'class'         => 'form-control',
                'placeholder'   => 'Password'
            ],
            'options' => [
                'label' => 'Password',
                'attributes' => [
                    'for' => 'inputPassword'
                ]
            ],
        ]);
    }

    private function addInputFilter()
    {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);


        $inputFilter->add([
            'name'      => 'email',
            'required'  => true,
            'filters'   => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name'      => 'EmailAddress',
                    'options'   => [
                        'allow'         => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck'    => false,
                    ]
                ]
            ]
        ]);

        $inputFilter->add([
            'name'      => 'password',
            'required'  => true,
            'filters'   => [
                ['name' => 'StringTrim'],
            ],
            'validators'=> [
                [
                    'name'      => 'StringLength',
                    'options'   => [
                        'min' => 6,
                        'max' => 255
                    ]
                ]
            ]
        ]);

    }
}