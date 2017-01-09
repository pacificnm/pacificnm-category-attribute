<?php

namespace Pacificnm\CategoryAttribute\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttribute\Controller\UpdateController;

class UpdateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttribute\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttribute\Service\ServiceInterface');

        $form = $realServiceLocator->get('Pacificnm\CategoryAttribute\Form\Form');

        return new UpdateController($service, $form);
    }


}

