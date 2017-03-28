<?php

class Atezate_Form_KlearEmail extends Zend_Form
{

    public function init()
    {
        $this->clearDecorators()
            ->addDecorator('FormElements')
            ->addDecorator('Form', array('class' => 'klearMatrix_form'))
            ->addDecorator('HtmlTag', array('tag' => 'div', 'class' => 'ui-widget-content ui-corner-bottom'))
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
            'email',
            array(
                'class' => 'ui-widget ui-state-default ui-corner-all',
                'placeholder' => 'name@dominio.com',
                'style' => 'width: 90%',
                'validators' => array(
                    array('validator' => 'NotEmpty', 'breakChainOnFailure' => true, 'options' => array('messages' => array(
                                    'isEmpty' => 'Dato requerido'
                    ))),
                    array('EmailAddress', FALSE, array('messages' => array(
                        Zend_Validate_EmailAddress::QUOTED_STRING => "'%localPart%' no concuerda con el formato quoted-string",
                        Zend_Validate_EmailAddress::DOT_ATOM => "'%localPart%' no concuerda con el formato de punto",
                        Zend_Validate_EmailAddress::INVALID => "'%value%' no es una dirección de correo válida en el formato local-part@hostname",
                        Zend_Validate_EmailAddress::INVALID_HOSTNAME => "'%hostname%' no es un nombre de dominio válido para '%value%'",
                        Zend_Validate_EmailAddress::INVALID_LOCAL_PART => "'%localPart%' no es una parte local válida para la dirección de correo '%value%'",
                        Zend_Validate_EmailAddress::INVALID_MX_RECORD => "'%hostname%' no parece tener un registro MX válido para la dirección '%value%'",
                        Zend_Validate_EmailAddress::INVALID_FORMAT     => "'%value%' no es una dirección de correo válido (name@hostname)",
                        Zend_Validate_EmailAddress::INVALID_SEGMENT    => "5. '%hostname%' is not in a routable network segment. The email address '%value%' should not be resolved from public network",
                        Zend_Validate_EmailAddress::DOT_ATOM           => "'%localPart%' no concuerda con el formato dot-atom"	,
                        Zend_Validate_EmailAddress::LENGTH_EXCEEDED    => "'%value%' excede la longitud permitida",
                        	
                        Zend_Validate_Hostname::IP_ADDRESS_NOT_ALLOWED => "'%value%' parece ser una dirección IP, pero no están permitidas",
                        Zend_Validate_Hostname::UNKNOWN_TLD => "'%value%' parece ser un nombre de servidor DNS pero no pudo ser encontrado en la lista de TLD conocidos",
                        Zend_Validate_Hostname::INVALID_DASH => "'%value%' parece ser un nombre de servidor DNS pero contiene un guión (-) en una posición inválida",
                        Zend_Validate_Hostname::INVALID_HOSTNAME_SCHEMA => "'%value%' parece ser un nombre de servidor DNS pero no concuerda con el patrón TLD '%tld%'",
                        Zend_Validate_Hostname::UNDECIPHERABLE_TLD => "'%value%' parece ser un nombre de servidor DNS pero no es posible extraer la parte TLD",
                        Zend_Validate_Hostname::INVALID_HOSTNAME => "'%value%' no concuerda con la estructura esperada para un nombre de servidor DNS",
                        Zend_Validate_Hostname::INVALID_LOCAL_NAME => "'%value%' no parece ser un nombre de red local válido",
                        Zend_Validate_Hostname::LOCAL_NAME_NOT_ALLOWED => "'%value%' parece ser un nombre de red local pero no están permitidos",
                    ))),
                )
            )
        );
    }
}