<?php
namespace Entity;

class Posts{

    protected $name;
    protected $balance;
    protected $accountID;
    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }
    public function getName(){
        return $this->name;
    }
    public function getBalance(){
        return $this->balance;
    }
    public function getAccountID(){
        return $this->accountID;
    }
    public function setName($name){
        $name = (string) $name;
        $this->name = $name;
    }
    public function setAccountID($accountID){
        $accountID = (int) $accountID;
        $this->accountID = $accountID;
    }
    public function setBalance($balance){
        $balance = (float) $balance;
        $this->balance = $balance;
    }
}
