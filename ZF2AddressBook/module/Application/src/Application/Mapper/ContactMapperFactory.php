<?php

namespace Application\Mapper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class ContactMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $gateway = $serviceLocator->get('Application\TableGateway\Contact');
        $hydrator = $serviceLocator->get('HydratorManager')->get('classmethods');
        
        return new ContactMapper($gateway, $hydrator);
    }
}
