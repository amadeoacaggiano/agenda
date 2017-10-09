<?php
class Conn
{
    public static $conInstance;

    public static function getInstanceCon()
    {
        if (!isset(self::$conInstance)) {
            $settings = parse_ini_file('conf.cnf',true);
            if(!self::validateCnf($settings))
                throw new \Exception("Arquivo de configuração da base de dados inválido!", 412);

            $host = $settings['connection']['host'];
            $user = $settings['connection']['user'];
            $password = $settings['connection']['password'];
            $database = $settings['connection']['database'];

            try {
                self::$conInstance = new PDO('mysql:host=' . $host . ';dbname='. $database, $user, $password);
                self::$conInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conInstance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

            }catch (PDOException $e){
                throw new CustomException('Database Error: ' . $e->getMessage(), 500);
            }
        }

        return self::$conInstance;
    }

    public static function validateCnf($settings)
    {
        if(isset($settings['connection']))
        {
            $connectionSettings = $settings['connection'];
            if(isset($connectionSettings['user']) && isset($connectionSettings['password']) && isset($connectionSettings['database']) )
                return true;
        }
        return false;
    }
}