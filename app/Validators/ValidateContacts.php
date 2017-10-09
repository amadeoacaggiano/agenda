<?php

# imports
require_once(appPath.'ExceptionHandler/CustomException.php');
require_once(appPath.'Models/Contacts.php');

class ValidateContacts
{   
    /**
     * Valida campos para inclusão 
     **/
    public static function validateNewContact(Contacts $contact)
    {
        if( empty($contact->getName()) ||
            empty($contact->getLastName()) ||
            empty($contact->getFone1()) ||
            empty($contact->getFone2())
        )
            throw new CustomException("Informações faltantes no contato!");

        for($i=1; $i<3; $i++)
        {
            $fone = $contact->{'getFone'.$i}();
            $fone = str_replace('(', '', $fone);
            $fone = str_replace(')', '', $fone);
            $fone = str_replace('-', '', $fone);
            $fone = str_replace(' ', '', $fone);

            $contact->{'setFone'.$i}($fone);
        }

        return $contact;
    }
}