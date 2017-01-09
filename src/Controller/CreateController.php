<?php

namespace Pacificnm\CategoryAttribute\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttribute\Service\ServiceInterface;
use Pacificnm\CategoryAttribute\Form\Form;

class CreateController extends AbstractApplicationController
{

    protected $service = null;

    protected $form = null;

    /**
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;

        $this->form = $form;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $request = $this->getRequest();

        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$entity = $this->form->getData();

        		$categoryAttributeEntity = $this->service->save($entity);

        		$this->getEventManager()->trigger('category-attribute-create', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'categoryAttributeEntity' => $entity
        		));

        		$this->flashMessenger()->addSuccessMessage('Object was saved');

        		return $this->redirect()->toRoute('category-attribute-view', array(
        			'id' => $categoryAttributeEntity->getCategoryAttributeId()
        		));
        	}
        }
        
        return new ViewModel(array(
        	'form' => $this->form
        ));
    }


}

