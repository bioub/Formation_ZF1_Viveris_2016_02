<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormBootstrap
 *
 * @author Formation
 */
class Zend_View_Helper_FormBootstrap extends Zend_View_Helper_Abstract
{
    public function formBootstrap(Zend_Form $form, $submitLabel = 'Valider')
    {
        $html = $form->renderForm(false);
        
        foreach ($form->getElements() as $element) {
            $element->getDecorator('label')->setOption('tag', null);
            // TODO retirer la class error du ul
            
            $html .= ($element->getMessages()) ? '<div class="form-group has-error">' : '<div class="form-group">';
            
            $html .= $element->renderLabel();
            $html .= $element->setAttrib('class', 'form-control')->renderViewHelper();
            
            if ($element->getMessages()) {
                $html .= '<div class="help-block">';
                $html .= $element->renderErrors();
                $html .= '</div>';
            }
            
            $html .= '</div>';
            
        }
        
        $html .= '<button type="submit" class="btn btn-primary">'.$submitLabel.'</button>';
        
        $html .= '</form>';
        
        return $html;
    }
}
