<?php

class ContactController extends Zend_Controller_Action
{
    /**
     *
     * @var \Application_Model_Mapper_Contact
     */
    protected $mapper;

    public function init()
    {
        /* Initialize action controller here */
        $this->mapper = new Application_Model_Mapper_Contact();
    }

    public function indexAction()
    {
        $this->view->contacts = $this->mapper->findAll();
    }

    public function showAction()
    {
        $id = $this->getParam('id');
        
        $contact = $this->mapper->find($id);
        
        if (!$contact) {
            throw new Zend_Controller_Router_Exception('Page introuvable', 404);
        }
        
        $this->view->contact = $contact;
    }
}

