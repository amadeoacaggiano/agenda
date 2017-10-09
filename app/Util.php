<?php

class Util
{
    /**
    * Ajusta campos para exibição
    **/
    public static function adjustContact(array $data)
    {
        foreach( $data as &$contact )
        {
            for($i=1;$i<3;$i++)
            {
                if(isset($contact["fone_".$i]))
                    $contact["fone_".$i] = self::formatPhoneNumber($contact["fone_".$i]);
            }
        }

        return $data;
    }

    /**
     * Ajusta telefones para exibição
     **/
    private static function formatPhoneNumber($phone)
    {
        if( strlen($phone) == 11 )
            $phone = '('.substr($phone, 0, 2).') '.substr($phone, 3, 4).'-'.substr($phone,7);
        else
            $phone = '('.substr($phone, 0, 2).') '.substr($phone, 2, 4).'-'.substr($phone,6);

        return $phone;
    }
}