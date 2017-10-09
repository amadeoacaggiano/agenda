<?php
class CustomException extends Exception{

    protected $name;

    public function __construct($message, $code = 0)
    {
        echo '<script>alert("' .$message . ' codigo de erro: '.$code.'");</script>';
    }
}