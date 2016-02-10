<?php

class Front_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $element = new Zend_Form_Element_Text('login');
        $element->setLabel('Login')
                ->setRequired();
        
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Le login est obligatoire', Zend_Validate_NotEmpty::IS_EMPTY);
        $element->addValidator($validator);
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Password('password');
        $element->setLabel('Mot de passe')
                ->setRequired();
        
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Le mot de passe est obligatoire', Zend_Validate_NotEmpty::IS_EMPTY);
        $element->addValidator($validator);
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $this->addElement($element);
    }


}

