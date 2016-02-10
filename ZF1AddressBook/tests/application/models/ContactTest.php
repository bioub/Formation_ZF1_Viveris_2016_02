<?php

require_once __DIR__ . '/../../../application/models/Contact.php';

/**
 * Description of ContactTest
 *
 * @author Formation
 */
class Application_Model_ContactTest extends PHPUnit_Framework_TestCase
{
    
    public function testInitialsPropertiesAreNull()
    {
        $contact = new Application_Model_Contact();
        $this->assertNull($contact->getId());
        $this->assertNull($contact->getPrenom());
        $this->assertNull($contact->getNom());
        $this->assertNull($contact->getEmail());
        $this->assertNull($contact->getTelephone());
    }
    
}
