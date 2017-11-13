<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 06/11/17
 * Time: 19:56
 */
use App\Model;

class Post extends Model
{
    protected $fillable = [
        'balance'=>[
            'rule'=>'preg',
            'cond'=>'([0-9\.]+)',
            'message'=>'Ne doit contenir que des caractères numeriques et .'
        ]
    ];
}
