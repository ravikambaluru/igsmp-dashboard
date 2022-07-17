<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');


class Crud_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // --------------------------              ----------------------------------------------


  // -----------------------------   INSERT METHOD    -------------------------------------------
  public function fetch_data(string $cols = "*", string $table, $where, int $offset = 0, int $limit = 0)
  {



    // loop where conditions and set db_where conditions to get filtered result if where is array

    if (gettype($where) === "array") {
      if (sizeof($where) > 0) {

        foreach ($where as $key => $value) $this->db->where($key, $value);
      }
    } elseif (gettype($where) === "string") {

      $this->db->where($where);
    }


    $this->db->select($cols);

    $this->db->from($table);

    $this->db->order_by("id DESC");
    if ($limit > 0 || $offset > 0) $this->db->limit($limit, $offset);

    $queryObj = $this->db->get();

    return $queryObj;
  }

  // -------------------------------     FETCH METHOD   -----------------------------------------

  public function insert_data($table, array $data, $mode = "single")
  {

    // mode can be in two states : single / batch 

    if ($mode == "single") {

      return $this->db->insert($table, $data);
    } elseif ($mode === "batch") {

      return $this->db->batch_insert($table, $data);
    }
  }


  // -------------------------------     UPDATE  METHOD   -----------------------------------------

  public function update_data(string $table, array $data, array $where)
  {

    if (count($where) > 0) foreach ($where as $key => $value) $this->db->where($key, $value);

    if (count($data) > 0) foreach ($data as $key => $value) $this->db->set($key, $value);

    return $this->db->update($table);
  }


  // -------------------------------     UPDATE  METHOD   -----------------------------------------

  public function delete_data(string $table, array $where, string $mode = "normal")
  {

    if ($mode === "normal") {

      if (count($where) > 0) foreach ($where as $key => $value) $this->db->where($key, $value);

      return $this->db->delete($table) === false ? false : true;
    } elseif ($mode === "emptyTable") {

      return $this->db->empty_table($table);
    } elseif ($mode === "truncate") {
      return $this->db->truncate($table);
    }
  }
}

/* End of file Crud_model.php */
/* Location: ./application/models/Crud_model.php */