<?php

namespace Pacificnm\CategoryAttribute\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Pacificnm\Mapper\AbstractMysqlMapper;
use Pacificnm\CategoryAttribute\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter
     * @param AdapterInterface $writeAdapter
     * @param HydratorInterface $hydrator
     * @param Entity $prototype
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
            
        $this->prototype = $prototype;
            
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttribute\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('category_attribute');
                    
        $this->filter($filter); 

        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {  
                return $this->getRows();    
            }
        }

        return $this->getPaginator();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttribute\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('category_attribute');

        $this->select->where(array(
            'category_attribute.category_attribute_id = ?' => $id  
        ));
                    
        return $this->getRow();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttribute\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
                    
        if ($entity->getCategoryAttributeId()) {
            $this->update = new Update('category_attribute'); 
                
            $this->update->set($postData);  
                
            $this->update->where(array(
                'category_attribute.category_attribute_id = ?' => $entity->getCategoryAttributeId()
            ));
                    
            $this->updateRow();            
        } else {
            $this->insert = new Insert('category_attribute'); 
                
            $this->insert->values($postData);
                
            $id = $this->createRow();
                
            $entity->setCategoryAttributeId($id);        
        }
                    
        return $this->get($entity->getCategoryAttributeId());
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttribute\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('category_attribute');
        $this->delete->where(array(
             'category_attribute.category_attribute_id = ?' => $entity->getCategoryAttributeId()
        ));
                 
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter
     * @return \CategoryAttribute\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        return $this;
    }


}

