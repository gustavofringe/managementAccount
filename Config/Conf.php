<?php
namespace App;
class Conf{
    static $databases = [
        'default' =>[
            'host'      =>'localhost',
            'database'  =>'managementAccount',
            'login'     =>'root',
            'password'  =>'root'
        ],
        'distrib' =>[
            'host'      =>'',
            'database'  =>'',
            'login'     =>'',
            'password'  =>''
        ]
    ];
}
