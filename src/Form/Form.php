<?php
namespace Pacificnm\CategoryAttribute\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\CategoryAttribute\Entity\Entity;
use Pacificnm\CategoryAttribute\Hydrator\Hydrator;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct($name = 'categoryattribute-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        // categoryAttributeId
        $this->add(array(
            'name' => 'categoryAttributeId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'categoryAttributeId'
            )
        ));
        
        // categoryAttributeType
        $this->add(array(
            'type' => 'Select',
            'name' => 'categoryAttributeType',
            'options' => array(
                'label' => 'Type:',
                'value_options' => array(
                    'Text' => 'Text',
                    'Textarea' => 'Textarea',
                    'Boolean' => 'Boolean',
                    'Select' => 'Select'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'categoryAttributeType'
            )
        ));
        
        // categoryAttributeName
        $this->add(array(
            'name' => 'categoryAttributeName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Attribute Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'categoryAttributeName'
            )
        ));
        
        // categoryAttributeActive
        $this->add(array(
            'type' => 'Checkbox',
            'name' => 'categoryAttributeActive',
            'options' => array(
                'label' => 'Active',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            ),
            'attributes' => array(
                'id' => 'categoryAttributeActive'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array();
    }
}

