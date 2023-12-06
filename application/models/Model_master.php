<?php
class Model_master extends CI_model{
    function getSequenceID($table, $column) {
        $this->db->select_max($column, 'SEQUENCE_ID');
        $get = $this->db->get($table);
        $row = $get->row();
        return $row->SEQUENCE_ID;
    }
    
    function getDataInRow($table, $column, $where, $param) {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($where, $param);
        $get = $this->db->get();
        $row = $get->row();
        return $row;
    }

    function getDataInRowFalse($table, $column, $where, $param) {
        $this->db->select($column, false);
        $this->db->from($table);
        $this->db->where($where, $param);
        $get = $this->db->get();
        $row = $get->row();
        return $row;
    }

    public function getAllData($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWithOrder($table, $column, $typeOrder){
        $this->db->select('*');
        $this->db->order_by($column, $typeOrder);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function getAllDataWithOrderPage($table, $column, $typeOrder, $limit, $start){
        $this->db->select('*');
        $this->db->order_by($column, $typeOrder);
        $query = $this->db->get($table, $limit, $start);
        return $query->result_array();
    }

    public function getAllDataWithParameter($table,$where,$param){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWith2Parameter($table,$where,$param,$where2,$param2){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->where($where2, $param2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWith3Parameter($table,$where,$param,$where2,$param2,$where3,$param3){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->where($where2, $param2);
        $this->db->where($where3, $param3);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWith3ParameterOrder($table,$where,$param,$where2,$param2,$where3,$param3, $column, $type){
        $this->db->select('*');
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where, $param);
        }
        if ($where2 != '') {
            $this->db->where($where2, $param2);
        }
        if ($where3 != '') {
            $this->db->where($where3, $param3);
        }
        if ($column != '') {
            $this->db->order_by($column, $type);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWith4Parameter($table,$where,$param,$where2,$param2,$where3,$param3,$where4,$param4){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->where($where2, $param2);
        $this->db->where($where3, $param3);
        $this->db->where($where4, $param4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWith5Parameter($table,$where,$param,$where2,$param2,$where3,$param3,$where4,$param4,$where5,$param5){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->where($where2, $param2);
        $this->db->where($where3, $param3);
        $this->db->where($where4, $param4);
        $this->db->where($where5, $param5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWithParameterOrder($table,$where,$param, $column, $typeOrder){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->order_by($column, $typeOrder);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWithParameterOrderPage($table,$where,$param, $column, $typeOrder, $limit, $start){
        $this->db->select('*');
        $this->db->where($where, $param);
        $this->db->order_by($column, $typeOrder);
        $query = $this->db->get($table, $limit, $start);
        return $query->result_array();
    }

    public function getAllDataWith2ParameterOrder($table, $where, $param, $where2, $param2, $column, $typeOrder){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->where($where2, $param2);
        $this->db->order_by($column, $typeOrder);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDataWithJoin($table, $table1, $join1, $table2, $join2, $table3, $join3){
        $this->db->select('*');
        $this->db->from($table);
        if ($table1 != '') {
            $this->db->join($table1, $join1);
        }
        if ($table2 != '') {
            $this->db->join($table2, $join2);
        }
        if ($table3 != '') {
            $this->db->join($table3, $join3);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getData($table,$where,$param){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $param);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getCountDataWith2Parameter($table,$where,$param,$where2,$param2){
        $this->db->select('count(*) as total');
        $this->db->from($table);
        $this->db->where($where, $param);
        $this->db->where($where2, $param2);
        $get = $this->db->get();
        $row = $get->row();
        return $row->TOTAL;
    }

    public function getCountDataWithParameter($table,$where,$param){
        $this->db->select('count(*) as total');
        $this->db->from($table);
        $this->db->where($where, $param);
        $get = $this->db->get();
        $row = $get->row();
        return $row->TOTAL;
    }

    public function getDataWithJoinWhere($table, $table1, $join1, $table2, $join2, $table3, $join3, $where, $param, $where2, $param2){
        $this->db->select('*');
        $this->db->from($table);
        if ($table1 != NULL) {
            $this->db->join($table1, $join1);
        }
        if ($table2 != NULL) {
            $this->db->join($table2, $join2);
        }
        if ($table3 != NULL) {
            $this->db->join($table3, $join3);
        }
        if ($where != NULL) {
            $this->db->where($where, $param);
        }
        if ($where2 != NULL) {
            $this->db->where($where2, $param2);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataWithJoinTypeWhere($table, $table1, $join1, $type1, $table2, $join2, $type2, $table3, $join3, $type3, $where, $param){
        $this->db->select('*');
        $this->db->from($table);
        if ($table1 != NULL) {
            $this->db->join($table1, $join1, $type1);
        }
        if ($table2 != NULL) {
            $this->db->join($table2, $join2, $type2);
        }
        if ($table3 != NULL) {
            $this->db->join($table3, $join3, $type3);
        }
        if ($where != NULL) {
            $this->db->where($where, $param);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function insertData($table,$insertData){
        if($this->db->insert($table, $insertData)){
            return true;
        } else {
            return false;
        }
    }

    public function insertBatch($table, $data)
    {
        $insert = $this->db->insert_batch($table, $data);
        if ($insert) {
            return true;
        }
    }
    
    public function deleteData($table,$rowData,$uniqueID){
        $this->db->where($rowData, $uniqueID);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            return 1; // update success
        } else {
            return 0; // update gagal
        }
    }
    
    public function deleteData2($table,$rowData,$uniqueID,$rowData2,$uniqueID2){
        $this->db->where($rowData, $uniqueID);
        $this->db->where($rowData2, $uniqueID2);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            return 1; // update success
        } else {
            return 0; // update gagal
        }
    }

    public function deleteData3($table,$rowData,$uniqueID,$rowData2,$uniqueID2,$rowData3,$uniqueID3){
        $this->db->where($rowData, $uniqueID);
        $this->db->where($rowData2, $uniqueID2);
        $this->db->where($rowData3, $uniqueID3);
        $this->db->delete($table);
        if ($this->db->affected_rows() > 0) {
            return 1; // update success
        } else {
            return 0; // update gagal
        }
    }
    
    public function updateData($table,$rowData,$uniqueID,$dateUpdate){
        $this->db->where($rowData, $uniqueID);
        $this->db->update($table, $dateUpdate);
        if ($this->db->affected_rows() > 0) {
            return 1; // update success
        } else {
            return 0; // update gagal
        }
    }

    public function updateData2($table,$rowData,$uniqueID,$rowData2,$uniqueID2, $dateUpdate){
        $this->db->where($rowData, $uniqueID);
        $this->db->where($rowData2, $uniqueID2);
        $this->db->update($table, $dateUpdate);
        if ($this->db->affected_rows() > 0) {
            return 1; // update success
        } else {
            return 0; // update gagal
        }
    }
    
    public function updateNoWheere($table,$dateUpdate){
        $this->db->update($table, $dateUpdate);
        if ($this->db->affected_rows() > 0) {
            return 1; // update success
        } else {
            return 0; // update gagal
        }
    }
    
    public function getDataUser($authID){
        $this->db->select('*');
        $this->db->from('t_auth');
        $this->db->where('auth_id', $authID);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}