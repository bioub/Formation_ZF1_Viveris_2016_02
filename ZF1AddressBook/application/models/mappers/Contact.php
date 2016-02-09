<?php

class Application_Model_Mapper_Contact
{
    protected $dbTable;
    
    public function __construct() {
        $this->dbTable = new Application_Model_DbTable_Contact();
    }
    
    /**
     * 
     * @return \Application_Model_Contact[]
     */
    public function findAll()
    {
        $rowset = $this->dbTable->fetchAll();
        
        $results = [];
        
        foreach ($rowset as $row) {
            $contact = new Application_Model_Contact();
            $contact->setId($row['id'])
                    ->setPrenom($row['prenom'])
                    ->setNom($row['nom'])
                    ->setEmail($row['email'])
                    ->setTelephone($row['telephone']);
            
            $results[] = $contact;
        }
        
        return $results;
    }
    
    /**
     * 
     * @param int $id
     * @return \Application_Model_Contact
     */
    public function find($id)
    {
        $rowset = $this->dbTable->find($id);
        
        $row = $rowset->current();
        
        if (!$row) {
            return null;
        }
        
        $contact = new Application_Model_Contact();
        $contact->setId($row['id'])
                ->setPrenom($row['prenom'])
                ->setNom($row['nom'])
                ->setEmail($row['email'])
                ->setTelephone($row['telephone']);
        
        return $contact;
    }
}
