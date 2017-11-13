<?php
namespace Entity;

/**
 *
 * @var mixed
 */
class Pages
{
    protected $accountID;
    protected $name;
    protected $balance;
    
    /**
     * __construct
     * @param mixed $data
     * @return mixed
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    /**
     * hydrate
     * @param mixed $donnees
     * @return mixed
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
        
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    /**
     * getAccountID
     * @return mixed
     */
    public function getAccountID()
    {
        return $this->accountID;
    }
    /**
     * getName
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * getBalance
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }
    /**
     * setName
     * @param mixed $name
     * @return mixed
     */
    public function setName($name)
    {
        $name = (string) $name;
        $this->name = $name;
    }
    /**
     * setAccountID
     * @param mixed $accountID
     * @return mixed
     */
    public function setAccountID($accountID)
    {
        $name = (int) $accountID;
        $this->accountID = $accountID;
    }
    /**
     * setBalance
     * @param mixed $balance
     * @return mixed
     */
    public function setBalance($balance)
    {
        $balance = (float) $balance;
        $this->balance = $balance;
    }
}
