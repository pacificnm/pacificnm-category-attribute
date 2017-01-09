<?php

namespace Pacificnm\CategoryAttribute\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttribute\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pacificnm\CategoryAttribute\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\CategoryAttribute\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

