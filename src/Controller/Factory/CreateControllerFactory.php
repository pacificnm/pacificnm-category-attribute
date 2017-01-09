<?php

namespace Pacificnm\CategoryAttribute\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttribute\Controller\CreateController;

class CreateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttribute\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttribute\Service\ServiceInterface');

        $form = $realServiceLocator->get('Pacificnm\CategoryAttribute\Form\Form');

        return new CreateController($service, $form);
    }


}

