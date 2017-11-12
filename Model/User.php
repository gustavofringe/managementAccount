<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 10/11/17
 * Time: 22:16
 */
use App\Model;
class User extends Model
{
    protected $fillable = [
        'name'=>[
            'rule'=>'preg',
            'cond'=>'([a-zA-Z0-9\s]+)',
            'message'=>'Uniquement des caractères alphanumerique'
        ]
    ];
}