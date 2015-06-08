<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL\Model
 */
namespace App\DatabasesSQL\Model;

use App\DatabasesSQL\Mapper\MysqlMapper;

/**
 * Class UserDAO
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class UserDAO extends MysqlMapper
{
    // seleciona tabela a qual serão realizadas operações
    protected $table = 'users';

    public function __construct()
    {
    }

    public function getUsers()
    {
        return $this->fetchAll();
    }
}
