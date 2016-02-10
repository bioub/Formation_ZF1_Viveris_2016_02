<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function seLoguerAction()
    {
        $form = new Front_Form_Login();
        
        if ($this->_request->isPost()) {
            
            $data = $this->_request->getPost();
            
            if ($form->isValid($data)) {
                $dataFiltrees = $form->getValues();
                
                $adapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter(),
                                         'utilisateurs',
                                         'login',
                                         'password',
                                         'MD5(?)');
                
                $adapter->setIdentity($dataFiltrees['login'])
                        ->setCredential($dataFiltrees['password']);
                
                $auth = $adapter->authenticate();
                
                if ($auth->isValid()) {
                    
                    $storage = Zend_Auth::getInstance()->getStorage();
                    $storage->write($dataFiltrees['login']);
                    
                    $this->redirect('/back');
                }
                else {
                    $form->getElement('password')->setErrors(['Mauvais login/pass']);
                }
            }
        }
        
        $this->view->loginForm = $form;
    }

}



