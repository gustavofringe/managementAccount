<?php
namespace Entity;

class Posts
{

    protected $name;
    protected $balance;
    protected $accountID;
    
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
     * getAccountID
     * @return mixed
     */
    public function getAccountID()
    {
        return $this->accountID;
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
        $accountID = (int) $accountID;
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
