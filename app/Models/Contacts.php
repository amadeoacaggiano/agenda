<?php
require_once(appPath.'Config/Conn.php');

/**
 * @property string name
 * @property string last_name
 * @property string fone_1
 * @property string fone_2
 **/
class Contacts
{
    private $name;
    private $lastName;
    private $fone1;
    private $fone2;
    
    /**
     * Contrutor que seta os atributos recebidos ao contato
     **/
    public function __construct(array $fields)
    {
        foreach($fields as $attr => $value)
        {
            if( $attr != "save" && $attr != "acao" )
                $this->{$attr} = $value;
        }

    }
    
    /**
     * Método que salva na base de dados o contato
     * Ocorre após a validação dos campos
     **/
    public function save(Contacts $contact)
    {
        $params = array();

        try {
            $params = $this->setParameters($contact);

            $qry = "INSERT INTO contacts (name, last_name, fone_1, fone_2)
                    VALUES (?, ?, ?, ?)";

            $smt = Conn::getInstanceCon()->prepare($qry);
            $smt->execute( $params );
            
        }catch(Exception $e){
            throw new CustomException("Ocorreu um erro ao salvar o contato: ".$e->getMessage(), $e->getCode());
        }
    }

    /**
     * Método de edição do contato
     **/
    public function update(Contacts $contact)
    {
        try {
            $params = $this->setParameters($contact);

            $qry = "UPDATE contacts SET name = ?, last_name = ?, fone_1 = ?, fone_2 = ?
                    WHERE id = ? LIMIT 1";

            $smt = Conn::getInstanceCon()->prepare($qry);
            $smt->execute( $params );
        }catch(Exception $e){
            throw new CustomException("Ocorreu um erro ao editar o contato: ".$e->getMessage(), $e->getCode());
        }
    }

    /**
     * Método de listagem dos contatos da base
     **/
    public static function getList()
    {
        try{
            $qry = "SELECT * FROM contacts";

            $smt = Conn::getInstanceCon()->prepare($qry);
            $smt->execute();
            $result = $smt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new CustomException("Ocorreu um erro ao buscar a lista de contatos: ".$e->getMessage(), $e->getCode());
        }

        return $result;
    }

    public function setParameters($contact)
    {
        foreach ($contact as $key => $attr)
            $params[] = $attr;

        return $params;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFone1()
    {
        return $this->fone1;
    }

    /**
     * @param string $fone_1
     */
    public function setFone1($fone1)
    {
        $this->fone1 = $fone1;
    }

    /**
     * @return string
     */
    public function getFone2()
    {
        return $this->fone2;
    }

    /**
     * @param string $fone_2
     */
    public function setFone2($fone2)
    {
        $this->fone2 = $fone2;
    }
}