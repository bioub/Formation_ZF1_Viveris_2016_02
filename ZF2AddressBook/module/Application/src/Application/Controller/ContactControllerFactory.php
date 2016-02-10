<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

/**
 * Description of ContactControllerFactory
 *
 * @author Formation
 */
class ContactControllerFactory implements \Zend\ServiceManager\FactoryInterface
{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        
        $mapper = $serviceLocator->getServiceLocator()->get('Application\Mapper\Contact');
        return new ContactController($mapper);
    }

//put your code here
}
