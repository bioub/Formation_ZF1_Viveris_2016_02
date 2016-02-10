<?php

class ContactController extends Zend_Controller_Action
{
    /**
     *
     * @var \Application_Model_Mapper_Contact
     */
    protected $mapper;
    
    /**
     * FlashMessenger
     *
     * @var Zend_Controller_Action_Helper_FlashMessenger
     */
    protected $_flashMessenger = null;
    
    /**
     * Redirector - défini pour l'auto-complétion
     *
     * @var Zend_Controller_Action_Helper_Redirector
     */
    protected $_redirector = null;
    
    /**
     *
     * @var Zend_Controller_Request_Http
     */
    protected $_request;

    public function init()
    {
        /* Initialize action controller here */
        $this->mapper = new Application_Model_Mapper_Contact();
        $this->_flashMessenger = $this->_helper
                                      ->getHelper('FlashMessenger');
        
        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction()
    {
        $this->view->contacts = $this->mapper->findAll();
        $this->view->flashMessages = $this->_flashMessenger->getMessages();
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
    
    public function addAction() 
    {
        $form = new Front_Form_Contact();
        
        if ($this->_request->isPost()) {
            
            $data = $this->_request->getPost();
            
            if ($form->isValid($data)) {
                $dataFiltrees = $form->getValues();
                
                $contact = new Application_Model_Contact();
                $contact->setPrenom($dataFiltrees['prenom'])
                        ->setNom($dataFiltrees['nom'])
                        ->setEmail($dataFiltrees['email'])
                        ->setTelephone($dataFiltrees['telephone']);
                
                $this->mapper->insert($contact);
                
                $this->_flashMessenger->addMessage('Le contact ' . $contact->getPrenom() . ' a bien été créé');
                
                $this->_redirector->gotoRouteAndExit(['controller' => 'contact'], null, true);
            }
        }
        
        $this->view->contactForm = $form;
    }
}

