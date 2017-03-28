<?php

class Atezate_Form_KlearTelefono extends Zend_Form
{

    public function init()
    {
        $this->clearDecorators()
            ->addDecorator('FormElements')
            ->addDecorator('Form', array('class' => 'klearMatrix_form'))
            ->addDecorator('HtmlTag', array('tag' => 'div', 'class' => 'ui-widget-content ui-corner-bottom spaceTel'))
            ->setElementDecorators(array(
                array('ViewHelper', array('class' => 'ui-widget ui-state-default ui-corner-all')),
                array('Errors'),
                array('Label'),
                array('HtmlTag')
            )
        );

        $this->setMethod('post');
        $this->setAttrib('id', 'formPersonal');

        $this->addElement(
            'text',
            'telefono',
            array(
                'label' => 'Nuevo número',
                'class' => 'ui-widget ui-state-default ui-corner-all',
                'style' => 'width: 90%',
                'validators' => array(
        			array('validator' => 'NotEmpty', 'breakChainOnFailure' => true, 'options' => array('messages' => array(
                    'isEmpty' => 'Dato requerido'
                    ))),
    				array('Digits', true, array('messages' => array(
                    Zend_Validate_Digits::INVALID => 'El dato introducido no es correcto.',
                    Zend_Validate_Digits::NOT_DIGITS => 'Solo puede agregar números (sin punto ni coma).',
                    Zend_Validate_Digits::STRING_EMPTY => 'Dato requerido.'
               		))),
                ),
            )
        );
        
        $this->addElement(
            'select',
            'tipo', 
            array(
                'label' => 'Tipo', 
                'value' => 'movil',
                'class' => 'selectboxit ui-widget ui-state-default ui-corner-all',
                'multiOptions' => array( 
                    'movil' => 'Móvil', 
                    'fijo' => 'Fijo'), 
            )
        );
    }
}