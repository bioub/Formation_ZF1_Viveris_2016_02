<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

use Application\Mapper\ContactMapper;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of ContactController
 *
 * @author Formation
 */
class ContactController extends AbstractActionController
{
    /**
     *
     * @var ContactMapper
     */
    protected $mapper;
    
    public function __construct(ContactMapper $mapper) {
        $this->mapper = $mapper;
    }

    public function listAction()
    {
        return new ViewModel([
            'contacts' => $this->mapper->findAll()
        ]);
    }
}
