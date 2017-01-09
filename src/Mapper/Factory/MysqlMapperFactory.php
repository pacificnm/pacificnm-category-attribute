<?php

namespace Pacificnm\CategoryAttribute\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Pacificnm\CategoryAttribute\Hydrator\Hydrator;
use Pacificnm\CategoryAttribute\Entity\Entity;
use Pacificnm\CategoryAttribute\Mapper\MysqlMapper;

class MysqlMapperFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttribute\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
                    
        $hydrator->add(new Hydrator());  
                    
        $prototype = new Entity();
                    
        $writeAdapter = $serviceLocator->get('db1');
                    
        $readAdapter = $serviceLocator->get('db2');
                    
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }


}

