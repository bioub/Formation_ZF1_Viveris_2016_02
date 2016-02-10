<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Mapper;

use Application\Entity\Contact;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\HydratorInterface;

/**
 * Description of ContactMapper
 *
 * @author Formation
 */
class ContactMapper
{
    /**
     *
     * @var TableGateway
     */
    protected $gateway;
    
    /**
     *
     * @var HydratorInterface
     */
    protected $hydrator;
    
    public function __construct(TableGateway $gateway, HydratorInterface $hydrator) {
        $this->gateway = $gateway;
        $this->hydrator = $hydrator;
    }
 
    /**
     * 
     * @return Contact[]
     */
    public function findAll()
    {
        $rowset = $this->gateway->select();
        
        $results = [];
        
        foreach ($rowset as $row) {
            $contact = new Contact();
            $this->hydrator->hydrate((array) $row, $contact);
            
            $results[] = $contact;
        }
        
        return $results;
    }
}
