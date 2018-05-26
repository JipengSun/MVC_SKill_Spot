<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/25
 * Time: 10:18
 */
class Service_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function s_insert($arr){
        $this->db->insert('Service',$arr);
    }
    function listService(){
        try{
            $this->db->select('*');
            $query = $this->db->get('Service');
            $stat[0] = true;
            //Check later for type.
            $stat[1] = $query->result();
            $stat[2] = $query->num_rows();
            return $stat;
        }catch (PDOException $ex){
            $stat[0] = false;
            $stat[1] = $ex->getMessage();
            return $stat;

        }
    }
    function s_update($sid,$arr){
        $this->db->where('sid',$sid);
        $this->db->update('Service',$arr); //Need to have a key value array.
    }
    function s_select($sid){
        $this->db->where('sid',$sid);
        $this->db->select('*');
        $query = $this->db->get('Service');
        return $query->result();
    }
    function s_selectstype($stype){
        $this->db->where('stype',$stype);
        $this->db->select('*');
        $query = $this->db->get('Service');
        return $query->result();
    }
    function s_del($sid){
        $this->db->where('sid',$sid);
        $this->db->delete('Service');
    }

    function s_search($wherearr,$likearr){
        $query = $this->db->select('*')
            ->from('Service')
            ->where($wherearr)
            ->like($likearr)
            ->get();
        return $query->result_array();
    }

}