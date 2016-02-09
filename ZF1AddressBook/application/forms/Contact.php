<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        // TODO setMethod
        
        $element = new Zend_Form_Element_Text('prenom');
        $element->setLabel('Prénom')
                ->setRequired();
        
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Le prénom est obligatoire', Zend_Validate_NotEmpty::IS_EMPTY);
        $element->addValidator($validator);
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('nom');
        $element->setLabel('Nom')
                ->setRequired();
        
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Le nom est obligatoire', Zend_Validate_NotEmpty::IS_EMPTY);
        $element->addValidator($validator);
        
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('email');
        $element->setLabel('Email');
        
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('telephone');
        $element->setLabel('Téléphone');
        
        $this->addElement($element);
    }


}

