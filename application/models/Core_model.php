<?php
class Core_model extends CI_Model{
  function __construct(){
    parent::__construct();
    // $this->first();
  }

  function get_data_by_where($table, $where){
    $obj = $this->db->where($where)
    ->get($table)
    ->row_array();
    return $obj;
  }
  
  function by_where_select($table, $where, $select){
    $obj = $this->db->select($select)
    ->where($where) 
    ->get($table)
    ->row_array();
    return $obj;
  }
  
  function where_result_order_by($table,$where,$order){
    $this->db->where($where);
    foreach ($order as $key => $value){
      if (is_array($value)){
        foreach ($value as $orderby => $orderval){
          $this->db->order_by($orderby, $orderval);
        }
      } 
      else{
        $this->db->order_by($key, $value);
      }
    }
    return $this->db->get($table)->result_array();
  }
  
  function  insert_data($table, $data){
    $this->db->insert($table, $data);
  }
  
  function update_data_by_where($table, $data, $where){
    $this->db->where($where)
    ->update($table, $data);
  }
  
  function update_data($table, $data){
    $this->db->update($table, $data);
  }
  
  function get_all_data($table){
    return $this->db->get($table)
    ->result_array();
  }
  
  function get_data_by_where_result($table, $where){
    $obj = $this->db->where($where)
    ->get($table)
    ->result_array();
    return $obj;
  }
  
  function delete_data_by_where($table, $where){
    $this->db->where($where)->delete($table);
  }
  function joinQuery($options){
    // print_r($options);
    // die();
    $select = false;
    $table = false;
    $join = false;
    $order = false;
    $limit = false;
    $offset = false;
    $where = false;
    $or_where = false;
    $group_by = false;
    $single = false;
    $where_not_in = false;
    $like = false;

    extract($options);

    if ($select != false)
      $this->db->select($select);

    if ($table != false)
      $this->db->from($table);

    if ($where != false)
      $this->db->where($where);

    if ($where_not_in != false) {
      foreach ($where_not_in as $key => $value) {
        if (count($value) > 0)
          $this->db->where_not_in($key, $value);
      }
    }
    if ($like != false) {
      if(is_array($like)){
        foreach ($like as $index => $value){
          if($index == 0){
            $this->db->like($value[0], $value[1], $value[2]);
          }
          else{
            $this->db->or_like($value[0], $value[1], $value[2]);
          }
        }
      }
      else{
        $this->db->like($like);
      }
    }
    if ($or_where != false)
      $this->db->or_where($or_where);

    if ($limit != false) {
      if (!is_array($limit)) {
        $this->db->limit($limit);
      } else {
        foreach ($limit as $limitval => $offset) {
          $this->db->limit($limitval, $offset);
        }
      }
    }
    if($group_by != false){
      
      $this->db->group_by($group_by);

    }
    if ($order != false) {
      if( is_array($order) ){
        foreach ($order as $key => $value) {
  
          if (is_array($value)) {
            foreach ($order as $orderby => $orderval) {
              $this->db->order_by($orderby, $orderval);
            }
          } else {
            $this->db->order_by($key, $value);
          }
        }
      }
      else{
        $this->db->order_by($order);
      }

    }
    if ($join != false) {
      foreach ($join as $key => $value) {
        if (is_array($value)) {
          if (count($value) == 3){
            $this->db->join($value[0], $value[1], $value[2]);
          } 
          else{
            foreach ($value as $key1 => $value1) {
              $this->db->join($key1, $value1);
            }
          }
        } else {
          $this->db->join($key, $value);
        }
      }
    }
    $query = $this->db->get();
    if ($single) {
      return $query->row_array();
    }
   // echo $this->db->last_query();
    return $query->result_array();
  }
}
?>