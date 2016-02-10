<?php

namespace Application\TableGateway;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of TableGatewayAbstractFactory
 *
 * @author Formation
 */
class TableGatewayAbstractFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return strpos($requestedName, 'Application\TableGateway\\') === 0;
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        list(,,$table) = explode('\\', $requestedName);
        
        $adapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        
        return new \Zend\Db\TableGateway\TableGateway($table, $adapter);
    }

//put your code here
}
