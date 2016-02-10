<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Formation
 */
class Application_Plugin_Login extends Zend_Controller_Plugin_Abstract {

    public function dispatchLoopStartup(\Zend_Controller_Request_Abstract $request) {
        $auth = Zend_Auth::getInstance();
        
        if (!$auth->hasIdentity() && $request->getModuleName() === 'back') {
            $frontController = Zend_Controller_Front::getInstance();
            $router = $frontController->getRouter();
            $url    = $router->assemble(['controller' => 'user', 'action' => 'se-loguer'], null, true);
            $this->getResponse()->setRedirect($url);
            
            $this->getResponse()->sendHeaders();
            exit();
        }
        
        
        
    }

}
