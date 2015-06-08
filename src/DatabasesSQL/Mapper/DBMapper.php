<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL\Mapper
 */
namespace App\DatabasesSQL\Mapper;

/**
 * Interface DBMapper
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
interface DBMapper
{
    public function fetchAll(array $columns = array(), array $where = array(), $order = null, $limit = null);
    public function find($id);
    public function insert(array $columns = array(), array $values = array());
    public function delete(array $where = array());
    public function update(array $where = array());
}
