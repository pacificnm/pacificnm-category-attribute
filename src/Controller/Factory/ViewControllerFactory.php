<?php
namespace Pacificnm\CategoryAttribute\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttribute\Controller\ViewController;

class ViewControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\CategoryAttribute\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\CategoryAttribute\Service\ServiceInterface');
        
        $optionService = $realServiceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');
        
        return new ViewController($service, $optionService);
    }
}

