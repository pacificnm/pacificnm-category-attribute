<?php

namespace Pacificnm\CategoryAttribute\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttribute\Service\ServiceInterface;

class DeleteController extends AbstractApplicationController
{

    protected $service = null;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $id = $this->params()->fromRoute('id');

        $entity = $this->service->get($id);

        if (! $entity) {
        	$this->flashmessenger()->addErrorMessage('Object was not found.');
        	return $this->redirect()->toRoute('category-attribute-index');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
        	$del = $request->getPost('delete_confirmation', 'no');
        	if ($del === 'yes') {
        		$this->service->delete($entity);

        		$this->getEventManager()->trigger('category-attribute-delete', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'categoryAttributeEntity' => $entity
        		));

        		$this->flashmessenger()->addSuccessMessage('Object was deleted');

        		return $this->redirect()->toRoute('category-attribute-index');
        	}

        	return $this->redirect()->toRoute('category-attribute-view', array('id' => $id));
        }

        return new ViewModel(array(
        	'entity' => $entity
        ));
    }


}

