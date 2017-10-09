<?php
require_once(appPath.'ExceptionHandler/CustomException.php');
require_once(appPath.'Models/Contacts.php');
require_once(appPath.'Validators/ValidateContacts.php');
require_once(appPath.'Util.php');

class ContactController
{
    public function registerContact($request)
    {
        $returnData = array();
        try{
            $returnData["currentPath"] = "registerContact.php";

            if( isset($request['save']) )
            {
                $contact = new Contacts($request);
                $contact = ValidateContacts::validateNewContact($contact);

                # grava contato
                $contact->save($contact);
                $returnData["msg"] = 'Contato salvo com sucesso!';
            }

        }catch (\Exception $e){
            $returnData['error'] = $e->getMessage();
        }

        return $returnData;
    }

    public function listContacts($request)
    {
        try{
            $returnData["currentPath"] = "listContacts.php";
            $data = Contacts::getList();
            $returnData["contactsList"] = Util::adjustContact($data);

        }catch (\Exception $e){
            $returnData['error'] = $e->getMessage();
        }

        return $returnData;
    }

    public function editContacts($request)
    {
        $returnData = array();
        try{
            $returnData["currentPath"] = "listContacts.php";
            
            if( isset($request['contact']) )
            {
                foreach ($request['contact'] as $id => $contactInfo)
                {
                    $contactInfo['id'] = $id;
                    $contact = new Contacts($contactInfo);
                    $contact = ValidateContacts::validateNewContact($contact);
                    $contact->update($contact);
                }
            }

            $returnData = $this->listContacts(null);

        }catch (\Exception $e){
            $returnData['error'] = $e->getMessage();
        }

        return $returnData;
    }
}