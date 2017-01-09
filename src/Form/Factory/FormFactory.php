<?php

namespace Pacificnm\CategoryAttribute\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttribute\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \CategoryAttribute\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }


}

