<?php
namespace App;

class Service
{

    /**
     * @param $pass
     * @return string
     */
    public function hashPass($pass)
    {
        if (isset($pass)) {
            $passHash = sha1($pass);
            return $passHash;
        }
    }
}
