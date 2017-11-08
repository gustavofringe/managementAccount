<?php

namespace App;

use App\Form;
use function dd;
use const FILTER_SANITIZE_STRING;
use function in_array;
use const INPUT_POST;
use \PDO;
use \PDOException;
use function print_r;

/**
 * @property  Request
 */
class Model
{
    static $connections = [];
    public $conf = 'default';
    public $db;
    public $id;
    public $crash;
    protected $fillable = [];

    /**
     * database connection
     * Model constructor.
     */
    public function __construct()
    {
        $conf = Conf::$databases[$this->conf];
        try {
            $pdo = new PDO(
                'mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';',
                $conf['login'],
                $conf['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            Model::$connections[$this->conf] = $pdo;
            $this->db = $pdo;
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion avec le code : ' . $e->getCode();
            die();
        }
    }


    /**
     * validate fields
     * @param $data
     * @return bool
     */
    public function validates($data)
    {
        Form::$errors = [];
        foreach ($this->fillable as $k => $v) {
            if (isset($data->$k)) {
                if ($v['rule'] === 'notEmpty') {
                    if (empty($data->$k)) {
                        Form::$errors[$k] = $v['message'];
                    }
                } elseif ($v['rule'] === 'sanitize') {
                    $data->$k = filter_var($data->$k, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
                    return $data->$k;
                } elseif ($v['rule'] === 'url') {
                    if (isset($data->$k) && !filter_var($data->$k, FILTER_VALIDATE_URL)) {
                        Form::$errors[$k] = $v['message'];
                    }
                } elseif ($v['rule'] === 'email') {
                    if (isset($data->$k) && !filter_var($data->$k, FILTER_VALIDATE_EMAIL)) {
                        Form::$errors[$k] = $v['message'];
                    }
                } elseif ($v['rule'] === 'img') {
                    $ext = strtolower(substr($data->$k['name'], -3));
                    if (!in_array($ext, $v['cond'])) {
                        Form::$errors[$k] = $v['message'];
                    }
                } elseif ($v['rule'] === 'preg') {
                    if (!preg_match('/^' . $v['cond'] . '$/', $data->$k)) {
                        Form::$errors[$k] = $v['message'];
                    }
                }
            }
        }
        $this->crash = Form::$errors;
        if (isset($this->Form)) {
            $this->Form->crash = Form::$errors;
        }
        if (empty(Form::$errors)) {
            return true;
        }
        return false;
    }


    /**
     * find all in table
     * @param array $req
     * @return array
     */
    public function findAll($table, array $req)
    {
        $sql = 'SELECT ';
        //distinct fields
        if (isset($req['distinct'])) {
            if (is_array($req['distinct'])) {
                $sql .= 'DISTINCT ' . implode(', ', $req['distinct']);
            } else {
                $sql .= 'DISTINCT ' . $req['distinct'];
            }
            //count field
        } else if (isset($req['count'])) {
            $sql .= $req['field'] . ', COUNT(' . $req['count'] . ') as ' . $req['as'];
        } else if (isset($req['fields'])) {
            if (is_array($req['fields'])) {
                $sql .= implode(', ', $req['fields']);
            } else {
                $sql .= $req['fields'];
            }
            //concat field
        } else if (isset($req['concat'])) {
            $sql .= $req['field'] . ', GROUP_CONCAT(' . $req['concat'] . ')';
            //max value
        } else if (isset($req['max'])) {
            $sql .= $req['field'] . ', MAX(' . $req['max'] . ')';
        } else {
            $sql .= '*';
        }
        $sql .= ' FROM ' . $table;
        //left join
        if (isset($req['leftjoin'])) {
            foreach ($req['leftjoin'] as $k => $v) {
                $sql .= ' LEFT JOIN ' . $k . ' ON ' . $v . ' ';
            }
        }
        //right join
        if (isset($req['rightjoin'])) {
            foreach ($req['rightjoin'] as $k => $v) {
                $sql .= ' RIGHT JOIN ' . $k . ' ON ' . $v . ' ';
            }
        }
        //left join
        if (isset($req['innerjoin'])) {
            foreach ($req['innerjoin'] as $k => $v) {
                $sql .= ' INNER JOIN ' . $k . ' ON ' . $v . ' ';
            }
        }
        //group by
        if (isset($req['group'])) {
            $sql .= ' GROUP BY ' . $req['group'];
        }
        //array conditions
        if (isset($req['conditions'])) {
            $sql .= ' WHERE ';
            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = [];
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = "'" . $v . "'";
                    }
                    $cond[] = $k . "=" . $v;
                }
                $sql .= implode(' AND ', $cond);
            }
        }
        //order by
        if (isset($req['order'])) {
            $sql .= ' ORDER BY ' . $req['order'];
        }
        //limit
        if (isset($req['limit'])) {
            $sql .= ' LIMIT ' . $req['limit'];
        }
        //prepare request
        $pre = $this->db->prepare($sql);
        //execute request
        $pre->execute();
        // fetchall
        return $pre->fetchAll();
    }

    /**
     *find the first request
     * @param $req
     * @return mixed
     */
    public function findFirst($table, $req)
    {
        return current($this->findAll($table, $req));
    }


    /**
     * delete element from table
     * @param $table
     * @param $id
     */
    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE ";
        $sql .= substr($table, 0, -1) . 'ID =' . $id;
        $this->db->query($sql);
    }

    /**
     * @param $table
     * @param $datas
     */
    public function save($table, $datas)
    {
        $key = substr($table, 0, -1) . 'ID';
        $fields = [];
        $data = [];
        foreach ($datas as $k => $v) {
            if ($k != $key) {
                $fields[] = "$k=:$k";
                $data[":$k"] = $v;
            } elseif (!empty($v)) {
                $data[":$k"] = $v;
            }
        }
        if (isset($datas->$key) && !empty($datas->$key)) {
            $sql = 'UPDATE ' . $table . ' SET ' . implode(',', $fields) . ' WHERE ' . $key . '=:' . $key;
            $this->id = $datas->$key;
            $action = 'update';
        } else {
            $sql = 'INSERT INTO ' . $table . ' SET ' . implode(',', $fields);
            $action = 'insert';
        }
        return $sql;
        //prepare request
        $pre = $this->db->prepare($sql);
        //execute request
        $pre->execute($data);
        //recover id if insert
        if ($action == 'insert') {
            $this->id = $this->db->lastInsertId();
        }
    }
}
