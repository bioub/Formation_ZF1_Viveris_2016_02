<?php

class ContactControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testIndexActionAreAccessible()
    {
        $this->dispatch('/contact');
        $this->assertResponseCode(200);
        $this->assertController('contact');
        $this->assertAction('index');
    }
    
    public function testIndexActionContainsContactMySQL()
    {
        $this->dispatch('/contact');
        
        $this->assertQueryCount('table.table > tr', 5);
    }
    
    public function testIndexActionContainsContactMock()
    {
        $mock = $this->getMockBuilder('Application_Model_Mapper_Contact')
                     ->disableOriginalConstructor()
                     ->getMock();
        
        $mock->expects($this->once())
             ->method('findAll')
             ->willReturn([]);
        
        Zend_Registry::set('contactMapper', $mock);
        
        $this->dispatch('/contact');
        
        $this->assertQueryCount('table.table > tr', 0);
    }

}

