<?php
namespace Entity;

class PagesManager{

    protected $accountID;
    protected $name;
    protected $balance;
    
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
    public function getAccountID(){
        return $this->accountID;
    }
    public function getName(){
        return $this->name;
    }
    public function getBalance(){
        return $this->balance;
    }
    public function setName($name){
        $name = (string) $name;
        $this->name = $name;
    }
    public function setAccountID($accountID){
        $name = (int) $accountID;
        $this->accountID = $accountID;
    }
    public function setBalance($balance){
        $balance = (float) $balance;
        $this->balance = $balance;
    }
}
