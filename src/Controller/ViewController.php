<?php
namespace Pacificnm\CategoryAttribute\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttribute\Service\ServiceInterface;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface as OptionsServiceInterface;

class ViewController extends AbstractApplicationController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var OptionsServiceInterface
     */
    protected $optionService;

    /**
     *
     * @param ServiceInterface $service            
     * @param OptionsServiceInterface $optionService            
     */
    public function __construct(ServiceInterface $service, OptionsServiceInterface $optionService)
    {
        $this->service = $service;
        
        $this->optionService = $optionService;
    }

    /**
     *
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
            $this->flashMessenger()->addErrorMessage('Object was not found');
            return $this->redirect()->toRoute('category-attribute-index');
        }
        
        $optionEntitys = $this->optionService->getAll(array(
            'pagination' => 'off',
            'categoryAttributeId' => $id
        ));
        
        $this->getEventManager()->trigger('category-attribute-view', $this, array(
            'authId' => $this->identity()
                ->getAuthId(),
            'requestUrl' => $this->getRequest()
                ->getUri(),
            'categoryAttributeEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity,
            'optionEntitys' => $optionEntitys
        ));
    }
}

